<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelZdetailwisatawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zdetailwisatawans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_wisatawan');
            $table->integer('id_kriteria');
            $table->integer('kode_kriteria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zdetailwisatawans');
    }
}
