<?php

namespace App\Http\Controllers\Admin;

use Crypt;
use Session;

use App\Karyawan;
use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Karyawan::all();
        return view('admin.karyawan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.karyawan.add');
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
            'nama_karyawan' => 'required|max:20',
            'nip' => 'required|min:5|max:30',
            'email' => 'required|max:100',
            'contact_person' => 'required|max:20',
            'password' => 'required|min:8|max:100'
        ]);

        Karyawan::create([
            'nama_karyawan' => $r->nama_karyawan,
            'email' => $r->email,
            'contact_person' => $r->contact_person,
            'nip' => $r->nip,
        ]);

        User::create([
            'name' => $r->nama_karyawan,
            'username' => $r->nip,
            'password' => Hash::make($r->password),
            'role' => '2',
        ]);

        Session::flash('sukses','Data Karyawan Berhasil Disimpan!');

        return redirect()->route('admin.karyawan');
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
        $data = Karyawan::find(Crypt::decryptString($id));
        return view('admin.karyawan.edit', ['data' => $data, 'id' => $id]);
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
            'nama_karyawan' => 'required|max:20',
            'email' => 'required|max:100',
            'contact_person' => 'required|max:20',
        ]);

        $data = Karyawan::find(Crypt::decryptString($id));
        $data->nama_karyawan = $r->nama_karyawan;
        $data->contact_person = $r->contact_person;
        $data->email = $r->email;
        $data->save();

        Session::flash('sukses','Data Karyawan Berhasil Diubah!');

        return redirect()->route('admin.karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Karyawan::find(Crypt::decryptString($id));
        $user = User::find($data->getUser->id);
        $user->delete();
        $data->delete();

        Session::flash('sukses','Data Karyawan Berhasil Dihapus!');

        return redirect()->route('admin.karyawan');
    }
}
