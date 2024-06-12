@extends('layouts.admin')

@section('title', 'Barang ')

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
        <li class="breadcrumb-item active" aria-current="page">Barang</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Barang</h4>
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
                <h5 class="hk-sec-title">Data Barang</h5>
                <p>Seluruh data barang akan ditampilkan pada tabel dibawah</p>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <table id="datable_1" class="table table-hover w-100 display pb-30">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Inventaris</th>
                                        <th>Nama Barang</th>
                                        <th>Ruang</th>
                                        <th>Gedung</th>
                                        <th>Tanggal Pengadaan</th>
                                        <th>Kondisi</th>
                                        <th>Keterangan</th>
                                        <th>Ketersediaan</th>
                                        {{-- <th width="1%"></th>
                                        <th width="1%"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $d)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $d->no_inventaris }}</td>
                                        <td>{{ $d->nama_barang }}</td>
                                        <td>{{ $d->nama_ruang }}</td>
                                        <td>{{ $d->nama_gedung }}</td>
                                        <td>{{ $d->tgl_pengadaan }}</td>
                                        <td>{{ $d->kondisi }}</td>
                                        <td>{{ $d->ket }}</td>
                                        <td>{{ $d->stat }}</td>
                                        {{-- <td>
                                            <button class="btn btn-icon btn-warning btn-icon-style-1" onclick="window.location.href='{{ route('admin.barang.edit', Crypt::encryptString($d->id)) }}'"><span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></button>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.barang.destroy', Crypt::encryptString($d->id)) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-icon btn-danger btn-icon-style-1"><span class="btn-icon-wrap"><i class="fa fa-trash"></i></span></button>
                                            </form>
                                        </td> --}}
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