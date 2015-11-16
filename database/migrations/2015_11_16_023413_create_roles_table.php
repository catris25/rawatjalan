<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('roles', function (Blueprint $table) {
          $table->string('id',5);
          $table->string('name');
          $table->string('slug')->unique();
          $table->string('description')->nullable();
          $table->integer('level')->default(1);
          $table->timestamps();
          $table->primary('id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
