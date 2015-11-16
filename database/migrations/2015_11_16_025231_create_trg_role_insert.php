<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrgRoleInsert extends Migration
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
        CREATE TRIGGER trg_role_insert BEFORE INSERT ON `roles` FOR EACH ROW
        BEGIN
        INSERT INTO role_seq VALUES (NULL);
        SET NEW.id = CONCAT("RL", LPAD(LAST_INSERT_ID(), 3, "0"));
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
        DB::unprepared('DROP TRIGGER `trg_role_insert`');
    }
}
