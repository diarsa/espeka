<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\A_Objek;
use App\Wisatawan;
use DB;
use App\Http\Requests;

class P_PetugasController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:petugas');
    }

    public function index() {
        $totlokal = Wisatawan::where('jenis', '1')->count();
        $totmanca = Wisatawan::where('jenis', '0')->count();
        $totalwi = Wisatawan::count();

        return view('petugas.index', ['totlokal' => $totlokal, 'totmanca' => $totmanca, 'totalwi' => $totalwi]);
    }

    public function show($id) {
        return view('errors.404');
    }

}
