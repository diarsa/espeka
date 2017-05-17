<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Wisatawan extends Model {

    protected $table = 't_wisatawan';

    /**
     * get data wisatawan mancanegara.
     *
     * @param  
     * @return 
     */
    public function getWisatawan($idwisa) {

        $getwisatas = DB::table('t_wisatawan')
                ->leftJoin('t_detail_wisatawan', 't_detail_wisatawan.id_wisatawan', '=', 't_wisatawan.id')
                ->leftJoin('t_kriteria_sub', 't_kriteria_sub.kode', '=', 't_detail_wisatawan.kode_kriteria')
                ->leftJoin('t_wisata_objek', 't_wisata_objek.id_wisatawan', '=', 't_wisatawan.id')
                ->select('t_wisatawan.created_at', 't_wisatawan.id', 't_wisatawan.nama', 't_wisatawan.jenis', DB::raw(
                                "
		        max(case when t_detail_wisatawan.kode_kriteria like '2k%' then t_kriteria_sub.nama_kriteria_sub else '' end) as country, 
		        max(case when t_detail_wisatawan.kode_kriteria like '3k%' then t_kriteria_sub.nama_kriteria_sub else '' end) as gender, 
		        max(case when t_detail_wisatawan.kode_kriteria like '4k%' then t_kriteria_sub.nama_kriteria_sub else '' end) as purpose,

		        max(case when t_detail_wisatawan.kode_kriteria like '5k%' then (SELECT SUBSTRING(kode_kriteria,3)) else '0' end) as umur,
		        max(case when t_detail_wisatawan.kode_kriteria like '6k%' then (SELECT SUBSTRING(kode_kriteria,3)) else '0' end) as frekuensi,

		        group_concat(distinct t_wisata_objek.id_objek) as visit_to

		        "
                        )
                )
                ->where(function($id22) use ($idwisa) {
                    $id22->where('t_detail_wisatawan.id_wisatawan', '=', $idwisa);
                })
                ->groupBy('t_wisatawan.id', 't_wisatawan.nama')
                ->get();

        return $getwisatas;
    }

}
