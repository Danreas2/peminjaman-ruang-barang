<?php

namespace App\Http\Controllers\Admin;

use Crypt;
use Session;

use App\Ruangan;
use App\Barang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::connection('mysql2')
            ->table('tbl_barang')
            ->select('tbl_ruang.*', 'tbl_barang.*', 'tbl_gedung.*', 'tbl_barang.status as stat')
            ->join('tbl_ruang', 'tbl_barang.id_ruang', '=', 'tbl_ruang.id_ruang')
            ->join('tbl_gedung', 'tbl_gedung.id_gedung', '=', 'tbl_ruang.id_gedung')
            ->get();

        return view('admin.barang.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruang = Ruangan::all();
        return view('admin.barang.create', ['ruang' => $ruang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'no_inventaris' => 'required|max:20|unique:barangs',
            'nama_barang' => 'required|max:100',
            'ruang' => 'required',
            'tanggal_pengadaan' => 'required',
            'kondisi' => 'required',
            'jumlah' => 'required',
            'ada' => 'required',
        ]);

        Barang::create([
            'no_inventaris' => $r->no_inventaris,
            'nama_barang' => $r->nama_barang,
            'id_ruang' => $r->ruang,
            'tanggal_pengadaan' => $r->tanggal_pengadaan,
            'kodisi' => $r->kondisi,
            'jumlah' => $r->jumlah,
            'status' => $r->ada,
        ]);

        Session::flash('sukses', 'Data Barang Berhasil Disimpan!');
        return redirect()->route('admin.barang');
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
        $ruang = Ruangan::all();
        $data = Barang::find(Crypt::decryptString($id));
        return view('admin.barang.edit', ['data' => $data, 'id' => $id, 'ruang' => $ruang]);
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
        $r->validate([
            'nama_barang' => 'required|max:100',
            'ruang' => 'required',
            'tanggal_pengadaan' => 'required',
            'kondisi' => 'required',
            'ada' => 'required',
            'jumlah' => 'required',
        ]);

        $data = Barang::find(Crypt::decryptString($id));
        $data->nama_barang = $r->nama_barang;
        $data->id_ruang = $r->ruang;
        $data->tanggal_pengadaan = $r->tanggal_pengadaan;
        $data->kondisi = $r->kondisi;
        $data->status = $r->ada;
        $data->jumlah = $r->jumlah;
        $data->save();

        Session::flash('sukses', 'Data Barang Berhasil Diubah!');
        return redirect()->route('admin.barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::find(Crypt::decryptString($id));
        $data->delete();
        Session::flash('sukses', 'Data Barang Berhasil Dihapus!');
        return redirect()->route('admin.barang');
    }
}
