<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connections = 'mysql';
    
    protected $fillable = [
        'name', 'username', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getKaryawan()
    {
        return $this->hasOne('App\Karyawan', 'nip', 'username');
    }

    public function isAdmin()
    {
        if ($this->role == 1) {
            return true;
        }else{
            return false;
        }
    }

    public function isKaryawan()
    {
        if ($this->role == 2) {
            return true;
        }else{
            return false;
        }
    }
}
