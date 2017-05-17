<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator;
use Excel;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use App\A_Wisatawan;
use App\A_DetailWisatawan;
use App\A_WisataObjek;
use App\A_Objek;
use App\A_KriteriaSub;
use App\KriteriaSub;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class A_WisatawanController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Show UNTUK Wisatawan mancanegara.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        //** ngambil dari model A_Wisatawan
        $getAWisatawan = new \App\A_Wisatawan();
        $wisatas = $getAWisatawan->get_wisatawanManca();

        return view('admin.wisatawan.index', [
            'wisatas' => $wisatas,
        ]);
    }

    /**
     * Show UNTUK Wisatawan lokal.
     *
     * @return \Illuminate\Http\Response
     */
    public function lokal() {

        //** ngambil dari model A_Wisatawan
        $getAWisatawan = new \App\A_Wisatawan();
        $wisatas = $getAWisatawan->get_wisatawanLokal();

        return view('admin.wisatawan.lokal', [
            'wisatas' => $wisatas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $negaras = A_KriteriaSub::where([
                        ['kode', 'LIKE', '2k%']
                ])
                ->orderBy('id_kriteria_sub', 'asc')
                ->get();

        $jks = A_KriteriaSub::where([
                    //['id_kriteria', '=', 2]
                        ['kode', 'LIKE', '3k%']
                ])
                ->orderBy('id_kriteria_sub', 'asc')
                ->get();

        $tujuans = A_KriteriaSub::where([
                    //['id_kriteria', '=', 4]
                        ['kode', 'LIKE', '4k%']
                ])
                ->orderBy('id_kriteria_sub', 'asc')
                ->get();

        $objeksss = A_Objek::where(
                        'status', '=', 'tampil'
                )
                ->orderBy('nama_objek', 'asc')
                ->get();

        // print_r($objekss);

        return view('admin.wisatawan.create', [
            'negaras' => $negaras,
            'jks' => $jks,
            'tujuans' => $tujuans,
            'objeksss' => $objeksss
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
                /*
                  'nama'    => 'required',
                  'negara'  => 'required',
                  'jk'      => 'required',
                  'tujuan'  => 'required',
                  'umur'        => 'required|integer',
                  'kunjungan'   => 'required|integer',
                 */
        ]);


        $isinegara = A_KriteriaSub::where('kode', '=', $request->negara)->first();
        $isijk = A_KriteriaSub::where('kode', '=', $request->jk)->first();
        $isitujuan = A_KriteriaSub::where('kode', '=', $request->tujuan)->first();


        $wisatawan = new A_Wisatawan;
        $wisatawan->nama = $request->nama;
        // $wisatawan->negara    = $isinegara->nama_kriteria_sub;
        // $wisatawan->jk        = $isijk->nama_kriteria_sub;
        // $wisatawan->tujuan    = $isitujuan->nama_kriteria_sub;
        // $wisatawan->umur      = $request->umur;
        // $wisatawan->kunjungan = $request->kunjungan;
        $wisatawan->user = $request->user()->email;

        //$wisatawan->A_DetailWisatawan()->attach(Input::get('nama_objek'));
        //print_r($request->objeks);
        //print_r($request->negara);
        //print_r($wisatawan);

        $wisatawan->save();

        // foreach($request->objeks as $idObjek) {
        //   $insertData = array();
        //   if (!empty($request->negara)) {
        //     $insertData[] = [
        //       'id_wisatawan' => $wisatawan->id,
        //       'id_objek' => $idObjek,
        //       'kode_kriteria' => $request->negara,
        //     ];
        //   }
        //   if (!empty($request->jk)) {
        //     $insertData[] = [
        //       'id_wisatawan' => $wisatawan->id,
        //       'id_objek' => $idObjek,
        //       'kode_kriteria' => $request->jk,
        //     ];
        //   }
        //   if (!empty($request->tujuan)) {
        //     $insertData[] = [
        //       'id_wisatawan' => $wisatawan->id,
        //       'id_objek' => $idObjek,
        //       'kode_kriteria' => $request->tujuan,
        //     ];
        //   }
        //   if (!empty($request->umur)) {
        //     $insertData[] = [
        //               'id_wisatawan' => $wisatawan->id,
        //               'id_objek' => $idObjek,
        //               'kode_kriteria' => '5k'.$request->umur,
        //     ];
        //   }
        //   if (!empty($request->kunjungan)) {
        //     $insertData[] = [
        //       'id_wisatawan' => $wisatawan->id,
        //       'id_objek' => $idObjek,
        //       'kode_kriteria' => '6k'.$request->kunjungan,
        //     ];
        //   }
        //   //print_r($insertData);
        //   $iddd = A_DetailWisatawan::insert($insertData);
        // }


        $insertData = array();
        if (!empty($request->negara)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => $request->negara,
            ];
        }
        if (!empty($request->jk)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => $request->jk,
            ];
        }
        if (!empty($request->tujuan)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => $request->tujuan,
            ];
        }
        if (!empty($request->umur)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => '5k' . $request->umur,
            ];
        }
        if (!empty($request->kunjungan)) {
            $insertData[] = [
                'id_wisatawan' => $wisatawan->id,
                'kode_kriteria' => '6k' . $request->kunjungan,
            ];
        }

        $iddd = A_DetailWisatawan::insert($insertData);


        foreach ($request->objeks as $idObjeks) {
            $masukData = array();
            $masukData[] = [
                'id_wisatawan' => $wisatawan->id,
                'id_objek' => $idObjeks,
                'vote' => 1,
            ];

            //  print_r($masukData);

            $iddd2 = A_WisataObjek::insert($masukData);
        }



        return redirect('admin/wisatawan/create')->with('message', 'Wisatawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //$wisata = wisata::find($id);
        $wisata = A_Wisatawan::where('id', $id)->first();

        if (!$wisata) {
            abort(404);
        }

        return view('admin.wisatawan.single')->with('wisata', $wisata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $wisata = A_Wisatawan::find($id);

        if (!$wisata) {
            abort(404);
        }

        return view('admin.wisatawan.edit')->with('wisata', $wisata);
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
            'nama' => 'required',
            'negara' => 'required',
            'umur' => 'required',
            'jk' => 'required',
            'tujuan' => 'required',
        ]);

        $wisata = A_Wisatawan::find($id);
        $wisata->nama = $request->nama;
        $wisata->negara = $request->negara;
        $wisata->umur = $request->umur;
        $wisata->jk = $request->jk;
        $wisata->tujuan = $request->tujuan;

        $wisata->save();
        return redirect('admin/wisatawan')->with('message', 'Wisatawan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //hapus di tabel wisatawan
        $wisata = A_Wisatawan::find($id);
        $wisata->delete();

        //hapus di tabel detail wisatawan
        $de_wi = A_DetailWisatawan::where('id_wisatawan', $id);
        $de_wi->delete();

        //hapus di tabel wisata objek
        $de_wio = A_WisataObjek::where('id_wisatawan', $id);
        $de_wio->delete();

        return redirect('admin/wisatawan')->with('message', 'Wisatawan berhasil dihapus');
    }

    /**
     * EXPORT KE EXCEL.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function export() {
        $tahun1 = 2016;
        $tahunnow = date('Y');

        return view('admin.wisatawan.export', ['tahun1' => $tahun1, 'tahunnow' => $tahunnow]);
    }

    /**
     * Aksi Export wisatawan mancanegara.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportPost(Request $request) {
        // validasi
        // $this->validate($request, [
        //   'created_at'=>'required',
        // ], [
        //   'created_at.required'=>'Anda belum memilih tahun.'
        // ]);

        $tahun = $request->tahun;

        //** ngambil dari model A_Wisatawan
        $getAWisatawan = new \App\A_Wisatawan();
        $wisatas = $getAWisatawan->getA_ExportManca($tahun);


        $waktu = date('d-m-Y');

        \Excel::create('Data Wisatawan Mancanegara Tahun ' . $tahun . ' diunduh tanggal ' . $waktu, function($excel) use ($wisatas) {
            // Set property
            $excel->setTitle('Data Wisatawan Mancanegara')
                    ->setCreator(Auth::user()->name);

            $excel->sheet('Data Wisatawan Mancanegara', function($sheet) use ($wisatas) {
                $row = 1;
                $nomor = 1;
                $sheet->row($row, [
                    'No.',
                    'Dibuat tgl',
                    'Nama',
                    'Negara',
                    'JK',
                    'Tujuan',
                    'Umur',
                    'Frekuensi'
                ]);
                foreach ($wisatas as $wisata) {
                    $sheet->row( ++$row, [
                        $nomor++,
                        $wisata->created_at,
                        $wisata->nama,
                        $wisata->country,
                        $wisata->gender,
                        $wisata->purpose,
                        $wisata->umur,
                        $wisata->frekuensi
                    ]);
                }
            });
        })->export('xls');
    }

    /**
     * Aksi Export wisatawan lokal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportLokal(Request $request) {

        $tahun = $request->tahun;

        //** ngambil dari model A_Wisatawan
        $getAWisatawan = new \App\A_Wisatawan();
        $wisatas = $getAWisatawan->getA_ExportLokal($tahun);


        $waktu = date('d-m-Y');

        \Excel::create('Data Wisatawan Lokal Tahun ' . $tahun . ' diunduh tanggal ' . $waktu, function($excel) use ($wisatas) {
            // Set property
            $excel->setTitle('Data Wisatawan Lokal')
                    ->setCreator(Auth::user()->name);

            $excel->sheet('Data Wisatawan Lokal', function($sheet) use ($wisatas) {
                $row = 1;
                $nomor = 1;
                $sheet->row($row, [
                    'No.',
                    'Dibuat tgl',
                    'Nama',
                    'Daerah',
                    'JK',
                    'Tujuan',
                    'Umur',
                    'Frekuensi'
                ]);
                foreach ($wisatas as $wisata) {
                    $sheet->row( ++$row, [
                        $nomor++,
                        $wisata->created_at,
                        $wisata->nama,
                        $wisata->country,
                        $wisata->gender,
                        $wisata->purpose,
                        $wisata->umur,
                        $wisata->frekuensi
                    ]);
                }
            });
        })->export('xls');
    }

}
