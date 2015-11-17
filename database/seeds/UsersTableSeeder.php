<?php

use App\User;
use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Models\Permission;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Puyeng',
            'email' => 'puyeng@sekali.com',
            'password' => bcrypt('qwerty'),
        ]);

        $new_users = User::find('USR002');
        $superUserRole = Role::find('RL003');
        $new_users->attachRole($superUserRole);


    }
}
