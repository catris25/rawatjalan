<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $fillable = ['nama_admin','jenis_kelamin','nik','alamat','telepon','tanggal_lahir','email'];

    public function user() {
    	return $this->hasOne('App\User','email','email');
    }
}
