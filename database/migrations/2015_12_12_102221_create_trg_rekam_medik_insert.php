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
      SET @temp = coalesce((select max(kode_visit) from rekam_medik_seq WHERE id = NEW.id AND id_dokter = NEW.id_dokter), 0);
      SET @temps = @temp + 1;
      INSERT INTO rekam_medik_seq VALUES (NEW.id,NEW.id_dokter,@temps);
      SET NEW.kode_visit = LPAD(@temps, 4, "0");
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
