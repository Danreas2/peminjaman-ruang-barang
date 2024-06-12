@extends('layouts.admin')

@section('title', 'Edit Data Ruangan ')

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
        <li class="breadcrumb-item">Ruangan</li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Ruangan</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Edit Data Ruangan</h4>
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
            <h5 class="hk-sec-title">Data Ruangan</h5>
            <p>Silahkan Lengkapi Data Pada Form Dibawah</p>
            <br>
            <div class="row">
                <div class="col-sm">
                    <form method="post" action="{{ route('admin.ruangan.update', $id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="nama_ruang" class="col-sm-2 col-form-label">Nama Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" placeholder="Nama Ruang" value="{{ $data->nama_ruang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kapasitas" class="col-sm-2 col-form-label">Kapasitas</label>
                            <div class="col-sm-10">
                                <input type="text" name="kapasitas" class="form-control" id="kapasitas" placeholder="Kapasitas" value="{{ $data->kapasitas }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fasilitas" name="fasilitas" placeholder="Fasilitas" value="{{ $data->fasilitas }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="lokasi" value="{{ $data->lokasi }}">
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