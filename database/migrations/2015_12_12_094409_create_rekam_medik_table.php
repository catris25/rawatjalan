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
            $table->string('id', 9);
            $table->string('id_dokter', 6);
            $table->string('kode_visit', 4);
            $table->integer('usia_berobat');
            $table->date('tgl_visit');
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('tekanan_darah', 25)->nullable();
            $table->text('resep')->nullable();
            $table->text('anamnesis')->nullable();
            $table->text('diagnosis');
            $table->text('tindakan')->nullable();
            $table->primary(['id', 'kode_visit', 'id_dokter']);
            $table->timestamps();
        });

        Schema::table('rekam_medik', function(Blueprint $table) {
            $table->foreign('id')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id')->on('dokter')->onDelete('cascade');
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
