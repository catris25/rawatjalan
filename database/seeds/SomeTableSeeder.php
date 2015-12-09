<?php

use Illuminate\Database\Seeder;

class SomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasien')->insert([
          'nama_pasien' => str_random(8),
          'nik' => rand(100000,400000),
          'jenis_kelamin'=> 'P',
          'tgl_lahir' => date("Y-m-d", rand(100000, 10000000)),
          'alamat' => str_random(15),
          'telepon' => rand(1000000, 500000),
          'gol_darah' => 'B',
          'alergi' => str_random(10),
          'riwayat_penyakit' => str_random(10)
        ]);

        DB::table('pasien')->insert([
          'nama_pasien' => str_random(8),
          'nik' => rand(100000,400000),
          'jenis_kelamin'=> 'L',
          'tgl_lahir' => date("Y-m-d", rand(100000, 10000000)),
          'alamat' => str_random(15),
          'telepon' => rand(100000, 500000),
          'gol_darah' => 'O',
          'alergi' => str_random(10),
          'riwayat_penyakit' => str_random(10)
        ]);

        DB::table('rekam_medik')->insert([
          'id' => 'PSN0001',
          'usia_berobat' => rand(3, 40),
          'tgl_visit' => date("Y-m-d", rand(200000, 10000000)),
          'tinggi_badan' => rand(100, 200),
          'berat_badan' => rand(40, 120),
          'tekanan_darah' => '140/100',
          'resep' => str_random(12),
          'anamnesis' =>str_random(12),
          'diagnosis' => str_random(10),
          'tindakan' =>str_random(10)
        ]);

        DB::table('rekam_medik')->insert([
          'id' => 'PSN0001',
          'usia_berobat' => rand(3, 40),
          'tgl_visit' => date("Y-m-d", rand(200000, 10000000)),
          'tinggi_badan' => rand(100, 200),
          'berat_badan' => rand(40, 120),
          'tekanan_darah' => '125/100',
          'resep' => str_random(12),
          'anamnesis' =>str_random(12),
          'diagnosis' => str_random(10),
          'tindakan' =>str_random(10)
        ]);

        DB::table('rekam_medik')->insert([
          'id' => 'PSN0002',
          'usia_berobat' => rand(3, 40),
          'tgl_visit' => date("Y-m-d", rand(200000, 10000000)),
          'tinggi_badan' => rand(100, 200),
          'berat_badan' => rand(40, 120),
          'tekanan_darah' => '100/60',
          'resep' => str_random(12),
          'anamnesis' =>str_random(12),
          'diagnosis' => str_random(10),
          'tindakan' =>str_random(10)
        ]);
    }
}
