<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpjs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 1);
            $table->string('NIK', 10);
            $table->date('tgl_lahir');
            $table->string('kelas_rawat', 10);
            $table->boolean('status_premi');
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
        Schema::drop('bpjs');
    }
}
