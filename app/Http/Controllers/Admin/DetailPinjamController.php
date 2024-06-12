<?php

namespace App\Http\Controllers\Admin;

use Crypt;

use App\Kendaraan;
use App\Ruangan;
use App\Peminjaman;
use App\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $data = Peminjaman::find(Crypt::decryptString($id));
        return view('admin.peminjaman.detail', ['data' => $data]);

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

    public function ajaxGetItem(Request $r)
    {
        if($r->mode == 'add'){
            if($r->tipe == 'kendaraan'){
                $tipe = 'kendaraan';
                $data = Peminjaman::whereBetween('rencana_pinjam', [$r->tgl_pinjam, $r->tgl_kembali])->where('tipe', 'kendaraan')->where('verifikasi', '1')->get();

                $dt = [];
                foreach ($data as $d) {
                    $dt[] = array('tipe' => 'kendaraan', 'id_reff' => $d->id_reff);
                }

                $kendaraan = Kendaraan::where('ada', 'ada')->get();
                return view('admin.peminjaman.ajaxGetAlat', ['tipe' => $tipe, 'mode' => $r->mode, 'kendaraan' => $kendaraan, 'dt' => $dt]);
            }else if($r->tipe == 'ruangan'){
                $tipe = 'ruangan';
                $data = Peminjaman::whereBetween('rencana_pinjam', [$r->tgl_pinjam, $r->tgl_kembali])->where('tipe', 'ruangan')->where('verifikasi', '1')->get();

                $dt = [];
                foreach ($data as $d) {
                    $dt = array('tipe' => 'ruangan', 'id_reff' => $d->id_reff);
                }

                $ruangan = Ruangan::all();
                return view('admin.peminjaman.ajaxGetAlat', ['tipe' => $tipe, 'ruangan' => $ruangan, 'mode' => $r->mode, 'data' => $data, 'dt' => $dt]);
            }else if($r->tipe == 'barang'){
                $tipe = 'barang';
                $data = Peminjaman::whereBetween('rencana_pinjam', [$r->tgl_pinjam, $r->tgl_kembali])->where('tipe', 'barang')->where('verifikasi', '1')->get();

                $dt = [];
                foreach ($data as $d) {
                    $dt = array('tipe' => 'barang', 'id_reff' => $d->id_reff);
                }

                $barang = Barang::where('status', 'ada')->get();
                return view('admin.peminjaman.ajaxGetAlat', ['tipe' => $tipe, 'barang' => $barang, 'mode' => $r->mode, 'data' => $data, 'dt' => $dt]);
            }else{
                $tipe = '';
                return view('admin.peminjaman.ajaxGetAlat', ['tipe' => $tipe, 'mode' => $r->mode]);
            }
        }
        
    }
}
