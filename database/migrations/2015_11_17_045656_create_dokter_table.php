<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {

            $table->string('id',6);
            $table->string('nama_dokter',40);
            $table->string('NIK',16);
            $table->string('alamat',75);
            $table->string('telepon',12);
            $table->date('tanggal_lahir');
            $table->string('spesialisasi',30);
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
