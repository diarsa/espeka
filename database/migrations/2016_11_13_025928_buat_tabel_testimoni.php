<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelTestimoni extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('testimoni', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nama');
          $table->string('pekerjaan');
          $table->string('isi');
          $table->string('img');
          $table->enum('status',['tampil','sembunyi']);
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
        Schema::drop('testimoni');
    }
}
