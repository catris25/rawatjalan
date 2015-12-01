<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrgPasienInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::unprepared('
      CREATE TRIGGER trg_pasien_insert BEFORE INSERT ON `pasien` FOR EACH ROW
      BEGIN
      INSERT INTO pasien_seq VALUES (NULL);
      SET NEW.id = CONCAT("PSN", LPAD(LAST_INSERT_ID(), 4, "0"));
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
        DB::unprepared('DROP TRIGGER `trg_pasien_insert`');
    }
}
