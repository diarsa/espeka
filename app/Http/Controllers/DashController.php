<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Berita;
use App\Objek;
use App\Http\Requests;

class DashController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('guest');
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard() {

        //$objeks = Objek::paginate(10);
        $sliders = DB::table('objek')
                ->where([
                        ['img_slider', '<>', ''],
                        ['status', 'tampil']
                ])
//        ->orderBy ('id','desc')
                ->inRandomOrder()
//        ->limit (10)
                ->get();

        $objeks = Objek::
                where('hits', '>=', 0)
                ->orderBy('hits', 'desc')
                ->limit(5)
                ->get();

        // $objekp = Objek::all();

        $persen = $objeks->sum('hits');

        $beritas = DB::table('berita')
                ->orderBy('id', 'desc')
                ->limit(2)
                ->get();

        //JIKA NOT FOUND
        //if(!$sliders){
        //  abort();
        //}

        return view('dashboard', [
            'sliders' => $sliders
            , 'objeks' => $objeks
            , 'beritas' => $beritas
            , 'persen' => $persen
        ]);
        //       ['objeks' => $objeks], ['beritas' => $beritas], ['persen' => $persen]);
        //  return view('dashboard');
    }

    public function brb() {
        return view('errors.503');
    }

    public function profile() {

        return view('profile');
    }

    public function berita() {
        return view('berita');
    }

    public function child() {
        return view('child');
    }

    public function tes() {
        return view('tes');
    }

}
