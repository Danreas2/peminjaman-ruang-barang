<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
    	'kode_kendaraan', 'jenis', 'kondisi', 'ada',
    ];
}
