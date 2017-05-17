<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CariData extends Model {

    protected $table = 't_detail_wisatawan';

    public function getKunjunganWisata($kode) {
        $result = DB::table('t_detail_wisatawan')
                ->join('t_wisata_objek', 't_wisata_objek.id_wisatawan', '=', 't_detail_wisatawan.id_wisatawan')
                ->select(DB::raw('t_detail_wisatawan.id_wisatawan as id_wisatawan, 
				t_detail_wisatawan.kode_kriteria as kode_kriteria, 
				t_wisata_objek.id_objek as id_objek, 
				GROUP_CONCAT(DISTINCT t_wisata_objek.id_objek ORDER BY t_wisata_objek.id_objek ASC) as group_id_objek'))
                ->where([
                        ['kode_kriteria', '=', $kode]
                    , ['status', '=', 'show']
                ])
                ->groupBy('t_detail_wisatawan.id_wisatawan')
                ->get();
        return $result;
    }

    public function getKunjunganWisataNv($kode) {
        $result = DB::table('t_detail_wisatawan')
                ->join('t_wisata_objek', 't_detail_wisatawan.id_wisatawan', '=', 't_wisata_objek.id_wisatawan')
                ->select(DB::raw(
                                't_detail_wisatawan.id_wisatawan as id_wisatawan,
                        t_detail_wisatawan.kode_kriteria as kode_kriteria, 
                        t_wisata_objek.id_objek as id_objek,
                        GROUP_CONCAT(DISTINCT t_wisata_objek.id_objek ORDER BY t_wisata_objek.id_objek ASC) as group_id_objek'))
                ->where([
                        ['kode_kriteria', 'LIKE', $kode]
                    , ['status', '=', 'show']
                ])
                ->groupBy('t_detail_wisatawan.id_wisatawan')
                ->get();

        return $result;
    }

}
