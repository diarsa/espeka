<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\A_Objek;
use App\A_KriteriaSub;
use App\A_Wisatawan;
use App\A_DetailWisatawan;
use App\A_WisataObjek;

class P_LokalController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        // $this->middleware('role:petugas');
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

        $provinsis = A_KriteriaSub::where('kode', 'LIKE', '7k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();

        $jks = A_KriteriaSub::where('kode', 'LIKE', '3k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();

        $tujuans = A_KriteriaSub::where('kode', 'LIKE', '4k%')
                ->orderBy('nama_kriteria_sub', 'asc')
                ->get();


        return view('petugas.lokal.create', ['objeks' => $objeks, 'provinsis' => $provinsis, 'jks' => $jks, 'tujuans' => $tujuans]);
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

// Insert secara ulang wisatawan berdasarkan jumlah yg diinputkan
// untuk ke tabel wisatawan
        for ($e = 1; $e <= $request->jmlobjek; $e++) {
            $lokal = A_Wisatawan::insertGetId([
                        'nama' => $request->objek,
                        'user' => $request->user()->email,
                        'jenis' => '1',
            ]);


            // Insert kode provinsi ke tabel detail_wisatawan
            $insertNegara = array();
            if (!empty($request->provinsi)) {
                $insertNegara[] = [
                    'id_wisatawan' => $lokal,
                    'kode_kriteria' => $request->provinsi,
                ];
            }

            $masuk2 = A_DetailWisatawan::insert($insertNegara);


            //Insert ke tabel wisata_objek 
            $insertObjek = array();
            if (!empty($request->objek)) {
                $insertObjek[] = [
                    'id_wisatawan' => $lokal,
                    'id_objek' => $request->objek,
                ];
            }

            $masuk3 = A_WisataObjek::insert($insertObjek);
        }



// Insert kode jenis kelamin ke tabel detail_wisatawan
        for ($e_jk1 = 1; $e_jk1 <= $request->jmljk1; $e_jk1++) {

            $gender1 = A_DetailWisatawan::insert([
                        'id_wisatawan' => $lokal --, //COBA $LOKAL KURANG $e
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




        return redirect('petugas')->with(['message' => 'Data sudah ditambahkan!', 'show_modal' => true]);
        // return redirect('petugas')->with('show_modal', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title) {
        //$berita = Blog::find($id);
        $berita = A_Berita::where('slug', $title)->first();

        if (!$berita) {
            abort(404);
        }

        return view('admin.berita.single')->with('berita', $berita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $berita = A_Berita::find($id);

        if (!$berita) {
            abort(404);
        }

        return view('admin.berita.edit')->with('berita', $berita);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'subject' => 'required',
        ]);

        $berita = A_Berita::find($id);
        $berita->title = $request->title;
        $berita->subject = $request->subject;
        $berita->slug = str_slug($request->title, '-');

        if (Input::hasFile('imgb')) {
            $file = Input::file('imgb');
            $destinationPath = 'assets/images/berita';
            $file->move($destinationPath, $file->getClientOriginalName());

            $berita->img = $file->getClientOriginalName();
            # code...
        }

        $berita->save();
        return redirect('admin/berita')->with('message', 'Berita sudah di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $berita = A_Berita::find($id);
        $berita->delete();
        return redirect('admin/berita')->with('message', 'Berita sudah dihapus!');
    }

}
