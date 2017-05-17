<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use DB;

class A_Wisatawan extends Eloquent {

    protected $table = 't_wisatawan';

    /**
     * get data wisatawan mancanegara.
     *
     * @param  
     * @return 
     */
    public function get_wisatawanManca() {

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
                ->where('t_wisatawan.jenis', '0')
                ->groupBy('t_wisatawan.id', 't_wisatawan.nama')
                ->get();

        return $getwisatas;
    }

    /**
     * get data wisatawan lokal.
     *
     * @param  
     * @return 
     */
    public function get_wisatawanLokal() {

        $getwisatas = DB::table('t_wisatawan')
                ->leftJoin('t_detail_wisatawan', 't_detail_wisatawan.id_wisatawan', '=', 't_wisatawan.id')
                ->leftJoin('t_kriteria_sub', 't_kriteria_sub.kode', '=', 't_detail_wisatawan.kode_kriteria')
                ->leftJoin('t_wisata_objek', 't_wisata_objek.id_wisatawan', '=', 't_wisatawan.id')
                ->select('t_wisatawan.created_at', 't_wisatawan.id', 't_wisatawan.nama', 't_wisatawan.jenis', DB::raw(
                                "
		        max(case when t_detail_wisatawan.kode_kriteria like '7k%' then t_kriteria_sub.nama_kriteria_sub else '' end) as country, 
		        max(case when t_detail_wisatawan.kode_kriteria like '3k%' then t_kriteria_sub.nama_kriteria_sub else '' end) as gender, 
		        max(case when t_detail_wisatawan.kode_kriteria like '4k%' then t_kriteria_sub.nama_kriteria_sub else '' end) as purpose,

		        max(case when t_detail_wisatawan.kode_kriteria like '5k%' then (SELECT SUBSTRING(kode_kriteria,3)) else '0' end) as umur,
		        max(case when t_detail_wisatawan.kode_kriteria like '6k%' then (SELECT SUBSTRING(kode_kriteria,3)) else '0' end) as frekuensi,

		        group_concat(distinct t_wisata_objek.id_objek) as visit_to

		        "
                        )
                )
                ->where('t_wisatawan.jenis', '1')
                ->groupBy('t_wisatawan.id', 't_wisatawan.nama')
                ->get();

        return $getwisatas;
    }

    /**
     * get data wisatawan mancanegara kemudian di export.
     *
     * @param  
     * @return 
     */
    public function getA_ExportManca($tahun) {

        $getwisatas = DB::table('t_wisatawan')
                ->leftJoin('t_detail_wisatawan', 't_detail_wisatawan.id_wisatawan', '=', 't_wisatawan.id')
                ->leftJoin('t_kriteria_sub', 't_kriteria_sub.kode', '=', 't_detail_wisatawan.kode_kriteria')
                ->leftJoin('t_wisata_objek', 't_wisata_objek.id_wisatawan', '=', 't_wisatawan.id')
                ->select('t_wisatawan.created_at', 't_wisatawan.id', 't_wisatawan.nama', DB::raw(
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
                ->orWhere(function ($qtahun) use ($tahun) {
                    $qtahun->where('t_wisatawan.jenis', '0')
                    ->whereYear('t_wisatawan.created_at', '=', $tahun);
                })
                ->groupBy('t_wisatawan.id', 't_wisatawan.nama')
                ->get();

        return $getwisatas;
    }

    /**
     * get data wisatawan lokal kemudian di export.
     *
     * @param  
     * @return 
     */
    public function getA_ExportLokal($tahun) {

        $getwisatas = DB::table('t_wisatawan')
                ->leftJoin('t_detail_wisatawan', 't_detail_wisatawan.id_wisatawan', '=', 't_wisatawan.id')
                ->leftJoin('t_kriteria_sub', 't_kriteria_sub.kode', '=', 't_detail_wisatawan.kode_kriteria')
                ->leftJoin('t_wisata_objek', 't_wisata_objek.id_wisatawan', '=', 't_wisatawan.id')
                ->select('t_wisatawan.created_at', 't_wisatawan.id', 't_wisatawan.nama', DB::raw(
                                "
		        max(case when t_detail_wisatawan.kode_kriteria like '7k%' then t_kriteria_sub.nama_kriteria_sub else '' end) as country, 
		        max(case when t_detail_wisatawan.kode_kriteria like '3k%' then t_kriteria_sub.nama_kriteria_sub else '' end) as gender, 
		        max(case when t_detail_wisatawan.kode_kriteria like '4k%' then t_kriteria_sub.nama_kriteria_sub else '' end) as purpose,

		        max(case when t_detail_wisatawan.kode_kriteria like '5k%' then (SELECT SUBSTRING(kode_kriteria,3)) else '0' end) as umur,
		        max(case when t_detail_wisatawan.kode_kriteria like '6k%' then (SELECT SUBSTRING(kode_kriteria,3)) else '0' end) as frekuensi,

		        group_concat(distinct t_wisata_objek.id_objek) as visit_to

		        "
                        )
                )
                ->orWhere(function ($qtahun) use ($tahun) {
                    $qtahun->where('t_wisatawan.jenis', '1')
                    ->whereYear('t_wisatawan.created_at', '=', $tahun);
                })
                ->groupBy('t_wisatawan.id', 't_wisatawan.nama')
                ->get();

        return $getwisatas;
    }

}
