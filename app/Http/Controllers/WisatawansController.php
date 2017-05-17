<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Objek;
use App\Wisatawan;
use App\Kriteria;
use App\KriteriaSub;
use App\DetailWisatawan;
use App\HasilWisataTemp;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library;

class WisatawansController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
//       $this->middleware('role:wisatawan');
    }

    private $debug = false;

    // public function profile()
    // {
    //   return view('profile');
    // }


    public function index() {

        $email = \Auth::user()->email;

        // $wisa = WisatawanTemp::select('id')->where('user',$email)->get();

        DB::setFetchMode(\PDO::FETCH_ASSOC);

        $wisa = DB::table('t_wisatawan')->select('id')->where('user', $email)->get();
        $idwisa = $wisa;

        // of course to revert the fetch mode you need to set it again
        DB::setFetchMode(\PDO::FETCH_CLASS);

        // $recomd = HasilWisataTemp::whereIn('id',$idwisa)->get();
        $recomd = DB::table('t_hasil_temp')->whereIn('id', $idwisa)->get();
        // print_r($recomd);


        $histo = Wisatawan::where('user', $email)->orderBy('id', 'desc')->paginate(10);
        // print_r($histo);


        return view('profile', [
            'histo' => $histo
                // ,'jks'    => $jks
                // ,'tujuans'=> $tujuans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $negaras = KriteriaSub::where([
                        ['kode', 'like', '2k%']
                ])
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();

        $jks = KriteriaSub::where([
                        ['kode', 'like', '3k%']
                ])
                ->orderBy('id_kriteria_sub', 'asc')
                ->get();

        $tujuans = KriteriaSub::where([
                        ['kode', 'like', '4k%']
                ])
                ->orderBy('id_kriteria_sub', 'asc')
                ->get();

        return view('wisatawan.create', [
            'negaras' => $negaras
            , 'jks' => $jks
            , 'tujuans' => $tujuans
        ]);
    }

    public function hasil(Request $request) {
        $ds = new Library\DS();
        $bayes = new Library\Naive();

        $tes = new \App\CariData();

        $country = $request->country;
        $gender = $request->gender;

        $negara = $tes->getKunjunganWisata($country);
        $negara = $this->getArr($negara);

        $jk = $tes->getKunjunganWisata($gender);
        $jk = $this->getArr($jk);

        $ds->CariKejadianSama($negara);
        $ds->CariKejadianSama($jk);
        $ds->PreKombinasi(false);
    }

    private function getArr($data) {
        $results = array();

        foreach ($data as $dt) {
            $inside = array();
            $inside['kode_kriteria'] = $dt->id_objek;
            $inside['values'] = $dt->group_id_objek;
            array_push($results, $inside);
        }
        return $results;
    }

    private function getArrNv($data) {
        $results = array();

        foreach ($data as $dt) {
            $inside = array();
            $inside['kode_kunjungan'] = $dt->group_id_objek;
            $inside['values'] = $dt->kode_kriteria;
            array_push($results, $inside);
        }

        return $results;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    // 'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('wisatawan/create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $wisatawan = new Wisatawan;
        $wisatawan->nama = $request->name;
        $wisatawan->user = $request->user()->email;

        $wisatawan->save();

        $insertData = array();
        if (!empty($request->country)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => $request->country,
            ];
        }
        if (!empty($request->gendre)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => $request->gendre,
            ];
        }
        if (!empty($request->purpose)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => $request->purpose,
            ];
        }
        if (!empty($request->age)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => '5k' . $request->age,
            ];
        }
        if (!empty($request->frequency)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => '6k' . $request->frequency,
            ];
        }
