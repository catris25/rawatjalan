<?php

use Illuminate\Database\Seeder;
use App\Poli;
use App\Pasien;

class SomeTableSeeder extends Seeder
{

    public function run()
    {

        Poli::create([
            'nama_poli' => 'Poli Umum',
            'deskripsi' => 'Poli ini menangani pasien dengan penyakit-penyakit umum oleh dokter non spesialis.'
        ]);

        Poli::create([
            'nama_poli' => 'Poli Gigi',
            'deskripsi' => 'Poli ini menerima pasien yang akan ditangani oleh spesialis gigi.'
        ]);

        Pasien::create([
          'nama_pasien' => 'Spongebob Squarepants',
          'nik' => '3456789012567890',
          'jenis_kelamin'=> 'L',
          'tgl_lahir' => date("Y-m-d", rand(100000, 10000000)),
          'alamat' => 'Nanas di Bikini Bottom',
          'telepon' => '7391092019',
          'gol_darah' => 'B',
          'alergi' => 'ubur-ubur',
          'riwayat_penyakit' => 'panu'
        ]);

        Pasien::create([
          'nama_pasien' => 'Shelock Holmes',
          'nik' => '7890123456127805',
          'jenis_kelamin'=> 'L',
          'tgl_lahir' => date("Y-m-d", rand(100000, 10000000)),
          'alamat' => '221B Baker Street, London',
          'telepon' => '6127162989',
          'gol_darah' => 'AB',
          'riwayat_penyakit' => 'flu'
        ]);

    }
}
