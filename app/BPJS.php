<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BPJS extends Model
{
  protected $table = 'bpjs';
  protected $fillable = ['nama','nik', 'jenis_kelamin', 'tgl_lahir', 'kelas_rawat', 'status_premi'];
}

?>
