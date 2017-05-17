<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\A_Objek;
// use App\Testimoni;
use App\Wisatawan;

use DB;

class ADashController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }

  public function index()
  {

  //  $tusers = \Auth::count();

      $hitung = DB::table('t_wisata_objek')
      ->select('id_objek', DB::raw('count(*) as total'))
      ->groupBy('id_objek')
      // ->limit(5)
      ->get();

      // uasort($hitung);

      // function aasort (&$hitung, $key) {
      //     $sorter=array();
      //     $ret=array();
      //     reset($hitung);
      //     foreach ($hitung as $ii => $va) {
      //         $sorter[$ii]=$va[$key];
      //     }
      //     asort($sorter);
      //     foreach ($sorter as $ii => $va) {
      //         $ret[$ii]=$hitung[$ii];
      //     }
      //     $hitung=$ret;
      // }

      // aasort($hitung,"total");

      // print_r($hitung);
      // dd($hitung);

      // $idhitung = $hitung->id_objek;
      // dd($idhitung);


      
      $objekcs = [];
      $hits = [];
      $hitz = [];
      // foreach (\App\A_Objek::orderBy('hits','desc')->limit(5)->get() as $objekc) {
      //   array_push($objekcs, $objekc->nama_objek);
      //   array_push($hits, $objekc->hits);
      // }

      // $tahun = 03;
      foreach (DB::table('t_wisata_objek')
      ->select('id_objek', DB::raw('count(*) as total'))
      // ->whereMonth('created_at', '=', $tahun)
      ->groupBy('id_objek')
      ->limit(10)
      ->get() as $hit) {
        array_push($hits, $hit->total);
        array_push($hitz, $hit->id_objek);
      }


      foreach (\App\A_Objek::whereIn('id',$hitz)->get() as $objekc) {
        array_push($objekcs, $objekc->nama_objek);
      }

      // dd($objekcs);


      // $testimo = Testimoni::count();

      $totlokal = Wisatawan::where('jenis','1')->count();
      $totmanca = Wisatawan::where('jenis','0')->count();
      $totalwi = Wisatawan::count();

    return view ('admin.dashboard', [
      // 'tusers'=>$tusers,
      'objekcs'=>$objekcs,
      'hits'=>$hits,
      // 'testimo'=>$testimo,
      'totlokal'=>$totlokal,
      'totmanca'=>$totmanca,
      'totalwi'=>$totalwi,
    ]);
  }




}
