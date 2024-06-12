<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tbl_ruang';

    public function getGedung(){
        return $this->belongsTo('App\Gedung', 'id_gedung', 'id_gedung');
    }
}
