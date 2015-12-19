<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrgPoliInsert extends Migration
{
    public function up()
    {
      DB::unprepared('
      CREATE TRIGGER trg_poli_insert BEFORE INSERT ON `poli` FOR EACH ROW
      BEGIN
      INSERT INTO poli_seq VALUES (NULL);
      SET NEW.id = CONCAT("POL", LPAD(LAST_INSERT_ID(), 2, "0"));
      END
      ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER `trg_poli_insert`');
    }
}
