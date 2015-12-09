<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrgRekamMedikInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::unprepared('
      CREATE TRIGGER trg_rekam_medik_insert BEFORE INSERT ON `rekam_medik` FOR EACH ROW
      BEGIN
      INSERT INTO rekam_medik_seq VALUES (NULL);
      SET NEW.id = LPAD(LAST_INSERT_ID(), 4, "0");
      END
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          DB::unprepared('DROP TRIGGER `trg_rekam_medik_insert`');

    }
}
