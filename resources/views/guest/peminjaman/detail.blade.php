<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sistem Peminjaman Alat & Ruang :: Polinus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Sistem peminjaman alat dan ruang Politeknik Indonusa Surakarta" />
    <meta name="keywords" content="pinjam, ruang, alat, polinus" />
    <meta content="unRandomDev" name="author" />
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

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky navbar-light">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="index.html">
                <img src="images/logo-light.png" class="logo-light" alt="" height="22">
                <img src="images/logo-dark.png" class="logo-dark" alt="" height="22">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                    <li class="nav-item active">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                </ul>
                <div class="navbar-button d-none d-lg-inline-block">
                    <a href="{{ route('login') }}" class="btn btn-sm btn-success btn-round">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- START BLOG -->
    <section class="section bg-light" id="kalender">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="title-sub-heading text-primary f-18">Detail Peminjaman</p>
                        <h2 class="title-heading">Detail Peminjaman Barang</h2>
                        <p class="title-desc text-muted mt-2">Pada halaman ini akan ditampilkan detail peminjaman
                            barang apa saja yang dipinjam oleh pengguna yang diklik</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5 pt-5">
                <div class="col-lg-6">
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-sm">
                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-4">Peminjam :</label>
                                    <div class="col-sm-8">
                                        <p>
                                            @if ($data != null)
                                                @if ($data->level == 'umum')
                                                    {{ $data->nama_organisasi }} - {{ $data->email }}
                                                @else
                                                    {{ $data->getKaryawan->nip }} -
                                                    {{ $data->getKaryawan->nama_karyawan }}
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Tipe Peminjaman :</label>
                                    <div class="col-sm-8">
                                        <p>
                                            {{ ucwords($data->tipe) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Item Yang Dipinjam :</label>
                                    <div class="col-sm-8">
                                        <p>
                                            {{--
                                            @if ($data->tipe == 'kendaraan')
                                                {{ $data->getKendaraan->kode_kendaraan }}
                                            @else --}}
                                            @if($data->tipe == 'ruangan')
                                                {{ $data->getRuangan->nama_ruang }} - {{ $data->getRuangan->getGedung->nama_gedung }}
                                            @elseif($data->tipe == 'barang')
                                                {{ $data->getBarang->nama_barang }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Waktu dan Tanggal Peminjaman :</label>
                                    <div class="col-sm-8">
                                        <p>
                                            {{ date('d-m-Y', strtotime($data->rencana_pinjam)) }},
                                            {{ $data->jam_pinjam }} -
                                            {{ date('d-m-Y', strtotime($data->rencana_kembali)) }},
                                            {{ $data->jam_selesai }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4">Status Peminjaman :</label>
                                    <div class="col-sm-8">
                                        <p>
                                            @if ($data->verifikasi == '0')
                                                <span
                                                    class="badge badge-primary">{{ __('Menunggu Verifikasi Admin') }}</span>
                                            @elseif($data->verifikasi == '1')
                                                <span class="badge badge-success">{{ __('Disetujui') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('Ditolak') }}</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BLOG -->

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
</body>

</html>