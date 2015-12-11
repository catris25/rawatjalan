<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->string('id',6)->primary();
            $table->string('nama_dokter',40);
            $table->string('jenis_kelamin', 1);
            $table->string('nik',16)->unique();
            $table->string('alamat',75);
            $table->string('telepon',12);
            $table->date('tanggal_lahir');
            $table->string('id_poli', 5)->references('id')->on('poli')->onDelete('cascade');
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
