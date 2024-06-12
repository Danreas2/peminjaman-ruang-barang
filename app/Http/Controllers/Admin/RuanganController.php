<?php

namespace App\Http\Controllers\Admin;

use Crypt;
use Session;

use App\RuangMaster;
use App\Ruangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RuangMaster::all();
        return view('admin.ruangan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $param = [];
        $dataRuang = RuangMaster::all();
        foreach($dataRuang as $r){
            $param[] = $r->id_ref;
        }

        $ruangImp = implode(", ", $param);

        $ruangan = Ruangan::orderBy('id_ruang', 'desc')->whereNotIn('id_ruang', [$ruangImp])->get();
       
        return view('admin.ruangan.add', ['ruang' => $ruangan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $ruang = Ruangan::where('id_ruang', $r->id_ruang)->first();

        RuangMaster::create([
            'id_ref' => $ruang->id_ruang,
            'id_gedung' => $ruang->id_gedung,
            'kode_ruang' => $ruang->kode_ruang,
            'nama_ruang' => $ruang->nama_ruang,
            'lantai' => $ruang->lantai,
            'luas_ruang' => $ruang->luas_ruang,
            'pengelola' => $ruang->pengelola,
            'foto' => $ruang->foto
        ]);

        Session::flash('sukses', 'Data Ruangan Berhasil Disimpan!');

        return redirect()->route('admin.ruangan');
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
        // $data = Ruangan::find(Crypt::decryptString($id));
        // return view('admin.ruangan.edit', ['data' => $data, 'id' => $id]);
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
            'nama_ruang' => 'required|max:255',
            'kapasitas' => 'required|max:50',
            'fasilitas' => 'required|max:50',
            'lokasi' => 'required|max:50',
        ]);

        $data = Ruangan::find(Crypt::decryptString($id));
        $data->nama_ruang = $r->nama_ruang;
        $data->kapasitas = $r->kapasitas;
        $data->fasilitas = $r->fasilitas;
        $data->lokasi = $r->lokasi;
        $data->save();

        Session::flash('sukses', 'Data Ruangan Berhasil Diubah!');

        return redirect()->route('admin.ruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RuangMaster::find(Crypt::decryptString($id));
        $data->delete();

        Session::flash('sukses', 'Data Ruangan Berhasil Dihapus!');

        return redirect()->route('admin.ruangan');
    }
}
