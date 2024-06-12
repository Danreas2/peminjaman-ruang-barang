<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tbl_gedung';
}