// dd($insertData);

        $iddd = DetailWisatawan::insert($insertData);


        // Generate Query
        $ds = new Library\DS();
        $bayes = new Library\Naive();

        $tes = new \App\CariData();

        $umurs = '5k%';
        $kunjungan = '6k%';

        // Negara
        $negara = $tes->getKunjunganWisata($request->country);
        $negara = $this->getArr($negara);

        // Jenis Kelamin
        $jk = $tes->getKunjunganWisata($request->gendre);
        $jk = $this->getArr($jk);

        // Kali silang antara negara dan Jenis Kelamin (DS)
        // Tujuan
        $tujuan = $tes->getKunjunganWisata($request->purpose);
        $tujuan = $this->getArr($tujuan);

        // $ds->CariKejadianSama($tujuan);
        // $ds->PreKombinasi(true);

        $jmlNegara = sizeof($negara);
        $jmlJK = sizeof($jk);
        $jmlTujuan = sizeof($tujuan);

        if ($this->debug) {
            $ds->CariKejadianSama($negara);
            $ds->CariKejadianSama($jk);
            $ds->PreKombinasi(false);

            $ds->CariKejadianSama($tujuan);
            $ds->PreKombinasi(true);
            echo 'debug';
        } else {
            if ($jmlNegara > 0 && $jmlJK > 0 && $jmlTujuan > 0) {

                $ds->CariKejadianSama($negara);
                $ds->CariKejadianSama($jk);
                $ds->PreKombinasi(false);
                // dd($ds);

                $ds->CariKejadianSama($tujuan);
                $ds->PreKombinasi(true);
                // dd($ds);
            } elseif ($jmlNegara > 0 && $jmlJK > 0) {

                $ds->CariKejadianSama($negara);
                $ds->CariKejadianSama($jk);
                $ds->PreKombinasi(false);
                // dd($ds);
            } elseif ($jmlNegara > 0 && $jmlTujuan > 0) {

                $ds->CariKejadianSama($negara);
                $ds->CariKejadianSama($tujuan);
                $ds->PreKombinasi(false);
                // dd($ds);
            } elseif ($jmlJK > 0 && $jmlTujuan > 0) {

                $ds->CariKejadianSama($jk);
                $ds->CariKejadianSama($tujuan);
                $ds->PreKombinasi(false);
                // dd($ds);
            } elseif ($jmlNegara > 0) {
                // echo 'Milinal harus ada data yang sama';
                // return;
                $ds->CariKejadianSama($negara);
            } elseif ($jmlJK > 0) {
                $ds->CariKejadianSama($jk);
            } elseif ($jmlTujuan > 0) {
                $ds->CariKejadianSama($tujuan);
            }
        }

        // echo $jmlNegara . ', ' . $jmlJK . ', ' .$jmlTujuan;
        // Cek jika salah satu kosong
        // dd($ds);
        // Ambil nilai probabilitas dari DS untuk nanti dikalikan dengan probabilitas kontinu
        // BAGIAN INI BISA SAJA NILAINYA SEMUA NOL 
        $probDS = $ds->getNilaiProbabilitas();


        // dd($probDS);
        // Penting
        $hasilDS = $ds->getHasil();
// dd($hasilDS);
        // Umur
        $umur = $tes->getKunjunganWisataNv($umurs);

        $umur = $this->getArrNv($umur);

        $bayes->cariObjekSama($umur, $request->age);
        $bayesResult = $bayes->getResult();
        // dd($bayesResult);
// echo '<pre>';
// print_r($bayesResult);
// echo '</pre>';
        // Penting
        $getLastBayesResult = $ds->getHasil();
// dd($getLastBayesResult);
        // Kujungan
        $frekuensi1 = $tes->getKunjunganWisataNv($kunjungan);
        $frekuensi = $this->getArrNv($frekuensi1);

        $bayes->cariObjekSama($frekuensi, $request->frequency);
        $bayesResult = $bayes->getResult();
        // dd($bayesResult);
// echo 'Kunjungan';
// print_r($frekuensi);
// printf('</pre>');
//** Tampilkan semua nilai perhitungan NBC 
// dd($bayes);
//** Tampilkan semua nilai perhitungan NBC 
        // Penting
        $probBayes = $bayes->getResultProbabilitas();
        // foreach ($probBayes as $pb => $vl) {
        //   echo 'X: ' . number_format($vl, 15);          
        // }
        // dd($probBayes);
        $hasilAkir = array();
        $total = 0;

        foreach ($probDS as $key => $value) {
            if (isset($probBayes[$key])) {
                $hasilAkir[$key] = round($value * $probBayes[$key], 10);
                $total += $value * $probBayes[$key];
            }
        }

        if ($total > 0) {
            foreach ($probDS as $key => $value) {
                if (isset($hasilAkir[$key]))
                    $hasilAkir[$key] = $hasilAkir[$key] / $total;
            }
        }

        // dd($probDS);
        // dd($probBayes);
        // tampilkan hasil akhir probabilitas Kategori dan Kontinu 
        // dd($hasilAkir);
        //         echo '<pre>';
        // print_r($hasilAkir);
        // print_r($probBayes);
        // echo '</pre>';

        $ds->KombinasiDenganBayes($hasilAkir);
