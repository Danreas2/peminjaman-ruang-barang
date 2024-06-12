<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuangMaster extends Model
{
    protected $connection = 'mysql';
    protected $table = 'ruangans';
    protected $fillable = [
        'id_ref',
        'id_gedung',
        'kode_ruang',
        'nama_ruang',
        'lantai',
        'luas_ruang',
        'pengelola',
        'foto'
    ];

    public function getGedung(){
        return $this->belongsTo('App\Gedung', 'id_gedung', 'id_gedung');
    }
}
