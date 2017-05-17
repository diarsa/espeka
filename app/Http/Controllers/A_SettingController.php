<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Setting;

class A_SettingController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index() {
        $settings = Setting::orderBy('id', 'asc')->paginate();
        return view('admin.setting.index', ['settings' => $settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.objek.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
                // 'nama_objek'   => 'required|min:3',
                // 'alamat' => 'required|min:3',
        ]);

        for ($e = 1; $e <= Setting::count(); $e++) {
            $edd = Setting::where('id', '=', $e)->update([
                'nama' => $request->{"nama{$e}"},
                'isi' => $request->{"isi{$e}"},
            ]);
        }

        return redirect('admin/settings')->with('message', 'Pengaturan berhasil di perbaharui');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // $objek = A_Objek::where('id', $id)->first();
        //
    // if(!$objek){
        //   abort(503);
        // }
        //
    // return view('admin.objek.single')->with('objek', $objek);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // $setting = Setting::find($id);
        //
    //   if(!$setting){
        //     abort(404);
        //   }
        //
    //   return view('admin.setting.edit')->with('setting', $setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // $objek = A_Objek::find($id);
        // $objek->delete();
        // return redirect('admin/objek')->with('message', 'Objek wisata berhasil dihapus!');
    }

}
