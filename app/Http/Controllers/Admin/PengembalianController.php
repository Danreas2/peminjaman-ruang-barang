<?php

namespace App\Http\Controllers\Admin;

use Crypt;
use Session;

use App\Peminjaman;
use App\Pengembalian;
use App\Kendaraan;
use App\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Peminjaman::where('verifikasi', '1')->get();
        return view('admin.pengembalian.index', ['data'=>$data]);
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
    public function store(Request $r)
    {
        Pengembalian::create([
            'id_peminjaman' => $r->id,
            'tanggal_pengembalian' => $r->tanggal_kembali,
            'jam_pengembalian' => $r->jam_kembali,
            'kondisi_koleksi' => $r->kondisi,
            'keterangan' => $r->keterangan,
        ]);

        $peminjaman = Peminjaman::find($r->id);
        
        if($peminjaman->tipe == 'kendaraan'){
            $ken = Kendaraan::find($peminjaman->id_reff);
            $ken->ada = 'ada';
            $ken->kondisi = $r->kondisi;
            $ken->save();
        }else if($peminjaman->tipe == 'barang'){
            $bar = Barang::find($peminjaman->id_reff);
            $bar->status = 'ada';
            $bar->kondisi = $r->kondisi;
            $bar->save();
        }

        Session::flash('sukses','Data Pengembalian Berhasil Diproses!');

        return redirect()->route('admin.pengembalian');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Peminjaman::find(Crypt::decryptString($id));
        return view('admin.pengembalian.view', ['data' => $data]);
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
    public function update(Request $request, $id)
    {
        //
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
