<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrgDokterInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trg_dokter_insert BEFORE INSERT ON `dokter` FOR EACH ROW
        BEGIN
        INSERT INTO dokter_seq VALUES (NULL);
        SET NEW.id = CONCAT("DKT", LPAD(LAST_INSERT_ID(), 3, "0"));
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
        //
        DB::unprepared('DROP TRIGGER IF EXISTS `trg_dokter_insert`');
    }
}
