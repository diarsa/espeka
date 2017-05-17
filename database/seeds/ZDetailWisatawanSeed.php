<?php

use Illuminate\Database\Seeder;

class ZDetailWisatawanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\TDetailWisatawan::create([
        'id_wisatawan' => '1',
        'id_kriteria' => '2',
        'kode_kriteria' => '2k72'
      ]);

      App\TDetailWisatawan::create([
        'id_wisatawan' => '1',
        'id_kriteria' => '3',
        'kode_kriteria' => '3k1'
      ]);

      App\TDetailWisatawan::create([
        'id_wisatawan' => '1',
        'id_kriteria' => '4',
        'kode_kriteria' => '4k1'
      ]);

      App\TDetailWisatawan::create([
        'id_wisatawan' => '2',
        'id_kriteria' => '2',
        'kode_kriteria' => '2k44'
      ]);

      App\TDetailWisatawan::create([
        'id_wisatawan' => '2',
        'id_kriteria' => '3',
        'kode_kriteria' => '3k1'
      ]);

      App\TDetailWisatawan::create([
        'id_wisatawan' => '1',
        'id_kriteria' => '4',
        'kode_kriteria' => '4k2'
      ]);


    }
}
