<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RMTemp extends Model
{
  protected $table = 'rm_temp';
  protected $fillable = ['id', 'id_dokter', 'usia_berobat', 'tgl_visit', 'tinggi_badan', 'berat_badan', 'tekanan_darah', 'resep', 'anamnesis', 'diagnosis', 'tindakan'];

}
