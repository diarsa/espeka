<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class HasilWisataTemp extends Model {

    protected $table = 't_hasil_temp';

    //  public function wisatawan() {
    //	return $this->belongsToMany('A_Wisatawan', 'wisatawans', 'id', 'id_wisatawan');
    //  }
    //    protected $fillable = [
    //    'id_wi', 'hasil', 'nilai'
    // ];
}
