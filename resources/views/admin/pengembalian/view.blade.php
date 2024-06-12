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
                                        {{ $data->getRuangan->nama_ruang }}
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

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="edit"></i></span></span>Form Pengembalian</h4>
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Formulir Pengembalian Barang</h5>
                <div class="row">
                    <br>
                    <div class="col-sm">
                        <form method="post" action="{{ route('admin.pengembalian.store') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="row">
                              <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal & Jam Kembali</label>
                                <div class="col-md-3 form-group">
                                  <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
                                </div>
                                <div class="col-md-2 form-group">
                                  <input type="time" class="form-control" id="jam_kembali" name="jam_kembali">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kondisi">
                                        <option>Silahkan Pilih Kondisi Barang</option>
                                        <option value="baik">Baik</option>
                                        <option value="rusak">Rusak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan Kerusakan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="keterangan" placeholder="Tuliskan Keterangan Kerusakan" id="keterangan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
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