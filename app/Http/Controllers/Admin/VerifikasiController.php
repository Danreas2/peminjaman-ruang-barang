<?php

namespace App\Http\Controllers\Admin;

use Crypt;
use Session;

use App\Peminjaman;
use App\Barang;
use App\Kendaraan;

use App\Notifications\StatusPeminjaman;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Peminjaman::where('verifikasi', '0')->get();
        return view('admin.verifikasi.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        if($r->aksi == 'verif'){
            $data = Peminjaman::find(Crypt::decryptString($id));
            $data->verifikasi = '1';
            
            if($data->tipe == 'kendaraan'){
                $ken = Kendaraan::find($data->id_reff);
                $ken->ada = 'dipinjam';
                $ken->save();
            }

            $data->save();

            Session::flash('sukses','Data Peminjaman Berhasil Diverifikasi!');
        }else{
            $data = Peminjaman::find(Crypt::decryptString($id));
            $data->verifikasi = '2';
            $data->save();
            Session::flash('sukses','Data Peminjaman Berhasil Ditolak!');
        }

        $peminjaman = Peminjaman::find(Crypt::decryptString($id));

        $peminjaman->notify(new StatusPeminjaman($peminjaman));

        return redirect()->route('admin.verifikasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
