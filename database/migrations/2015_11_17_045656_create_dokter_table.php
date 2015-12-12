<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->string('id',6)->primary();
            $table->string('nama_dokter',40);
            $table->string('jenis_kelamin', 1);
            $table->string('nik',16)->unique();
            $table->string('alamat',75);
            $table->string('telepon',12);
            $table->date('tanggal_lahir');
            $table->string('id_poli', 5)->foreign('id_poli')->references('id')->on('poli');
            $table->string('spesialisasi',30);
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();

        });

    }

    public function down()
    {
          Schema::dropIfExists('dokter');
    }
}
