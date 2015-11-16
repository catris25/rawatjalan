<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrgAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trg_admin_insert BEFORE INSERT ON `admin` FOR EACH ROW
        BEGIN
        INSERT INTO admin_seq VALUES (NULL);
        SET NEW.id = CONCAT("ADM", LPAD(LAST_INSERT_ID(), 3, "0"));
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
        DB::unprepared('DROP TRIGGER `trg_admin_insert`');
    }
}
