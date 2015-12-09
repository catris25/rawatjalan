<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekamMedik extends Model
{
  protected $table = 'rekam_medik';
  protected $fillable = ['id', 'usia_berobat', 'tgl_visit', 'tinggi_badan', 'berat_badan', 'tekanan_darah', 'resep', 'anamnesis', 'diagnosis', 'tindakan'];

}
