<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->string('id_pasien', 9);
            $table->string('nama_pasien', 50);
            $table->string('NIK',16)->unique;
            $table->string('alamat', 100);
            $table->string('telepon', 12);
            $table->string('gol_darah', 2);
            $table->text('alergi');
            $table->text('riwayat_penyakit');
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
        Schema::drop('pasien');
    }
}
