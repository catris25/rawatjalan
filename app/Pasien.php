<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
  protected $table = 'pasien';
  protected $fillable = ['nama_pasien', 'nik', 'jenis_kelamin', 'tgl_lahir', 'alamat','telepon','gol_darah','alergi', 'riwayat_penyakit'];
}
