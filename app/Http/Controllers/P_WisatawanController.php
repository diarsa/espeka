<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\A_Objek;
use App\A_KriteriaSub;
use App\A_Wisatawan;
use App\A_DetailWisatawan;
use App\A_WisataObjek;
use App\Wisatawan;
use App\Objek;
use DB;
use App\Library;

class P_WisatawanController extends Controller {

    //
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:petugas');
    }

    public function index() {
        // $totlokal = Wisatawan::where('jenis','1')->count();
        // $totmanca = Wisatawan::where('jenis','0')->count();
        // $totalwi = Wisatawan::count();
        // return view('petugas.index', [ 'totlokal'=>$totlokal, 'totmanca'=>$totmanca, 'totalwi'=>$totalwi ]);

        $objeks = A_Objek::where('status', 'tampil')
                ->orderBy('nama_objek', 'asc')
                ->get();

        $negaras = A_KriteriaSub::where('kode', 'LIKE', '2k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();

        $jks = A_KriteriaSub::where('kode', 'LIKE', '3k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();

        $tujuans = A_KriteriaSub::where('kode', 'LIKE', '4k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();

        $prov = A_KriteriaSub::where('kode', 'LIKE', '7k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();


        return view('petugas.wisatawan.create', ['objeks' => $objeks, 'negaras' => $negaras, 'jks' => $jks, 'tujuans' => $tujuans, 'prov' => $prov]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $objeks = A_Objek::where('status', 'tampil')
                ->orderBy('nama_objek', 'asc')
                ->get();

        $negaras = A_KriteriaSub::where('kode', 'LIKE', '2k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();

        $jks = A_KriteriaSub::where('kode', 'LIKE', '3k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();

        $tujuans = A_KriteriaSub::where('kode', 'LIKE', '4k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();

        $prov = A_KriteriaSub::where('kode', 'LIKE', '7k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();


        return view('petugas.wisatawan.create', ['objeks' => $objeks, 'negaras' => $negaras, 'jks' => $jks, 'tujuans' => $tujuans, 'prov' => $prov]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            
        ]);

        $jmobj = $request->jmlobjek;
        
        $jk1 = $request->jmljk1;
        $jk2 = $request->jmljk2;
        $hasiljk = $jk1 + $jk2;

        $tuj1 = $request->jmltujuan1;
        $tuj2 = $request->jmltujuan2;
        $tuj3 = $request->jmltujuan3;
        $tuj4 = $request->jmltujuan4;
        $hasiltuj = $tuj1 + $tuj2 + $tuj3 + $tuj4; 

        $umr1 = $request->jmlumur1;
        $umr2 = $request->jmlumur2;
        $umr3 = $request->jmlumur3;
        $hasilumr = $umr1 + $umr2 + $umr3;

        // dd($hasiltuj);
        $erjk   = 'Jumlah jenis kelamin tidak sesuai!';
        $ertuj  = 'Jumlah tujuan tidak sesuai!';
        $erumr  = 'Jumlah umur tidak sesuai!';

        $re     = 'petugas/wisatawan/create';


//
        if ($request->jmljk1 > 0 and $request->jmljk2 > 0 and $hasiljk > $jmobj) {
            return redirect($re)->with('eror', $erjk);
        } elseif ($request->jmljk1 > 0 and $hasiljk > $jmobj) {
            return redirect($re)->with('eror', $erjk);
        } elseif ($request->jmljk2 > 0 and $hasiljk > $jmobj) {
            return redirect($re)->with('eror', $erjk);
        }


//
        if ($request->jmltujuan1 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan2 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan3 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan4 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan1 > 0 and $request->jmltujuan2 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan1 > 0 and $request->jmltujuan3 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan1 > 0 and $request->jmltujuan4 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan2 > 0 and $request->jmltujuan3 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan2 > 0 and $request->jmltujuan4 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan3 > 0 and $request->jmltujuan4 > 0 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } elseif ($request->jmltujuan1 > 0 and $request->jmltujuan2 > 0 and $request->jmltujuan3 and $request->jmltujuan4 and $hasiltuj > $jmobj) {
            return redirect($re)->with('eror', $ertuj);
        } 

//
        if ($request->jmlumur1 > 0 and $hasilumr > $jmobj) {
            return redirect($re)->with('eror', $erumr);
        } elseif ($request->jmlumur2 > 0 and $hasilumr > $jmobj) {
            return redirect($re)->with('eror', $erumr);
        } elseif ($request->jmlumur3 > 0 and $hasilumr > $jmobj) {
            return redirect($re)->with('eror', $erumr);
        } elseif ($request->jmlumur1 > 0 and $request->jmlumur2 and $hasilumr > $jmobj) {
            return redirect($re)->with('eror', $erumr);
        } elseif ($request->jmlumur1 > 0 and $request->jmlumur3 and $hasilumr > $jmobj) {
            return redirect($re)->with('eror', $erumr);
        } elseif ($request->jmlumur2 > 0 and $request->jmlumur3 and $hasilumr > $jmobj) {
            return redirect($re)->with('eror', $erumr);
        } elseif ($request->jmlumur1 > 0 and $request->jmlumur2 and $request->jmlumur3 and $hasilumr > $jmobj) {
            return redirect($re)->with('eror', $erumr);
        } else {
            // echo "beneh";
            // dd($hasilumr);
        }
        

        

        // if ($request->jmljk1 > 0 or $request->jmljk2 > 0 and $hasiljk > $jmobj) {
        //     return redirect($re)->with('eror', $erjk);
        // }


        // if ($request->jmltujuan1 > 0 or $request->jmltujuan2 > 0 or $request->jmltujuan3 or $request->jmltujuan4 and $hasiltuj > $jmobj) {
        //     return redirect($re)->with('eror', $ertuj);
        // } 


        // if ($request->jmlumur1 > 0 or $request->jmlumur2 > 0 or $request->jmlumur3 > 0 and $hasilumr > $jmobj) {
        //     return redirect($re)->with('eror', $erumr);
        // }


// dd($jmobj);
// Insert secara ulang wisatawan berdasarkan jumlah yg diinputkan
// untuk ke tabel wisatawan
        for ($e = 1; $e <= $request->jmlobjek; $e++) {

            // Jika provinsi di isi, maka insert ke A_Wisatawan jenis lokal (1) dan ke A_DetailWisatawan 
            if (!empty($request->pro)) {
                $lokal = A_Wisatawan::insertGetId([
                            'nama' => $request->objek,
                            'user' => $request->user()->email,
                            'jenis' => '1',
                ]);

                // Insert kode provinsi ke tabel detail_wisatawan
                $insertProv = array();
                $insertProv[] = [
                    'id_wisatawan' => $lokal,
                    'kode_kriteria' => $request->pro,
                ];

                $masuk2 = A_DetailWisatawan::insert($insertProv);
            }


            // Jika negara di isi, maka insert ke A_Wisatawan jenis mancanegara (0) dan ke A_DetailWisatawan
            if (!empty($request->negara)) {
                $lokal = A_Wisatawan::insertGetId([
                            'nama' => $request->objek,
                            'user' => $request->user()->email,
                            'jenis' => '0',
                ]);

                // Insert kode negara ke tabel detail_wisatawan
                $insertNegara = array();
                $insertNegara[] = [
                    'id_wisatawan' => $lokal,
                    'kode_kriteria' => $request->negara,
                ];

                $masuk2 = A_DetailWisatawan::insert($insertNegara);
            }


            //Insert ke tabel wisata_objek 
            $insertObjek = array();
            if (!empty($request->objek)) {
                $insertObjek[] = [
                    'id_wisatawan' => $lokal,
                    'id_objek' => $request->objek,
                    'vote' => 1,
                ];
            }

            $masuk3 = A_WisataObjek::insert($insertObjek);
        }



// Insert kode jenis kelamin ke tabel detail_wisatawan
        for ($e_jk1 = 1; $e_jk1 <= $request->jmljk1; $e_jk1++) {

            $gender1 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $lokal --,
                        'kode_kriteria' => $request->jk1,
            ]);
        }


        for ($e_jk2 = 1; $e_jk2 <= $request->jmljk2; $e_jk2++) {

            $gender2 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $lokal --,
                        'kode_kriteria' => $request->jk2,
            ]);
        }

        // print_r($lokal);
// Insert kode tujuan ke tabel detail_wisatawan
        $idWi = $lokal + $request->jmlobjek; //id wisatawan + jumlah total orang yg akan diinput

        $idWi1 = $idWi - $request->jmltujuan1 + 1;
        $idWi2 = $idWi1 - $request->jmltujuan2;
        $idWi3 = $idWi2 - $request->jmltujuan3;
        $idWi4 = $idWi3 - $request->jmltujuan4;

        for ($e_tujuan1 = 1; $e_tujuan1 <= $request->jmltujuan1; $e_tujuan1++) {

            $tujuan1 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $idWi1++,
                        'kode_kriteria' => $request->tujuan1,
            ]);
        }

        for ($e_tujuan2 = 1; $e_tujuan2 <= $request->jmltujuan2; $e_tujuan2++) {

            $tujuan2 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $idWi2++,
                        'kode_kriteria' => $request->tujuan2,
            ]);
        }

        for ($e_tujuan3 = 1; $e_tujuan3 <= $request->jmltujuan3; $e_tujuan3++) {

            $tujuan3 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $idWi3++,
                        'kode_kriteria' => $request->tujuan3,
            ]);
        }

        for ($e_tujuan4 = 1; $e_tujuan4 <= $request->jmltujuan4; $e_tujuan4++) {

            $tujuan4 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $idWi4++,
                        'kode_kriteria' => $request->tujuan4,
            ]);
        }


