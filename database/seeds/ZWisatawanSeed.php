<?php

use Illuminate\Database\Seeder;

class ZWisatawanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\TWisatawan::create([
        'name' => 'Wayan',
        'lastname' => 'Yudie',
        'email' => 'wayan@mail.com'
      ]);

      App\TWisatawan::create([
        'name' => 'Diar',
        'lastname' => 'Sa',
        'email' => 'diar@mail.com'
      ]);


    }
}
