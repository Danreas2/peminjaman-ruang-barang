@extends('layouts.admin')

@section('title', 'Ubah Data Karyawan ')

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
        <li class="breadcrumb-item">Karyawan</li>
        <li class="breadcrumb-item active" aria-current="page">Ubah Data Karyawan</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="home"></i></span></span>Karyawan</h4>
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
            <h5 class="hk-sec-title">Data Karyawan</h5>
            <p>Silahkan Lengkapi Data Pada Form Dibawah</p>
            <br>
            <div class="row">
                <div class="col-sm">
                    <form method="post" action="{{ route('admin.karyawan.update', $id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" value="{{ $data->nip }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Nama Karyawan" value="{{ $data->nama_karyawan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $data->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact_person" class="col-sm-2 col-form-label">Contact Person</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact_person" class="form-control" id="contact_person" placeholder="Nomor Yang Bisa Dihubungi" value="{{ $data->contact_person }}">
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