// Insert kode umur ke tabel detail_wisatawan
        $idWiU = $lokal + $request->jmlobjek;

        $idWiU1 = $idWiU - $request->jmlumur1 + 1;
        $idWiU2 = $idWiU1 - $request->jmlumur2;
        $idWiU3 = $idWiU2 - $request->jmlumur3;

        for ($e_umur1 = 1; $e_umur1 <= $request->jmlumur1; $e_umur1++) {

            $umur1 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $idWiU1++,
                        'kode_kriteria' => $request->umur1,
            ]);
        }

        for ($e_umur2 = 1; $e_umur2 <= $request->jmlumur2; $e_umur2++) {

            $umur2 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $idWiU2++,
                        'kode_kriteria' => $request->umur2,
            ]);
        }

        for ($e_umur3 = 1; $e_umur3 <= $request->jmlumur3; $e_umur3++) {

            $umur3 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $idWiU3++,
                        'kode_kriteria' => $request->umur3,
            ]);
        }


        //// ---------------------
        $tes = new \App\CariData();
        $ds = new Library\DS();
        $bayes = new Library\Naive();

        $pro = $tes->getKunjunganWisata($request->pro);
        $pro = $this->getArr($pro);
        $lenPro = sizeof($pro);

        $negara = $tes->getKunjunganWisata($request->negara);
        $negara = $this->getArr($negara);
        $lenNegara = sizeof($negara);

        $jkL = $tes->getKunjunganWisata($request->jk1);
        $jkL = $this->getArr($jkL);
        $lenJkL = sizeof($jkL);



        $jkP = $tes->getKunjunganWisata($request->jk2);
        $jkP = $this->getArr($jkP);
        $lenJkP = sizeof($jkP);



        $tujuanV = $tes->getKunjunganWisata($request->tujuan1);
        $tujuanV = $this->getArr($tujuanV);
        $lenTujuanV = sizeof($tujuanV);



        $tujuanR = $tes->getKunjunganWisata($request->tujuan2);
        $tujuanR = $this->getArr($tujuanR);
        $lenTujuanR = sizeof($tujuanR);



        $tujuanVR = $tes->getKunjunganWisata($request->tujuan3);
        $tujuanVR = $this->getArr($tujuanVR);
        $lenTujuanVR = sizeof($tujuanVR);



        $tujuanO = $tes->getKunjunganWisata($request->tujuan4);
        $tujuanO = $this->getArr($tujuanO);
        $lenTujuanO = sizeof($tujuanO);

        // if ($lenNegara > 0 && $lenJkL > 0 && $lenJkP > 0 && $lenTujuanV
        // && $lenTujuanR && $lenTujuanVR && $lenTujuanO > 0) {
        $ds->CariKejadianSama($jkL);
        $ds->CariKejadianSama($jkP);

        $ds->PreKombinasi(false);
        if ($lenNegara > 0) {
            $ds->CariKejadianSama($negara);
            $ds->PreKombinasi(true);
        }

        if ($lenPro > 0) {
            $ds->CariKejadianSama($pro);
            $ds->PreKombinasi(true);
        }

        if ($lenTujuanV > 0) {
            $ds->CariKejadianSama($tujuanV);
            $ds->PreKombinasi(true);
        }

        if ($lenTujuanR > 0) {
            $ds->CariKejadianSama($tujuanR);
            $ds->PreKombinasi(true);
        }

        if ($lenTujuanVR > 0) {
            $ds->CariKejadianSama($tujuanVR);
            $ds->PreKombinasi(true);
        }

        if ($lenTujuanO > 0) {
            $ds->CariKejadianSama($tujuanO);
            $ds->PreKombinasi(true);
        }

        // $umurs = '5k%';
        // $umurA = $tes->getKunjunganWisataNv($umurs);
        // $umurA = $this->getArrNv($umurA);
        // // print_r($umurA);
        // // $umurDewa = $bayes->cariObjekSama($umurA, $request->umur1);
        // // $umurDewaRes = $bayes->getResult();
        // if (sizeof($umurA) > 0) {
        //   $ds->formatNV($umurA);
        //   $ds->PreKombinasi(true);
        // }
        // }
        // echo '<pre>'; print_r($tujuanO); echo '</pre>';

        $probDS = $ds->getNilaiProbabilitas();

        $hasilDS = $ds->getHasil();
        // dd($probDS);
        // dd($ds);
        // $umur 
        // $umurs = '5k%';
        // $umurA = $tes->getKunjunganWisataNv($umurs);
        // $umurA = $this->getArrNv($umurA);
        // $umurDewa = $bayes->cariObjekSama($umurA, $request->umur1);
        // $umurDewaRes = $bayes->getResult();
        // $umurRema = $bayes->cariObjekSama($umurA, $request->umur2);
        // $umurRemaRes = $bayes->getResult();
        // $umurAnak = $bayes->cariObjekSama($umurA, $request->umur3);
        // $umurAnakRes = $bayes->getResult();
        // $probBayes = $bayes->getResultProbabilitas();
        // $hasilAkir = array();
        // $total = 0;
        // foreach ($probDS as $key => $value) {
        //   if (isset($probBayes[$key])) {
        //     $hasilAkir[$key] = round($value * $probBayes[$key], 10);
        //     $total += $value * $probBayes[$key];
        //   }
        // }
        // if ($total > 0) {
        //   foreach ($probDS as $key => $value) {
        //     if (isset($hasilAkir[$key]))
        //       $hasilAkir[$key] = $hasilAkir[$key] / $total;
        //   }
        // }
        // $ds->KombinasiDenganBayes($hasilAkir);
        // Dapatkan hasil Akhir
        $hasil = $ds->getHasil();
