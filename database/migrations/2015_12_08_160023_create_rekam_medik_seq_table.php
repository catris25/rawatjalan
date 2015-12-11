<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekamMedikSeqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('rekam_medik_seq', function (Blueprint $table) {
          $table->string('id',9);
          $table->string('id_dokter',6);
          $table->string('kode_visit',4);

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rekam_medik_seq');
    }
}
