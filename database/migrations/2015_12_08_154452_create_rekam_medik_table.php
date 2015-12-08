<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekamMedikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medik', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->string('kode_visit', 4);
            $table->string('id_pasien', 7);
            $table->integer('usia_berobat');
            $table->date('tgl_visit');
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('tekanan_darah', 25)->nullable();
            $table->text('resep')->nullable();
            $table->text('anamnesis')->nullable();
            $table->text('diagnosis');
            $table->text('tindakan')->nullable();
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
        Schema::drop('rekam_medik');
    }
}