// dd($hasil);
// print_r($hasil);
// // region Urut
//         $newArray = array();
//         $i = 0;
//         foreach ($hasil as $key => $value) {
//           $newArray[$i] = $key . '|' . $value;
//           $i++;
//         }
//         for ($i = 0; $i < sizeof($newArray); $i++) {
//           for ($j = 0; $j < sizeof($newArray) - 1; $j++) {
//             $n1 = explode("|", $newArray[$j]);
//             $n2 = explode("|", $newArray[$j+1]);
//             if (doubleval($n1[1]) < doubleval($n2[1])) {
//               $temp = $newArray[$j];
//               $newArray[$j] = $newArray[$j + 1];
//               $newArray[$j + 1] = $temp;
//             }
//           }
//         }
//         // Explode Lagi
//         $idObjeks = array();
//         $i = 0;
//         foreach ($newArray as $key) {
//           $ex1 = explode("|", $key);
//           $ex2 = explode(",", $ex1[0]);
//           foreach ($ex2 as $ky) {
//             $idObjeks[$i] = $ky;
//             $i++;
//           }
//         }
// //** =============================================================
//         $hasil = array();
//         foreach ($newArray as $key) {
//           $ex = explode("|", $key);
//           $hasil[$ex[0]] = $ex[1];
//         }
//         // print_r($hasil);
//         // Cari yang paling besar
//         $sameValue = array();
//         for ($i = 0; $i < sizeof($hasil) - 1; $i++) {
//           if (current($hasil) == next($hasil)) {
//             $sameValue[$i]['key'] = key($hasil);
//             $sameValue[$i]['value'] = current($hasil);
//             $sameValue[$i+1]['key'] = key($hasil);
//             $sameValue[$i+1]['value'] = next($hasil);
//           } else {
//             prev($hasil);
//             $sameValue[$i]['key'] = key($hasil);
//             $sameValue[$i]['value'] = current($hasil);
//             break;
//           }
//         }
//         // echo '<pre>';
//         print_r($sameValue);
//         // echo '</pre>';
// //** =============================================================
//         dd($hasil);
//         $hasil = array_count_values($idObjeks);

        $objk = Objek::where('status', 'tampil')
                ->inRandomOrder()
                ->first();

        if (empty($hasil)) {
            $hasilInsert = array(
                'id_wi' => $idWi,
                'hasil' => $objk->id,
                'nilai' => 0
            );
            // dd($hasilInsert);
            $xy = \App\HasilWisataTemp::insert($hasilInsert);
        } else {

            arsort($hasil);
            $resul = array_intersect_key($hasil, array_flip(array_keys($hasil, max($hasil))));


            // dd($hasil);

            foreach ($resul as $key => $value) {
                $hasilInsert = array(
                    'id_wi' => $idWi,
                    'hasil' => $key,
                    'nilai' => $value
                );
                // dd($hasilInsert);
                $xy = \App\HasilWisataTemp::insert($hasilInsert);
            }
        }

        $robjeks = array();
        $temps = array();

        $id = $request->objek;
        $berapa = $request->jmlobjek;

        $upKun = new \App\UpKunjungan();
        $ups = $upKun->upKunjungan($id, $berapa);

