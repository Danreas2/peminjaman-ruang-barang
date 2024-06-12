@extends('layouts.admin')

@section('title', 'Tambah Peminjaman ')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
        <li class="breadcrumb-item">Peminjaman</li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Peminjaman</li>
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
            <h5 class="hk-sec-title">Data Peminjaman</h5>
            <p>Silahkan Lengkapi Data Pada Form Dibawah</p>
            <br>
            <div class="row">
                <div class="col-sm">
                    <form method="post" action="{{ route('admin.peminjaman.update', $id) }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="tipe" value="{{ $data->level }}">
                        <div class="other"></div>
                        <div class="row">
                          <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal & Jam Pinjam</label>
                            <div class="col-md-3 form-group">
                              <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ $data->rencana_pinjam }}">
                            </div>
                            <div class="col-md-2 form-group">
                              <input type="time" class="form-control" id="jam_pinjam" name="jam_pinjam" value="{{ $data->jam_pinjam }}">
                            </div>
                        </div>
                        <div class="row">
                          <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal & Jam Kembali</label>
                            <div class="col-md-3 form-group">
                              <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ $data->rencana_kembali }}">
                            </div>
                            <div class="col-md-2 form-group">
                              <input type="time" class="form-control" id="jam_kembali" name="jam_kembali" value="{{ $data->jam_selesai }}">
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
<script type="text/javascript">

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  Tipe('{!! $data->level !!}');

  function Tipe(val) {
    
    var dt = new FormData();

    dt.append('tipe', val);
    dt.append('mode', 'edit');
    dt.append('id', '{!! $id !!}');

    $.ajax({
      type:'POST',
      url:'{{ route('admin.peminjam.tipe') }}',
      processData: false,
      contentType: false,
      data:dt,
      success:function(data){
        $('.other').html(data);
      }
    });
  }
</script>
@endsection