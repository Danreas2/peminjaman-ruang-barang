@extends('layouts.admin')

@section('title', 'Peminjaman ')

@section('css')
<!-- Data Table CSS -->
<link href="{{ asset('vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css') }}" />
<link href="{{ asset('vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
        <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Peminjaman</h4>
    </div>
    <!-- /Title -->

    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success" role="alert">
        {{ $sukses }}
    </div>
    @endif

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Cetak Data Peminjaman</h5>
                <div class="row">
                    <div class="col-sm">
                        <form method="post" action="{{ route('admin.peminjaman.cetak') }}">
                        @csrf
                        <div class="row">
                          <label for="tanggal_awal" class="col-sm-3 col-form-label">Tanggal Awal</label>
                            <div class="col-md-4 form-group">
                              <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                            </div>
                        </div>
                        <div class="row">
                          <label for="tanggal_kembali" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                            <div class="col-md-4 form-group">
                              <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Cetak</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Data Peminjaman</h5>
                <p>Seluruh data Peminjaman akan ditampilkan pada tabel dibawah</p>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <table id="datable_1" class="table table-hover w-100 display pb-30">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Peminjam</th>
                                        <th>Yang Dipinjam</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Verifikasi</th>
                                        <th>Status</th>
                                        <th width="1%"></th>
                                        <th width="1%"></th>
                                        <th width="1%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $d)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            @if($d->level == 'umum')
                                                {{ $d->nama_organisasi }}
                                            @else
                                                {{ $d->getKaryawan->nama_karyawan }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($d->tipe == 'kendaraan')
                                                {{ $d->getKendaraan->kode_kendaraan }}
                                            @elseif($d->tipe == 'ruangan')
                                                {{ $d->getRuangan->nama_ruang }}
                                            @elseif($d->tipe == 'barang')
                                                {{ $d->getBarang->nama_barang }}
                                            @endif
                                        </td>
                                        <td>{{ $d->rencana_pinjam }}</td>
                                        <td>{{ $d->rencana_kembali }}</td>
                                        <td>
                                            @if($d->verifikasi == '1')
                                                Disetujui
                                            @else
                                                Belum / Tidak Disetujui
                                            @endif
                                        </td>
                                        <td>@if($d->getPengembalian->count()) Sudah Kembali @else Belum Kembali @endif</td>
                                        <td>
                                            <button class="btn btn-icon btn-primary btn-icon-style-1" onclick="window.location.href='{{ route('admin.detail-pinjam.show', Crypt::encryptString($d->id)) }}'"><span class="btn-icon-wrap"><i class="fa fa-eye"></i></span></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-icon btn-warning btn-icon-style-1" onclick="window.location.href='{{ route('admin.peminjaman.edit', Crypt::encryptString($d->id)) }}'"><span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></button>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.peminjaman.destroy', Crypt::encryptString($d->id)) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-icon btn-danger btn-icon-style-1"><span class="btn-icon-wrap"><i class="fa fa-trash"></i></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<!-- Data Table JavaScript -->
<script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
@endsection