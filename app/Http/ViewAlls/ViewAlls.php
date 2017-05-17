<?php

namespace App\Http\ViewAlls;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Repositories\UserRepsository;
use DB;
use App\Setting;

class ViewAlls
{
    public function compose(View $view)
    {

//Footer Berita
      $fberitas = DB::table('berita')
        ->orderBy ('views','desc')
        ->limit (2)
        ->get();

      $view->with('fberitas', $fberitas);

//Footer Tentang
      // $ftentangs = DB::table('tentang')
      //   ->orderBy ('id','desc')
      //   ->get();
      //
      // $view->with('ftentangs', $ftentangs);

//Footer Objek Wisata Populer
      $fobjeks = DB::table('objek')
        // ->where('hits', '>', 0)
        ->orderBy('hits','desc')
        ->limit(3)
        ->get();

      $view->with('fobjeks', $fobjeks);

//Objek Wisata Lainnya pada Detail OB
      $dobjeks = DB::table('objek')
        ->where ('status', '=', 'tampil')
//        ->orderBy ('id','desc')
        ->inRandomOrder()
        ->limit (5)
        ->get();

      $view->with('dobjeks', $dobjeks);

//Untuk Input Wisatawan dengan objek di halaman admin
      $objekss = DB::table('objek')
        ->where (
          'status', '=', 'tampil'
        )
        ->orderBy ('id','asc')
        // ->limit(10)
        ->get();
      $view->with('objekss', $objekss);


//Untuk SETTING in front
    $deskripsi_sistem = Setting::where('setting', 'deskripsi_sistem')
      ->get();
    $view->with('deskripsi_sistem' , $deskripsi_sistem);

// setting 3 deskripsi singkat
    $des1 = Setting::where('setting', 'des1')
      ->get();

    $view->with('des1' , $des1);

    $des2 = Setting::where('setting', 'des2')
      ->get();
    $view->with('des2' , $des2);

    $des3 = Setting::where('setting', 'des3')
      ->get();
    $view->with('des3' , $des3);

// setting tanya jawab / FAQs
    $tjs = Setting::where('setting', 'faq')
      ->get();
    $view->with('tjs' , $tjs);

// setting tentang des singkat
    $fdes = Setting::where('setting', 'about_des')
      ->get();
    $view->with('fdes' , $fdes);

// setting tentang alamat, phone, dan email
    $ftentangs = Setting::where('setting', 'about')
      ->orderBy('id','desc')
      ->get();
    $view->with('ftentangs' , $ftentangs);

// setting tentang alamat, phone, dan email di header
    $htentangs = Setting::where('setting', 'about')
      ->orderBy('id','desc')
      ->limit(2)
      ->get();
    $view->with('htentangs' , $htentangs);


// UNTUK testimoni di dashboard
    $dtestimos = DB::table('testimonis')
      ->where([
          ['id', '=', '1'],
          ['status', 'tampil'],
        ])
      ->get();
    $view->with('dtestimos' , $dtestimos);

    $dtestimos1 = DB::table('testimonis')
      ->where([
          ['id', '>', '1'],
          ['status', 'tampil'],
        ])
      ->limit(9)
      ->get();
    $view->with('dtestimos1' , $dtestimos1);




    }
}
