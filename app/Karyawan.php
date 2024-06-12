<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
    	'nip', 'nama_karyawan', 'email', 'contact_person',
    ];

    public function getUser()
    {
    	return $this->hasOne('App\User', 'username', 'nip');
    }
}
