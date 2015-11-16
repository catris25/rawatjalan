<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrgRoleuserInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER trg_roleuser_insert BEFORE INSERT ON `role_user` FOR EACH ROW
        BEGIN
        INSERT INTO role_user_seq VALUES (NULL);
        SET NEW.id = CONCAT("RLUS", LPAD(LAST_INSERT_ID(), 3, "0"));
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
        DB::unprepared('DROP TRIGGER `trg_roleuser_insert`');
    }
}
