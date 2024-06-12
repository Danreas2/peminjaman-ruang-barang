@extends('layouts.admin')

@section('title', 'Tambah Barang ')

@section('css')
<link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
<style type="text/css">
  .select2-selection__rendered {
    line-height: 18px !important;
  }
  .select2-container .select2-selection--single {
      height: 35px !important;
  }
  .select2-selection__arrow {
      height: 34px !important;
  }
</style>
@endsection

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
        <li class="breadcrumb-item">Barang</li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
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

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
        @endforeach
    @endif

  <!-- Row -->
  <div class="row">
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <h5 class="hk-sec-title">Data Barang</h5>
            <p>Silahkan Lengkapi Data Pada Form Dibawah</p>
            <br>
            <div class="row">
                <div class="col-sm">
                    <form method="post" action="{{ route('admin.barang.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="no_inventaris" class="col-sm-2 col-form-label">No Inventaris</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_inventaris" name="no_inventaris" placeholder="Nomor Inventaris">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ruang" class="col-sm-2 col-form-label">Ruang</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="ruang" id="ruang">
                                    <option>Silahkan Pilih Ruang</option>
                                    @foreach($ruang as $r)
                                    <option value="{{ $r->id }}">{{ $r->nama_ruang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_pengadaan" class="col-sm-2 col-form-label">Tanggal Pengadaan</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal_pengadaan" name="tanggal_pengadaan" placeholder="Tanggal Pengadaan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Barang</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kondisi">
                                    <option>Silahkan Pilih Kondisi Barang</option>
                                    <option value="baik">Baik</option>
                                    <option value="rusak">Rusak</option>
                                    <option value="hilang">Hilang</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ada" class="col-sm-2 col-form-label">Ketersediaan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="ada">
                                    <option>Silahkan Pilih Ketersediaan Barang</option>
                                    <option value="ada">Ada</option>
                                    <option value="dipinjam">Dipinjam</option>
                                </select>
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
<script src="{{ asset('vendors/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">
    $("#ruang").select2({
       tags: true,
       width: 'resolve',
    });
</script>
@endsection