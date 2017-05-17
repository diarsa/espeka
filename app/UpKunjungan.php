<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Objek;

class UpKunjungan extends Model {
    //

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upKunjungan($id, $berapa) {

        $objek = Objek::select('id', 'hits')->where('id', $id)->first();
        $hitnow = $objek->hits;
        $jumlahnya = $hitnow + $berapa;

        $up = Objek::find($id);
        $up->hits = $jumlahnya;

        $up->save();
    }

}
