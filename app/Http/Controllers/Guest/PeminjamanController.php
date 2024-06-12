<?php

namespace App\Http\Controllers\Guest;

use Crypt;
use Session;

use App\Peminjaman;
use App\Karyawan;
use App\Barang;
use App\Kendaraan;
use App\RuangMaster;

use App\Notifications\StatusPeminjaman;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function store(Request $r)
    {
        $r->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'jam_pinjam' => 'required',
            'jam_kembali' => 'required',
            'pinjam' => 'required',
            'nama' => 'required|max:250',
            'email' => 'required|email|max:200',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $pinjam =Peminjaman::create([
            'level' => 'umum',
            'email' => $r->email,
            'nama_organisasi' => $r->nama,
            'rencana_pinjam' => $r->tanggal_pinjam,
            'jam_pinjam' => $r->jam_pinjam,
            'jam_selesai' => $r->jam_kembali,
            'rencana_kembali' => $r->tanggal_kembali,
            'verifikasi' => '0',
            'tipe' => $r->pinjam,
            'id_reff' => $r->alat,
        ]);

        Session::flash('sukses', 'Data Peminjaman Berhasil Disimpan! Silahkan Tunggu Konfirmasi Dari Admin');

        $peminjaman = Peminjaman::find($pinjam->id);

        $peminjaman->notify(new StatusPeminjaman($peminjaman));

        return redirect()->route('home');
    }

    public function ajaxGetItem(Request $r)
    {
        if ($r->mode == 'add') {
            if ($r->tipe == 'kendaraan') {
                $tipe = 'kendaraan';
                $data = Peminjaman::whereBetween('rencana_pinjam', [$r->tgl_pinjam, $r->tgl_kembali])->where('tipe', 'kendaraan')->where('verifikasi', '1')->get();

                $dt = [];
                foreach ($data as $d) {
                    $dt[] = array('tipe' => 'kendaraan', 'id_reff' => $d->id_reff);
                }

                $kendaraan = Kendaraan::where('ada', 'ada')->get();
                return view('guest.peminjaman.ajaxGetAlat', ['tipe' => $tipe, 'mode' => $r->mode, 'kendaraan' => $kendaraan, 'dt' => $dt]);
            } else if ($r->tipe == 'ruangan') {
                $tipe = 'ruangan';
                $data = Peminjaman::whereBetween('rencana_pinjam', [$r->tgl_pinjam, $r->tgl_kembali])->where('tipe', 'ruangan')->where('verifikasi', '1')->get();

                $dt = [];
                foreach ($data as $d) {
                    $dt = array('tipe' => 'ruangan', 'id_reff' => $d->id_reff);
                }

                $ruangan = RuangMaster::orderBy('id', 'desc')->get();

                return view('guest.peminjaman.ajaxGetAlat', ['tipe' => $tipe, 'ruangan' => $ruangan, 'mode' => $r->mode, 'data' => $data, 'dt' => $dt]);
            } else if ($r->tipe == 'barang') {
                $tipe = 'barang';
                $data = Peminjaman::whereBetween('rencana_pinjam', [$r->tgl_pinjam, $r->tgl_kembali])->where('tipe', 'barang')->where('verifikasi', '1')->get();

                $filePath = public_path('json/barang.json');
                $jsonR = file_get_contents($filePath);
                $jsonR_data = json_decode($jsonR, false);

                $dt = [];
                foreach ($data as $d) {
                    $dt = array('tipe' => 'barang', 'id_reff' => $d->id_reff);
                }

                $barang = Barang::where('status', 'ada')->get();

                if (empty($jsonR_data) || $barang->count() != count($jsonR_data)) {
                    $id = [];
                    foreach ($barang as $idR) {
                        $id[] = array('tipe' => 'barang', 'no_inventaris' => $idR['no_inventaris'], 'id_barang' => $idR['id_barang'], 'nama_barang' => $idR['nama_barang']);
                    }

                    $jsonData = json_encode($id);

                    file_put_contents($filePath, $jsonData);
                    $barangs = $barang;
                    $cache = 0;
                } else {
                    $barangs = $jsonR_data;
                    $cache = 1;
                }

                return view('guest.peminjaman.ajaxGetAlat', ['tipe' => $tipe, 'cache' => $cache, 'barang' => $barangs, 'mode' => $r->mode, 'data' => $data, 'dt' => $dt]);
            } else {
                $tipe = '';
                return view('guest.peminjaman.ajaxGetAlat', ['tipe' => $tipe, 'mode' => $r->mode]);
            }
        }
    }

    public function ajaxUser(Request $r)
    {
        $tipe = $r->tipe;
        if ($r->tipe == 'pegawai') {
            $client = new Client();
            $key = "";
            $guzzleResponse = $client->get(
                '' . $key
            );
            if ($guzzleResponse->getStatusCode() == 200) {
                $response = json_decode($guzzleResponse->getBody());
                $data = $response->data;
            }
        } else if ($r->tipe == 'mahasiswa') {
            $client = new Client();
            $key = "";
            $guzzleResponse = $client->get(
                '' . $key
            );
            if ($guzzleResponse->getStatusCode() == 200) {
                $response = json_decode($guzzleResponse->getBody());
                $data = $response->data;
            }
        } else {
            $data = [];

        }

        return view('guest.peminjaman.ajaxGetNama', ['tipe' => $tipe, 'data' => $data]);
    }

    public function show($id)
    {
        $data = Peminjaman::find(Crypt::decryptString($id));
        return view('guest.peminjaman.detail', ['data' => $data]);
    }
}