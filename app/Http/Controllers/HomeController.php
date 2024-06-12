<?php

namespace App\Http\Controllers;

use Crypt;
use Calendar;

use App\RuangMaster;
use App\Peminjaman;
use App\Barang;
use App\Ruangan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pinjam = Peminjaman::where('rencana_pinjam', date('Y-m-d'))->where('verifikasi', '1')->where('tipe', 'barang')->whereNull('stok_berkurang')->get();
        foreach ($pinjam as $p) {
            $pnjm = Peminjaman::find($p->id);
            $pnjm->stok_berkurang = '1';

            $brg = Barang::find($p->id_reff);
            $brg->jumlah = $brg->jumlah - $p->jumlah;
            if ($brg->jumlah - $p->jumlah < "0") {
                $brg->status = 'dipinjam';
            }
            $brg->save();

            $pnjm->save();
        }

        $dataCount = Peminjaman::count();
        $data = Peminjaman::where('verifikasi', '0')->get();
        $data2 = Peminjaman::where('verifikasi', '1')->get();
        if ($dataCount != 0) {
            foreach ($data as $key => $d) {
                if ($d->level == 'umum') {
                    if ($d->tipe == 'ruangan') {
                        $ruang = Ruangan::where('id_ruang', $d->id_reff)->first();
                        $title = "Peminjaman Ruang " . $ruang->id . " Oleh " . $d->nama_organisasi;
                    } else {
                        $title = "Peminjaman Barang " . $d . " Oleh " . $d->nama_organisasi;
                    }
                } else {
                    $title = "Peminjaman Oleh " . $d->getKaryawan->nama_karyawan;
                }
                $events[] = Calendar::event(
                    "" . $title . "",
                    false,
                    new \DateTime($d->jam_pinjam . " " . $d->rencana_pinjam),
                    new \DateTime($d->jam_selesai . " " . $d->rencana_kembali),
                    "/admin",
                    [
                        'color' => 'black',
                        'textColor' => 'white',
                        'url' => 'guest/detail-pinjam/' . Crypt::encryptString($d->id) . '',
                    ]
                );
            }

            foreach ($data2 as $d2) {
                if ($d2->level == 'umum') {
                    if ($d2->tipe == 'ruangan') {
                        $master = RuangMaster::find($d2->id_reff);
                        $ruang = Ruangan::where('id_ruang', $master->id_ref)->first();
                        $title = "Peminjaman Ruang " . $ruang->nama_ruang . " Oleh " . $d2->nama_organisasi;
                    } else {
                        // $title = "Peminjaman Barang " . $d . " Oleh " . $d2->nama_organisasi;
                    }
                } else {
                    $title = "Peminjaman Oleh " . $d2->getKaryawan->nama_karyawan;
                }
                $events[] = Calendar::event(
                    "" . $title . "",
                    false,
                    new \DateTime($d2->jam_pinjam . " " . $d2->rencana_pinjam),
                    new \DateTime($d2->jam_selesai . " " . $d2->rencana_kembali),
                    "/admin",
                    [
                        'color' => 'green',
                        'textColor' => 'white',
                        'url' => 'guest/detail-pinjam/' . Crypt::encryptString($d2->id) . '',
                    ]
                );
            }
        } else {
            $events = [];
        }

        $calendar = Calendar::addEvents($events);

        return view('home', ['calendar' => $calendar]);
    }

    public function indexAdmin()
    {
        $dataCount = Peminjaman::count();
        $data = Peminjaman::where('verifikasi', '0')->get();
        $data2 = Peminjaman::where('verifikasi', '1')->get();
        if ($dataCount != 0) {
            foreach ($data as $key => $d) {
                if ($d->level == 'umum') {
                    $title = "Peminjaman Oleh " . $d->nama_organisasi;
                } else {
                    $title = "Peminjaman Oleh " . $d->getKaryawan->nama_karyawan;
                }
                $events[] = Calendar::event(
                    "" . $title . "",
                    false,
                    new \DateTime($d->jam_pinjam . " " . $d->rencana_pinjam),
                    new \DateTime($d->jam_selesai . " " . $d->rencana_kembali),
                    "/admin",
                    [
                        'color' => 'black',
                        'textColor' => 'white',
                        'url' => 'detail-pinjam/' . Crypt::encryptString($d->id) . '',
                    ]
                );
            }

            foreach ($data2 as $d2) {
                if ($d2->level == 'umum') {
                    $title = "Peminjaman Oleh " . $d2->nama_organisasi;
                } else {
                    $title = "Peminjaman Oleh " . $d2->getKaryawan->nama_karyawan;
                }
                $events[] = Calendar::event(
                    "" . $title . "",
                    false,
                    new \DateTime($d2->jam_pinjam . " " . $d2->rencana_pinjam),
                    new \DateTime($d2->jam_selesai . " " . $d2->rencana_kembali),
                    "/admin",
                    [
                        'color' => 'green',
                        'textColor' => 'white',
                        'url' => 'detail-pinjam/' . Crypt::encryptString($d2->id) . '',
                    ]
                );
            }
        } else {
            $events = [];
        }

        $calendar = Calendar::addEvents($events);
        return view('admin.dashboard', ['calendar' => $calendar]);
    }
}