<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\A_WisataObjek;

class Objek extends Model {

    protected $table = 'objek';

    public function getTotalKunj($id) {

        $total = A_WisataObjek::count('id_wisatawan')
                ->where('id_objek', $id)
                ->get();

        return $total;
    }

}