// dd($ds);
        // Dapatkan hasil Akhir
        $hasil = $ds->getHasil();
// dd($ds);
// CEK Jika tidak ada rekomendasi, maka riderict ke halaman lain 
        if (empty($hasil) or $hasil === 0) {
            return redirect('wisatawans/nothing');
        } else {
            // foreach ($hasil as $key => $value) {
            // if ($hasil = 0) {
            //   return redirect('wisatawans/nothings');
            // }
            // }
            // dd($hasil);
// TAMPILKAN HASIL AKHIR (FINISH) 
// print_r($hasil);
            // mengurutkan array kemudian cari yang terbesar, 
            arsort($hasil);
// dd($hasil);
            $resul = array_intersect_key($hasil, array_flip(array_keys($hasil, max($hasil))));

// print_r($resul);
// dd($resul);
        }

        // TAMPILKAN HASIL AKHIR (FINISH)
                //  // region Urut
                //  $newArray = array();
                //  $i = 0;
                //  foreach ($hasil as $key => $value) {
                //    $newArray[$i] = $key . '|' . $value;
                //    $i++;
                //  }
                //  for ($i = 0; $i < sizeof($newArray); $i++) {
                //    for ($j = 0; $j < sizeof($newArray) - 1; $j++) {
                //      $n1 = explode("|", $newArray[$j]);
                //      $n2 = explode("|", $newArray[$j+1]);
                //      if (doubleval($n1[1]) < doubleval($n2[1])) {
                //        $temp = $newArray[$j];
                //        $newArray[$j] = $newArray[$j + 1];
                //        $newArray[$j + 1] = $temp;
                //      }
                //    }
                //  }
                //  // Explode Lagi
                //  $idObjeks = array();
                //  $i = 0;
                //  foreach ($newArray as $key) {
                //    $ex1 = explode("|", $key);
                //    $ex2 = explode(",", $ex1[0]);
                //    foreach ($ex2 as $ky) {
                //      $idObjeks[$i] = $ky;
                //      $i++;
                //    }
                //  }
                //  $hasil = array();
                //  foreach ($newArray as $key) {
                //    $ex = explode("|", $key);
                //    $hasil[$ex[0]] = $ex[1];
                //  }
                // // arsort($hasil);
                // print_r($hasil);
                //  // Cari yang paling besar
                //  $sameValue = array();
                //  for ($i = 0; $i < sizeof($hasil) - 1 ; $i++) {
                //    if (current($hasil) == next($hasil)) {
                //      $sameValue[$i]['key'] = key($hasil);
                //      $sameValue[$i]['value'] = current($hasil);
                //      $sameValue[$i+1]['key'] = key($hasil);
                //      $sameValue[$i+1]['value'] = next($hasil);
                //    } else {
                //      prev($hasil);
                //      $sameValue[$i]['key'] = key($hasil);
                //      $sameValue[$i]['value'] = current($hasil);
                //      break;
                //    }
                //  }
        // dd($hasil);
        // TAMPILKAN HASIL DENGAN NILAI TERBESAR
                // echo '<pre>';
                // print_r($sameValue);
                // echo '</pre>';
        // TAMPILKAN HASIL DENGAN NILAI TERBESAR
                // $hasil = array_count_values($idObjeks);
                // endregion
//** =============================================================


        

        $robjeks = array();
        $temps = array();

        $hasilInsert = array();
        foreach ($resul as $key => $value) {
            $hasilInsert = array(
                'id_wi' => $wisatawan->id,
                'hasil' => $key,
                'nilai' => $value
            );
// dd($hasilInsert);
            $xy = HasilWisataTemp::insert($hasilInsert);
        }

        $idwisa = $wisatawan->id;
// $idwisa = '1';

        $idne = Wisatawan::where(function($idnee) use ($idwisa) {
                    $idnee->where('id', '=', $idwisa);
                })->get();

        //** Ngambil data wisatawan berdasarkan $idwisa di Model Wisatawan
        $getWisatawan = new \App\Wisatawan();
        $wisat = $getWisatawan->getWisatawan($idwisa);