//*****
        $idwisa = $lokal;
        $idne = Wisatawan::where(function($idnee) use ($idwisa) {
                    $idnee->where('id', '=', $idwisa);
                })->get();

        // print_r($idne);
//** Ngambil data wisatawan berdasarkan $idwisa di Model Wisatawan
        $getWisatawan = new \App\Wisatawan();
        $wisat = $getWisatawan->getWisatawan($idwisa);

        // $stemp = DB::table('t_hasil_temp')
        //  ->where('id', $idne)
        //  ->first();
        // $temp = explode(",",$stemp->hasil);
        // $tempStr = implode(',', $temp);
        // $robjeks = DB::table('objek')->whereIn('id', $temp)->orderByRaw(DB::raw("field(id, $tempStr)"))->get();
        if (sizeof($hasil) > 0) {
            $temps = DB::table('t_hasil_temp')
                    ->where('id_wi', $idWi)
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

            $obj_lain = Objek::inRandomOrder()
                    ->where(function($as) use ($tmpObj) {
                        $as->whereNotIn('id', $tmpObj)
                        ->where('status', 'tampil');
                    })
                    ->limit(3)
                    ->get();
        } else {
            $obj_lain = Objek::where('status', 'tampil')
                    // ->orderBy('hits','desc')
                    ->inRandomOrder()
                    ->limit(3)
                    ->get();
        }

        // untuk persen
        // $persen = explode(",", $temp->nilai);
        return view('petugas.wisatawan.hasil')->with(['message' => 'Berhasil', 'idne' => $idne, 'robjeks' => $robjeks, 'wisat' => $wisat, 'temps' => $temps, 'obj_lain' => $obj_lain]);
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
            $inside['kode_kriteria'] = $dt->group_id_objek;
            $inside['values'] = $dt->kode_kriteria;
            array_push($results, $inside);
        }

        return $results;
    }

}
