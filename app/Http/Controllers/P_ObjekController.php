<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\A_Objek;
use App\Wisatawan;
use DB;
use App\Http\Requests;

class P_ObjekController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        // $this->middleware('role:petugas');
    }

    public function index() {

        $objeks = A_Objek::orderBy('id', 'desc')->paginate();

        return view('petugas.objek.index', ['objeks' => $objeks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $kats = DB::table('objek_kat')
                ->orderBy('nama_kat', 'asc')
                ->get();
        return view('petugas.objek.create', ['kats' => $kats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'nama_objek' => 'required|min:3|unique:objek',
            'kategori' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'image' => 'image|max:3000',
            'image2' => 'image|max:3000',
            'image3' => 'image|max:3000',
            'sumber_gambar' => 'required',
            'alamat' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $objek = new A_Objek;
        $objek->nama_objek = $request->nama_objek;
        $objek->kategori = $request->kategori;
        $objek->keterangan = $request->keterangan;
        $objek->status = $request->status;
        $objek->sumber_gambar = $request->sumber_gambar;
        $objek->alamat = $request->alamat;
        $objek->lat = $request->lat;
        $objek->lng = $request->lng;
        $objek->slug = str_slug($request->nama_objek, '-');

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $destinationPath = 'assets/images/img1';
            $file->move($destinationPath, $file->getClientOriginalName());

            $objek->img1 = $file->getClientOriginalName();
            # code...
        }

        if (Input::hasFile('image2')) {
            $file2 = Input::file('image2');
            $destinationPath2 = 'assets/images/img2';
            $file2->move($destinationPath2, $file2->getClientOriginalName());

            $objek->img2 = $file2->getClientOriginalName();
            # code...
        }

        if (Input::hasFile('image3')) {
            $file3 = Input::file('image3');
            $destinationPath3 = 'assets/images/img3';
            $file3->move($destinationPath3, $file3->getClientOriginalName());

            $objek->img3 = $file3->getClientOriginalName();
            # code...
        }

        if (Input::hasFile('img_slider')) {
            $file4 = Input::file('img_slider');
            $destinationPath4 = 'assets/images/img_slider';
            $file4->move($destinationPath4, $file4->getClientOriginalName());

            $objek->img_slider = $file4->getClientOriginalName();
            # code...
        }

        $objek->save();
        return redirect('petugas/objek')->with('message', 'Objek Wisata Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $objek = A_Objek::where('id', $id)->first();

        if (!$objek) {
            abort(503);
        }

        return view('petugas.objek.single')->with('objek', $objek);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $objek = A_Objek::find($id);

        if (!$objek) {
            abort(404);
        }

        $kats = DB::table('objek_kat')
                ->orderBy('nama_kat', 'asc')
                ->get();

        return view('petugas.objek.edit', ['objek' => $objek], ['kats' => $kats]);
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
            'nama_objek' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            // 'image'       => 'image|max:3000',
            // 'image2'      => 'image|max:3000',
            // 'image3'      => 'image|max:3000',
            'alamat' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'sumber_gambar' => 'required',
        ]);

        $objek = A_Objek::find($id);
        $objek->nama_objek = $request->nama_objek;
        $objek->kategori = $request->kategori;
        $objek->keterangan = $request->keterangan;
        $objek->status = $request->status;
        $objek->sumber_gambar = $request->sumber_gambar;
        $objek->alamat = $request->alamat;
        $objek->slug = str_slug($request->nama_objek, '-');
        $objek->lat = $request->lat;
        $objek->lng = $request->lng;
        if (Input::hasFile('nimage')) {
            $file = Input::file('nimage');
            $destinationPath = 'assets/images/img1';
            $file->move($destinationPath, $file->getClientOriginalName());

            $objek->img1 = $file->getClientOriginalName();
            # code...
        }

        if (Input::hasFile('nimage2')) {
            $file2 = Input::file('nimage2');
            $destinationPath2 = 'assets/images/img2';
            $file2->move($destinationPath2, $file2->getClientOriginalName());

            $objek->img2 = $file2->getClientOriginalName();
            # code...
        }

        if (Input::hasFile('nimage3')) {
            $file3 = Input::file('nimage3');
            $destinationPath3 = 'assets/images/img3';
            $file3->move($destinationPath3, $file3->getClientOriginalName());

            $objek->img3 = $file3->getClientOriginalName();
            # code...
        }

        if (Input::hasFile('img_slider')) {
            $file4 = Input::file('img_slider');
            $destinationPath4 = 'assets/images/img_slider';
            $file4->move($destinationPath4, $file4->getClientOriginalName());

            $objek->img_slider = $file4->getClientOriginalName();
            # code...
        }

        $objek->save();
        return redirect('petugas/objek')->with('message', 'Objek wisata berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $objek = A_Objek::find($id);
        $objek->delete();
        return redirect('petugas/objek')->with('message', 'Objek wisata berhasil dihapus!');
    }

}
