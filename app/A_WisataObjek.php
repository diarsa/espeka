<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class A_WisataObjek extends Model {

    protected $table = 't_wisata_objek';

    //  public function wisatawan() {
    //	return $this->belongsToMany('A_Wisatawan', 'wisatawans', 'id', 'id_wisatawan');
    //  }

    public function getTotalKunj($id) {

        $total = A_WisataObjek::count('id_wisatawan')
                ->where('id_objek', $id)
                ->get();

        return $total;
    }

}
