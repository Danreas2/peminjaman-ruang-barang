@extends('layouts.admin')

@section('title', 'Detail Peminjaman ')

@section('css')
@endsection

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Data Peminjaman</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Peminjaman</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="eye"></i></span></span>Detail Peminjaman</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Data Peminjaman</h5>
                <p>Seluruh data Peminjaman akan ditampilkan pada tabel dibawah</p>
                <div class="row">
                    <div class="col-sm">
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2">Peminjam :</label>
                            <div class="col-sm-10">
                                <p>
                                    @if($data != null)
                                        @if($data->level == 'umum')
                                            {{ $data->nama_organisasi }} - {{ $data->email }}
                                        @else
                                            {{ $data->getKaryawan->nip }} - {{ $data->getKaryawan->nama_karyawan }}
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">Tipe Peminjaman :</label>
                            <div class="col-sm-10">
                                <p>
                                    {{ ucwords($data->tipe) }}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">Item Yang Dipinjam :</label>
                            <div class="col-sm-10">
                                <p>
                                    @if($data->tipe == 'kendaraan')
                                        {{ $data->getKendaraan->kode_kendaraan }}
                                    @elseif($data->tipe == 'ruangan')
                                        {{ $data->getRuangan->nama_ruang }} - {{ $data->getRuangan->getGedung->nama_gedung }}
                                    @elseif($data->tipe == 'barang')
                                        {{ $data->getBarang->nama_barang }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">Waktu dan Tanggal Peminjaman :</label>
                            <div class="col-sm-10">
                                <p>
                                    {{ date('d-m-Y', strtotime($data->rencana_pinjam)) }}, {{ $data->jam_pinjam }}  - {{ date('d-m-Y', strtotime($data->rencana_kembali)) }}, {{ $data->jam_selesai }} 
                                </p>
                            </div>
                        </div>
                    </div>  
                </div>
            </section>
        </div>
    </div>
    <!-- /Row -->
</div>
@endsection

@section('js')
@endsection