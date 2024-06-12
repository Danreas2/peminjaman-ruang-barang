<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Crypt;
use Session;

use App\Peminjaman;
use App\Karyawan;
use App\Barang;
use App\Kendaraan;

use App\Notifications\StatusPeminjaman;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Peminjaman::all();
        return view('admin.peminjaman.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.peminjaman.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        if ($r->pinjam == 'barang') {
            
            $r->validate([
                'tipe' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required',
                'jam_pinjam' => 'required',
                'jam_kembali' => 'required',
                'pinjam' => 'required',
                'jumlah' => 'required',
            ]);

            if ($r->tipe == 'umum') {
                $r->validate([
                    'nama_organisasi' => 'required|max:150',
                    'email' => 'required|email|max:200',
                ]);

                Peminjaman::create([
                    'level' => $r->tipe,
                    'email' => $r->email,
                    'nama_organisasi' => $r->nama_organisasi,
                    'rencana_pinjam' => $r->tanggal_pinjam,
                    'jam_pinjam' => $r->jam_pinjam,
                    'jam_selesai' => $r->jam_kembali,
                    'rencana_kembali' => $r->tanggal_kembali,
                    'verifikasi' => '0',
                    'tipe' => $r->pinjam,
                    'id_reff' => Crypt::decryptString($r->alat),
                    'jumlah' => $r->jumlah,
                ]);

                Session::flash('sukses','Data Peminjaman Berhasil Disimpan!');

                $peminjaman = Peminjaman::where('email', $r->email)->where('nama_organisasi', $r->nama_organisasi)->where('rencana_pinjam', $r->rencana_pinjam)->where('rencana_kembali', $r->rencana_kembali)->where('tipe', $r->pinjam)->where('id_reff', Crypt::decryptString($r->alat))->firstOrFail();

                $peminjaman->notify(new StatusPeminjaman($peminjaman));

                return redirect()->route('admin.peminjaman');
            }else{
                $r->validate([
                    'karyawan' => 'required',
                ]);

                $karyawan = Karyawan::find(Crypt::decryptString($r->karyawan));

                Peminjaman::create([
                    'level' => $r->tipe,
                    'email' => $karyawan->email,
                    'nip' => $karyawan->nip,
                    'rencana_pinjam' => $r->tanggal_pinjam,
                    'rencana_kembali' => $r->tanggal_kembali,
                    'jam_pinjam' => $r->jam_pinjam,
                    'jam_selesai' => $r->jam_kembali,
                    'verifikasi' => '0',
                    'tipe' => $r->pinjam,
                    'id_reff' => Crypt::decryptString($r->alat),
                    'jumlah' => $r->jumlah,
                ]);

                Session::flash('sukses','Data Peminjaman Berhasil Disimpan!');

                 $peminjaman = Peminjaman::where('email', $karyawan->email)->where('nip', $karyawan->nip)->where('rencana_pinjam', $r->rencana_pinjam)->where('rencana_kembali', $r->rencana_kembali)->where('tipe', $r->pinjam)->where('id_reff', Crypt::decryptString($r->alat))->firstOrFail();

                $peminjaman->notify(new StatusPeminjaman($peminjaman));

                return redirect()->route('admin.peminjaman');
            }

        }else{

            $r->validate([
                'tipe' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required',
                'jam_pinjam' => 'required',
                'jam_kembali' => 'required',
                'pinjam' => 'required',
            ]);

            if ($r->tipe == 'umum') {
                $r->validate([
                    'nama_organisasi' => 'required|max:150',
                    'email' => 'required|email|max:200',
                ]);

                Peminjaman::create([
                    'level' => $r->tipe,
                    'email' => $r->email,
                    'nama_organisasi' => $r->nama_organisasi,
                    'rencana_pinjam' => $r->tanggal_pinjam,
                    'jam_pinjam' => $r->jam_pinjam,
                    'jam_selesai' => $r->jam_kembali,
                    'rencana_kembali' => $r->tanggal_kembali,
                    'verifikasi' => '0',
                    'tipe' => $r->pinjam,
                    'id_reff' => Crypt::decryptString($r->alat),
                ]);

                Session::flash('sukses','Data Peminjaman Berhasil Disimpan!');

                $peminjaman = Peminjaman::where('email', $r->email)->where('nama_organisasi', $r->nama_organisasi)->where('rencana_pinjam', $r->rencana_pinjam)->where('rencana_kembali', $r->rencana_kembali)->where('tipe', $r->pinjam)->where('id_reff', Crypt::decryptString($r->alat))->firstOrFail();

                $peminjaman->notify(new StatusPeminjaman($peminjaman));

                return redirect()->route('admin.peminjaman');
            }else{
                $r->validate([
                    'karyawan' => 'required',
                ]);

                $karyawan = Karyawan::find(Crypt::decryptString($r->karyawan));

                Peminjaman::create([
                    'level' => $r->tipe,
                    'email' => $karyawan->email,
                    'nip' => $karyawan->nip,
                    'rencana_pinjam' => $r->tanggal_pinjam,
                    'rencana_kembali' => $r->tanggal_kembali,
                    'jam_pinjam' => $r->jam_pinjam,
                    'jam_selesai' => $r->jam_kembali,
                    'verifikasi' => '0',
                    'tipe' => $r->pinjam,
                    'id_reff' => Crypt::decryptString($r->alat),
                ]);

                Session::flash('sukses','Data Peminjaman Berhasil Disimpan!');

                $peminjaman = Peminjaman::where('email', $karyawan->email)->where('nip', $karyawan->nip)->where('rencana_pinjam', $r->rencana_pinjam)->where('rencana_kembali', $r->rencana_kembali)->where('tipe', $r->pinjam)->where('id_reff', Crypt::decryptString($r->alat))->firstOrFail();

                $peminjaman->notify(new StatusPeminjaman($peminjaman));

                return redirect()->route('admin.peminjaman');
            }
        }
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
        $data = Peminjaman::find(Crypt::decryptString($id));
        return view('admin.peminjaman.edit', ['data' => $data, 'id' => $id]);
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
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        if ($r->tipe == 'umum') {
            $r->validate([
                'nama_organisasi' => 'required|max:150',
                'email' => 'required|email|max:200',
            ]);

            $data = Peminjaman::find(Crypt::decryptString($id));
            $data->email = $r->email;
            $data->nama_organisasi = $r->nama_organisasi;
            $data->rencana_pinjam = $r->tanggal_pinjam;
            $data->rencana_kembali = $r->tanggal_kembali;
            $data->jam_pinjam = $r->jam_pinjam;
            $data->jam_selesai = $r->jam_kembali;
            $data->save();

            Session::flash('sukses','Data Peminjaman Berhasil Diubah!');

            return redirect()->route('admin.peminjaman');
        }else{
            $r->validate([
                'karyawan' => 'required',
            ]);

            $karyawan = Karyawan::find(Crypt::decryptString($id));

            $data = Peminjaman::find(Crypt::decryptString($id));
            $data->email = $karyawan->email;
            $data->nip = $karyawan->nip;
            $data->rencana_pinjam = $r->tanggal_pinjam;
            $data->rencana_kembali = $r->tanggal_kembali;
            $data->jam_pinjam = $r->jam_pinjam;
            $data->jam_kembali = $r->jam_kembali;
            $data->save();

            Session::flash('sukses','Data Peminjaman Berhasil Diubah!');

            return redirect()->route('admin.peminjaman');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Peminjaman::find(Crypt::decryptString($id));
        $data->delete();

        Session::flash('sukses','Data Peminjaman Berhasil Dihapus!');

        return redirect()->route('admin.peminjaman');
    }

    public function ajaxGetPeminjam(Request $r)
    {
        if($r->mode == 'add'){
            if($r->tipe == 'umum'){
                $tipe = 'umum';
                return view('admin.peminjaman.ajaxGetPeminjam', ['tipe' => $tipe, 'mode' => $r->mode]);
            }else if($r->tipe == 'karyawan'){
                $karyawan = Karyawan::all();
                $tipe = 'pegawai';
                return view('admin.peminjaman.ajaxGetPeminjam', ['tipe' => $tipe, 'karyawan' => $karyawan, 'mode' => $r->mode]);
            }else{
                $tipe = '';
                return view('admin.peminjaman.ajaxGetPeminjam', ['tipe' => $tipe, 'mode' => $r->mode]);
            }
        }else{
            $data = Peminjaman::find(Crypt::decryptString($r->id));
            if($r->tipe == 'umum'){
                $tipe = 'umum';
                return view('admin.peminjaman.ajaxGetPeminjam', ['tipe' => $tipe, 'mode' => $r->mode, 'data' => $data]);
            }else if($r->tipe == 'karyawan'){
                $karyawan = Karyawan::all();
                $tipe = 'pegawai';
                return view('admin.peminjaman.ajaxGetPeminjam', ['tipe' => $tipe, 'karyawan' => $karyawan, 'mode' => $r->mode, 'data' => $data]);
            }else{
                $tipe = '';
                return view('admin.peminjaman.ajaxGetPeminjam', ['tipe' => $tipe, 'mode' => $r->mode, 'data' => $data]);
            }
        }
    }

    public function cekBrg(Request $r)
    {
        $cek = Barang::find(Crypt::decryptString($r->id));
        $max = $cek->jumlah;
        $hitung = Peminjaman::whereBetween('rencana_pinjam', [$r->tanggal_pinjam, $r->tanggal_kembali])->whereBetween('rencana_kembali', [$r->tanggal_pinjam, $r->tanggal_kembali])->where('tipe', 'barang')->where('id_reff', $r->id)->sum("jumlah");
    
        return view('admin.peminjaman.ajaxJumlahBarang', ['max' => $max, 'jumlah_dipinjam' => $hitung]);
    }

    public function cetakTgl(Request $r)
    {
        $data = Peminjaman::whereBetween('rencana_pinjam', [$r->tanggal_awal, $r->tanggal_akhir])->where('verifikasi', '1')->get();
        $awal = $r->tanggal_awal;
        $akhir = $r->tanggal_akhir;
        $pdf = PDF::loadview('admin.peminjaman.laporan_peminjaman',['data' => $data, 'awal' => $awal, 'akhir' => $akhir]);
        return $pdf->stream();
    }
}
