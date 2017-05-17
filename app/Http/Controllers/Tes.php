<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library;

class Tes extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.layout.master2');
    }

    public function tes2() {
        $objekcs = [];
        $hits = [];
        foreach (\App\A_Objek::where('hits', '>', 0)->limit(5)->get() as $objekc) {
            array_push($objekcs, $objekc->nama_objek);
            array_push($hits, $objekc->hits);
        }

        return view('admin.tes2', compact('objekcs', 'hits'));
    }

    public function test() {
        $ds = new Library\DS();
        $bayes = new Library\Naive();

        $tes = new \App\Tes();
        $negara = $tes->getKunjunganWisata('2k72');
        $negara = $this->getArr($negara);

        $jk = $tes->getKunjunganWisata('3k1');
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

}
