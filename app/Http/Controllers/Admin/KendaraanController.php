<?php

namespace App\Http\Controllers\Admin;

use Crypt;
use Session;

use App\Kendaraan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kendaraan::all();
        return view('admin.kendaraan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kendaraan.add');
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
            'nama_kendaraan' => 'required|max:20',
            'jenis' => 'required',
            'kondisi' => 'required',
            'ada' => 'required',
        ]);

        Kendaraan::create([
            'kode_kendaraan' => $r->nama_kendaraan,
            'jenis' => $r->jenis,
            'kondisi' => $r->kondisi,
            'ada' => $r->ada,
        ]);

        Session::flash('sukses','Data Kendaraan Berhasil Disimpan!');

        return redirect()->route('admin.kendaraan');
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
        $data = Kendaraan::find(Crypt::decryptString($id));
        return view('admin.kendaraan.edit', ['data' => $data, 'id' => $id]);
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
            'nama_kendaraan' => 'required|max:20',
            'jenis' => 'required',
            'kondisi' => 'required',
            'ada' => 'required',
        ]);

        $data = Kendaraan::find(Crypt::decryptString($id));
        $data->kode_kendaraan = $r->nama_kendaraan;
        $data->jenis = $r->jenis;
        $data->kondisi = $r->kondisi;
        $data->ada = $r->ada;
        $data->save();

        Session::flash('sukses','Data Kendaraan Berhasil Diubah!');

        return redirect()->route('admin.kendaraan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kendaraan::find(Crypt::decryptString($id));
        $data->delete();
        
        Session::flash('sukses','Data Kendaraan Berhasil Dihapus!');

        return redirect()->route('admin.kendaraan');   
    }
}
