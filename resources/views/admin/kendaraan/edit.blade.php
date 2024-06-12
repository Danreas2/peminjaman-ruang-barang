@extends('layouts.admin')

@section('title', 'Ubah Data Kendaraan ')

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
        <li class="breadcrumb-item">Kendaraan</li>
        <li class="breadcrumb-item active" aria-current="page">Ubah Data Kendaraan</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Kendaraan</h4>
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
            <h5 class="hk-sec-title">Data Kendaraan</h5>
            <p>Silahkan Lengkapi Data Pada Form Dibawah</p>
            <br>
            <div class="row">
                <div class="col-sm">
                    <form method="post" action="{{ route('admin.kendaraan.update', $id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="nama_kendaraan" class="col-sm-2 col-form-label">Nama Kendaraan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" placeholder="Nama Kendaraan" value="{{ $data->kode_kendaraan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jenis">
                                    <option>Silahkan Pilih Jenis Kendaraan</option>
                                    <option value="motor" @if($data->jenis == 'motor') selected @endif>Motor</option>
                                    <option value="mobil" @if($data->jenis == 'mobil') selected @endif>Mobil</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kondisi">
                                    <option>Silahkan Pilih Kondisi Kendaraan</option>
                                    <option value="baik" @if($data->kondisi == 'baik') selected @endif>Baik</option>
                                    <option value="rusak" @if($data->kondisi == 'rusak') selected @endif>Rusak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ada" class="col-sm-2 col-form-label">Ketersediaan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="ada">
                                    <option>Silahkan Pilih Ketersediaan Kendaraan</option>
                                    <option value="ada" @if($data->ada == 'ada') selected @endif>Ada</option>
                                    <option value="dipinjam" @if($data->ada == 'dipinjam') selected @endif>Dipinjam</option>
                                    <option value="diperbaiki" @if($data->ada == 'diperbaiki') selected @endif>Diperbaiki</option>
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