@extends('layouts.admin')

@section('title', 'Tambah Ruangan ')

@section('css')
    <link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <style type="text/css">
        .select2-selection__rendered {
            line-height: 18px !important;
            margin-top: 3px;
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
            <li class="breadcrumb-item">Ruangan</li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Ruangan</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
                            data-feather="plus"></i></span></span>Tambah Ruangan</h4>
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
                    <p>Data diambil dari SINAPRA, silahkan pilih ruang yang ingin diberikan izin untuk dapat dipinjam</p>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <form method="post" action="{{ route('admin.ruangan.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="nama_ruang" class="col-sm-2 col-form-label">Pilih Ruangan</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_ruang" id="id_ruang">
                                            @foreach ($ruang as $r)
                                                <option value="{{ $r->id_ruang }}">{{ $r->nama_ruang }} - Lantai {{ $r->lantai }} - {{ $r->getGedung->nama_gedung }}</option>
                                            @endforeach
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
        $("#id_ruang").select2({
            tags: true,
            width: 'resolve',
        });
    </script>
@endsection
