<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $fillable = ['nama_dokter','NIK', 'alamat','telepon','tanggal_lahir','spesialisasi','email'];


    public function user() {
    	return $this->hasOne('App\User','email','email');
    }
}