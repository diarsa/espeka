<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Objek;
use DB;
use Cornford\Googlmapper\Mapper;

class ObjekController extends Controller {
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $objeks = Objek::where([
                        ['status', '=', 'tampil'],
                        //['populer','=','ya']
                ])
                ->orderBy('id', 'desc')
                ->paginate(9);

        $objekcats = DB::table('objek_kat')
                ->orderBy('nama_kat', 'asc')
                ->get();

        // $uid = \Auth::user()->email;
        // $idwi = \App\Wisatawan::where('user',$uid)->orderBy('id','desc')->first();
        // if (empty($idwi)) {
        //   $id = \Auth::user()->email;
        // } else {
        //   $id = $idwi->id;
        // }
        // $udi = $id;
        // print_r($udi);
        // $kata = '%'.$_POST['kategori'].'%';
        // $caris = Objek::where('kategori', 'LIKE', $kata)->get();

        return view('objek.index'
                , ['objeks' => $objeks]
                , ['objekcats' => $objekcats]
                //,['caris' => $caris]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
// public function create()
// {
//     return view('blog.create');
// }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
// public function store(Request $request)
// {
//     $this->validate($request, [
//       'title'   => 'required',
//       'subject' => 'required',
//     ]);
//     $blog = new Objek;
//     $blog->title   = $request->title;
//     $blog->subject = $request->subject;
//     $blog->slug    = str_slug($request->title, '-');
//     $blog->save();
//     return redirect('blog')->with('message', 'Blog sudah diupdate!');
// }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nama_objek) {
        //$blog = Blog::find($id);
//    $objek = Objek::where('slug', $nama_objek)->first();


        $objek = Objek::where('slug', $nama_objek)
                ->first();

        // print_r($objek);

        if (empty($objek)) {
            abort(404);
        } else {

            $nama_kats = DB::table('objek_kat')
                    ->where('id', $objek->kategori)
                    ->orderBy('id', 'desc')
                    ->get();

            $obl = $objek->id;

            $obj_lain = Objek::inRandomOrder()
                    ->where(function($ass) use ($obl) {
                        $ass->where('id', '<>', $obl)
                        ->where('status', 'tampil');
                    })
                    ->limit(5)
                    ->get();

            // print_r($obj_lain);
        }



        $mapper = \Mapper::map($objek->lat, $objek->lng, ['zoom' => 12, 'eventClick' => 'console.log("left click");']);

        return view('objek.single', ['objek' => $objek
            , 'nama_kats' => $nama_kats
            , 'obj_lain' => $obj_lain
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
// public function edit($id)
// {
//   $blog = Objek::find($id);
//   if(!$blog){
//     abort(404);
//   }
//   return view('blog.edit')->with('blog', $blog);
// }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
// public function update(Request $request, $id)
// {
//   $this->validate($request, [
//     'title'   => 'required',
//     'subject' => 'required',
//   ]);
//   $blog = Objek::find($id);
//   $blog->title   = $request->title;
//   $blog->subject = $request->subject;
//   $blog->slug    = str_slug($request->title, '-');
//   $blog->save();
//   return redirect('blog')->with('message', 'Blog sudah diedit!');
// }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
// public function destroy($id)
// {
//     $blog = Objek::find($id);
//     $blog->delete();
//     return redirect('blog')->with('message', 'Blog sudah dihapus!');
// }


    public function cariobjek($kategori) {

        $hasilc = Objek::where(['kategori' => $kategori, 'status' => 'tampil'])
                ->orderBy('id', 'asc')
                ->paginate(9);

        $nama_kats = DB::table('objek_kat')
                ->where('id', $kategori)
                ->orderBy('id', 'desc')
                ->get();

        // print_r($nama_kats);


        return view('objek.hasilcari', ['hasilc' => $hasilc], ['nama_kats' => $nama_kats]);

        // $kata = $request->get('q');
        // $hasil = Objek::where('kategori', 'LIKE', '%'.$kata.'%')->paginate(9);
        //
    // return view('result', compact('hasil', 'kata'));
    }

}
