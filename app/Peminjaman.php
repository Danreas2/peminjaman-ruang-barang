<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use Notifiable;
    protected $connection = 'mysql';   
    protected $fillable = [
    	'level', 'nip', 'nama_organisasi', 'email', 'rencana_pinjam', 'rencana_kembali', 'verifikasi', 'tipe', 'id_reff', 'jam_pinjam', 'jam_selesai', 'jumlah',
    ];

    public function getKaryawan()
    {
    	return $this->belongsTo('App\Karyawan', 'nip', 'nip');
    }

    public function getKendaraan()
    {
    	return $this->belongsTo('App\Kendaraan', 'id_reff', 'id');
    }

    public function getRuangan()
    {
    	return $this->belongsTo('App\RuangMaster', 'id_reff', 'id');	
    }

    public function getBarang()
    {
        return $this->belongsTo('App\Barang', 'id_reff', 'id_barang');    
    }

    public function getPengembalian()
    {
        return $this->hasMany('App\Pengembalian', 'id_peminjaman', 'id');
    }
}