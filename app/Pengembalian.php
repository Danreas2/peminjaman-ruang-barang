<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $connection = 'mysql';
    
    protected $fillable = [
    	'id_peminjaman', 'tanggal_pengembalian', 'jam_pengembalian', 'kondisi_koleksi', 'keterangan',
    ];
}
