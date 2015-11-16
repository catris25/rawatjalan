<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrgUserInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('
        CREATE TRIGGER trg_user_insert BEFORE INSERT ON `users` FOR EACH ROW
        BEGIN
        INSERT INTO user_seq VALUES (NULL);
        SET NEW.id = CONCAT("USR", LPAD(LAST_INSERT_ID(), 3, "0"));
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
        DB::unprepared('DROP TRIGGER `trg_user_insert`');
    }
}
