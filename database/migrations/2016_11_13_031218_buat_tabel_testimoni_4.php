<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelTestimoni4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('negara');
            $table->string('isi');
            $table->string('email');
            $table->timestamps();
            $table->foreign('email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('testimonis');
    }
}
