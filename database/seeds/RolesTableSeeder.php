<?php

use Bican\Roles\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Admin Levelled User', // optional
            'level' => 1, // optional, set to 1 by default
        ]);
        Role::create([
            'name' => 'Dokter',
            'slug' => 'dokter',
            'description' => 'Dokter Levelled User', // optional
            'level' => 1, // optional, set to 1 by default
        ]);
        Role::create([
            'name' => 'Super User',
            'slug' => 'super.user',
            'description' => 'Super User Levelled User', // optional
            'level' => 2, // optional, set to 1 by default
        ]);
    }
}