// dd($hasil);
        if (sizeof($hasilInsert) > 0) {

            $temps = DB::table('t_hasil_temp')
                    ->where('id_wi', $idwisa)
                    ->get();

            $robjeks = array();
            $tmpObj = array();
            $tmpObjStr = "";
            foreach ($temps as $val) {
                $expHasil = explode(",", $val->hasil);
                $robjeks[] = DB::table('objek')->whereIn('id', $expHasil)->get();
                $tmpObjStr .= $val->hasil . ',';
            }
            $tmpObjStr = rtrim($tmpObjStr, ',');
            $tmpObj = explode(",", $tmpObjStr);
            // dd($tmpObj);      
            // print_r($robjeks);
            $obj_lain = Objek::inRandomOrder()
                    ->where(function($as) use ($tmpObj) {
                        $as->whereNotIn('id', $tmpObj)
                        ->where('status', 'tampil');
                    })
                    ->limit(5)
                    ->get();
        } else {
            $obj_lain = Objek::where('status', 'tampil')
                    ->orderBy('hits', 'desc')
                    ->inRandomOrder()
                    ->limit(5)
                    ->get();
        }
        // print_r($obj_lain);
// dd($resul);

        if ($hasilInsert['nilai'] == 0) {
            return redirect('wisatawans/nothing');
        } else {
            return view('wisatawan.result')->with(['idne' => $idne, 'robjeks' => $robjeks, 'wisat' => $wisat, 'obj_lain' => $obj_lain, 'temps' => $temps]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $wisatawan = Wisatawan::find($id);

        if (!$wisatawan) {
            abort(404);
        }

        //** Ngambil data wisatawan berdasarkan $id di Model Wisatawan
        $getWisatawan = new \App\Wisatawan();
        $wisat = $getWisatawan->getWisatawan($id);

/// 
        $temps = DB::table('t_hasil_temp')
                ->where('id_wi', $wisatawan->id)
                ->get();

        $robjeks = array();
        $tmpObj = array();
        $tmpObjStr = "";
        foreach ($temps as $val) {
            $expHasil = explode(",", $val->hasil);
            // if (sizeof($expHasil) > 1) {
            $robjeks[] = DB::table('objek')->whereIn('id', $expHasil)->get();
            // }
            $tmpObjStr .= $val->hasil . ',';
        }
        $tmpObjStr = rtrim($tmpObjStr, ',');
        $tmpObj = explode(",", $tmpObjStr);

/// 
        return view('wisatawan.single', [
            'wisatawan' => $wisatawan
            ,'wisat' => $wisat
            ,'robjeks' => $robjeks
            ,'temps' => $temps
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $wisatawan = Wisatawan::find($id);
    //     if(!$wisatawan){
    //       abort(404);
    //     }
    //     return view('wisatawan.edit')->with('wisatawan', $wisatawan);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //   $this->validate($request, [
    //     'nama'   => 'required',
    //     'negara' => 'required',
    //     'jk'     => 'required',
    //     'tujuan' => 'required',
    //   ]);
    //   $wisatawan = Wisatawan::find($id);
    //   $wisatawan->nama   = $request->nama;
    //   $wisatawan->negara = $request->negara;
    //   $wisatawan->umur   = $request->umur;
    //   $wisatawan->jk     = $request->jk;
    //   $wisatawan->tujuan = $request->tujuan;
    //   $wisatawan->save();
    //   return redirect('wisatawan')->with('message', 'Wisatawan sudah diedit!');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //hapus di tabel wisatawan
        $wisata = Wisatawan::where('id', $id);
        $wisata->delete();

        //hapus di tabel detail wisatawan
        $de_wi = DetailWisatawan::where('id_wisatawan', $id);
        $de_wi->delete();

        //hapus di tabel wisata objek
        $de_wio = \App\A_WisataObjek::where('id_wisatawan', $id);
        $de_wio->delete();

        //hapus di tabel hasil temp
        $de_wite = \App\HasilWisataTemp::where('id_wi', $id);
        $de_wite->delete();

        return redirect('profile')->with('message', 'Data deleted.');
    }

    public function nothing() {
        $nothings = Objek::where('status', 'tampil')
                ->orderBy('hits', 'desc')
                ->limit(6)
                ->get();

        return view('wisatawan.nothing', ['nothings' => $nothings]);
    }


    public function afterdaftar() {

        return redirect('profile')->with('message', 'We recommend to check your email to verify valid email.');
    }

}
