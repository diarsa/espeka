<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // sample admin
      App\User::create([
        'name' => 'Admin',
        'lastname' => 'Disbudpar',
        'email' => 'disbudpar@banglikab.go.id',
        'password' => bcrypt('tanyabayudiarsa'),
        'role' => 'admin'
      ]);

      // sample customer
      App\User::create([
        'name' => 'Bayu',
        'lastname' => 'Pertama',
        'email' => 'idiarsa@hotmail.com',
        'password' => bcrypt('idiarsa'),
        'role' => 'wisatawan'
      ]);
    }
}
