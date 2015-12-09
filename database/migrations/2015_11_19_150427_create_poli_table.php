<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliTable extends Migration
{

    public function up()
    {
        Schema::create('poli', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->string('id', 5)->primary();
            $table->string('nama_poli', 50);
            $table->text('deskripsi');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('poli');
    }
}
