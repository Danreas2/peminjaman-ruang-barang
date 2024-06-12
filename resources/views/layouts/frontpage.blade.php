<!DOCTYPE html>
<html lang="en">
<!--
Project Name: Sistem Peminjaman Ruang
Author: Andre Tantri Yanuar
Contact: yanuar.andre28@gmail.com
-->

<head>
    <meta charset="utf-8" />
    <title>Sistem Peminjaman Alat :: Polinus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Peminjaman alat dan ruang Politeknik Indonusa Surakarta" />
    <meta name="keywords" content="pinjam, ruang, alat, sinapra" />
    <meta content="UTI - Andre" name="author" />
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link href="{{ asset('frontpage/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontpage/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- flexslider slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontpage/css/flexslider.css') }}" />
    <!-- magnific pop-up -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontpage/css/magnific-popup.css') }}" />
    <!-- magnific pop-up -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontpage/css/ion.rangeSlider.min.css') }}" />
    <!-- Pe-icon-7 icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontpage/css/pe-icon-7-stroke.css') }}" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('frontpage/css/swiper.min.css') }}" />
    <link href="{{ asset('frontpage/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky navbar-light">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="{{ route('home') }}">
                <img src="{{ asset('dist/img/logo.png') }}" class="logo-light" alt="" height="60">
                <img src="{{ asset('dist/img/logo.png') }}" class="logo-dark" alt="" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                    <li class="nav-item active">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#kalender" class="nav-link">Kalender</a>
                    </li>
                    <li class="nav-item">
                        <a href="#form-pinjam" class="nav-link">Formulir Peminjaman</a>
                    </li>
                </ul>
                <div class="navbar-button d-none d-lg-inline-block">
                    <a href="{{ route('login') }}" class="btn btn-sm btn-success btn-round">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- START HOME -->
    <section class="bg-home-3 bg-primary align-items-center" id="home">
        <div class="container">


            <!-- start row -->
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <div class="main-slider home-content text-center">
                        <ul class="slides text-white">
                            <li>
                                <h3 class="home-title">Peminjaman Yang Realtime
                                </h3>
                                <p class="text-white-50 mt-3">Data peminjaman yang diverifikasi oleh admin akan
                                    ditampilkan pada kalender<br>Sehingga jika ingin meminjam barang yang sama pada hari
                                    yang sama akan mempercepat anda menschedule ulang</p>
                                <div class="mt-4 pt-3">
                                    <a href="#kalender" class="btn btn-success mr-3">Lihat Kalender <i
                                            class="mdi mdi-arrow-right ml-2"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- end row -->

        </div>
    </section>
    <!-- END HOME -->

    <!-- START BLOG -->
    <section class="section bg-light" id="kalender">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Kalender</p>
                        <h2 class="title-heading">Peminjaman Yang Diverifikasi Oleh Admin</h2>
                        <p class="title-desc text-muted mt-2">Setelah anda mengisi formulir peminjaman maka akan
                            diverifikasi oleh admin, jika admin mengizinkan maka data peminjaman anda akan ditampilkan
                            sesuai tanggal peminjaman yang anda lakukan</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">

                    {!! $calendar->calendar() !!}

                </div>

            </div>
        </div>
    </section>
    <!-- END BLOG -->

    <!-- START CONTACT -->
    <section class="section" id="form-pinjam">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Form Peminjaman</p>
                        <h2 class="title-heading">Melakukan Peminjaman Barang</h2>
                        <p class="title-desc text-muted mt-2">Jika anda ingin meminjam, silahkan
                            lengkapi data pada form dibawah</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-lg-4"></div>
                <div class="col-lg-6">
                    <div class="mt-4">
                        <div class="custom-form mt-4">
                            @if ($sukses = Session::get('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{ $sukses }}
                                </div>
                            @endif
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <form method="post" action="{{ route('guest.peminjaman.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="nama_organisasi" class="col-sm-4 col-form-label">Penanggung
                                        Jawab</label>
                                    <div class="col-sm-8">
                                        <select name="cari_nama" id="cari_nama" class="form-control"
                                            onchange="Pj(this.value)">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="pegawai">Dosen / Staff</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row loading-nama">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="show-nama"></div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email @poltek atau yang aktif">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="tanggal_pinjam" class="col-sm-4 col-form-label">Tanggal & Jam
                                        Pinjam</label>
                                    <div class="col-md-4 form-group">
                                        <input type="date" class="form-control" id="tanggal_pinjam"
                                            name="tanggal_pinjam">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <input type="time" class="form-control" id="jam_pinjam"
                                            name="jam_pinjam">
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="tanggal_kembali" class="col-sm-4 col-form-label">Tanggal & Jam
                                        Kembali</label>
                                    <div class="col-md-4 form-group">
                                        <input type="date" class="form-control" id="tanggal_kembali"
                                            name="tanggal_kembali">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <input type="time" class="form-control" id="jam_kembali"
                                            name="jam_kembali">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pinjam" class="col-sm-4 col-form-label">Yang Dipinjam</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="pinjam" onchange="Alat(this.value)">
                                            <option>Silahkan Pilih Jenis Pinjam</option>
                                            {{-- <option value="kendaraan">Kendaraan</option> --}}
                                            <option value="ruangan">Ruangan</option>
                                            <option value="barang">Barang</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row loading">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                                <div class="alat"></div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
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
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </section>
    <!-- END CONTACT -->

    <!-- START FOOTER -->
    <section class="section bg-light pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-info mt-4">
                        <p align='center'><img src="{{ asset('dist/img/logo.png') }}" alt=""
                                height="70" /></p>
                        <h5 align='center'>Sistem Peminjaman Ruang</h5>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-12">
                                <h5 class="f-18">QUICK LINKS</h5>
                                <ul class="list-unstyled footer-link mt-3">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="#kalender">Kalender</a></li>
                                    <li><a href="#form-pinjam">Form Pengajuan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-12">
                                <h5 class="f-18">Follow Us</h5>
                                <ul class="list-inline social-icons-list pt-3">
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/poltekindonusasolo/?locale=id_ID"><i
                                                class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.instagram.com/poltek_indonusa"><i
                                                class="mdi mdi-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.youtube.com/channel/UCmzCQNQ0ArML763X-CrV6XQ"><i
                                                class="mdi mdi-youtube"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.tiktok.com/@poltek_indonusa"><i
                                                class="fa-brands fa-tiktok"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.poltekindonusa.ac.id"><i class="fa fa-globe"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-5" />

            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="text-muted mb-0">{{ date('Y') }} &copy; Politeknik Indonusa Surakarta</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END FOOTER -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- javascript -->
    <script src="{{ asset('frontpage/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontpage/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontpage/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontpage/js/scrollspy.min.js') }}"></script>
    <!--flex slider plugin-->
    <script src="{{ asset('frontpage/js/jquery.flexslider-min.js') }}"></script>

    <!-- Portfolio -->
    <script src="{{ asset('frontpage/js/ion.rangeSlider.min.js') }}"></script>

    <!-- Portfolio -->
    <script src="{{ asset('frontpage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontpage/js/isotope.js') }}"></script>


    <!-- Swiper JS -->
    <script src="{{ asset('frontpage/js/swiper.min.js') }}"></script>

    <!-- yt player -->
    <script src="{{ asset('frontpage/js/jquery.mb.YTPlayer.js') }}"></script>

    <!-- contact init -->
    <script src="{{ asset('frontpage/js/contact.init.js') }}"></script>

    <!-- Main Js -->
    <script src="{{ asset('frontpage/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".loading").attr('hidden', true);
        $(".loading-nama").attr('hidden', true);

        function peminjam(val) {

            var dt = new FormData();

            dt.append('tipe', val);

            $.ajax({
                type: 'POST',
                url: '{{ route('guest.peminjam.user') }}',
                processData: false,
                contentType: false,
                data: dt,
                success: function(data) {
                    $('.alat').html(data);
                }
            });
        }

        function Pj(val) {
            var dt = new FormData();

            dt.append('tipe', val);

            $.ajax({
                type: 'POST',
                url: '{{ route('guest.peminjam.user') }}',
                processData: false,
                contentType: false,
                data: dt,
                beforeSend: function() {
                    $(".loading-nama").removeAttr('hidden');
                    $('.show-nama').attr('hidden', true);
                },
                success: function(data) {
                    $('.loading-nama').attr('hidden', true);
                    $(".show-nama").removeAttr('hidden');
                    $('.show-nama').html(data);
                }
            });
        }

        function Alat(val) {

            var dt = new FormData();

            dt.append('tipe', val);
            dt.append('mode', 'add');
            dt.append('tgl_pinjam', $('#tanggal_pinjam').val());
            dt.append('tgl_kembali', $('#tanggal_kembali').val());

            $.ajax({
                type: 'POST',
                url: '{{ route('guest.peminjam.item') }}',
                processData: false,
                contentType: false,
                data: dt,
                beforeSend: function() {
                    $(".loading").removeAttr('hidden');
                    $('.alat').attr('hidden', true);
                },
                success: function(data) {
                    $('.loading').attr('hidden', true);
                    $(".alat").removeAttr('hidden');
                    $('.alat').html(data);
                }
            });
        }
    </script>
</body>

</html>