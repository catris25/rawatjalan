<?php

use Illuminate\Database\Seeder;
use App\Dokter;
use App\User;
use App\Role;
use Bican\Roles\Models\Role;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Models\Permission;

class ADTableSeeder extends Seeder
{

    public function run()
    {
      //create dokter
      $dokter1 = Dokter::create([
          'nama_dokter' => 'John Dorian',
          'jenis_kelamin' => 'L',
          'nik' => '1234567891234567',
          'alamat' => 'Random Apartment near Sacred Heart Hospital',
          'tanggal_lahir' => date("Y-m-d", rand(100000, 10000000)),
          'id_poli' => 'POL01',
          'spesialisasi' => 'Internal medicine',
          'email' => 'john.dorian@scrubs.com'
      ]);
      $new_users = User::create([
          'email' => 'john.dorian@scrubs.com',
          'password' => bcrypt('qwerty'),
      ]);
      $new_users = User::where('email', 'john.dorian@scrubs.com');
      $dokterRole = Role::find('RL002');
      $new_users->attachRole($dokterRole);

      //create admin
      // $admin1 = Admin::create([
      //   'nama_admin' => 'Elliot Alderson',
      //   'jenis_kelamin' => 'L',
      //   'nik' => '8901234567456037',
      //   'alamat' =>
      // ]);
    }
}
