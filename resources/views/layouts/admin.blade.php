<!DOCTYPE html>
<!--
Project Name: Sistem Peminjaman Ruang
Author: Andre Tantri Yanuar
Contact: yanuar.andre28@gmail.com
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>@yield('title') :: Sistem Peminjaman</title>
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

    <!-- vector map CSS -->
    <link href="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="{{ asset('vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
    <!-- Toastr CSS -->
    <link href="{{ asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->

    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span
                    class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="brand-img d-inline-block" src="{{ asset('dist/img/logo.png') }}" alt="brand" height="50px"/>&nbsp;&nbsp;Sistem Peminjaman
            </a>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="{{ asset('dist/img/avatar12.jpg') }}" alt="user"
                                        class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>{{ Auth::user()->name }}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="dropdown-icon zmdi zmdi-power"></i><span>{{ __('Logout') }}</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <form role="search" class="navbar-search">
            <div class="position-relative">
                <a href="javascript:void(0);" class="navbar-search-icon"><span class="feather-icon"><i
                            data-feather="search"></i></span></a>
                <input type="text" name="example-input1-group2" class="form-control"
                    placeholder="Type here to Search">
                <a id="navbar_search_close" class="navbar-search-close" href="#"><span class="feather-icon"><i
                            data-feather="x"></i></span></a>
            </div>
        </form>
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                        data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="{{ route('admin.ruangan') }}">
                                <span class="feather-icon"><i data-feather="home"></i></span>
                                <span class="nav-link-text">Ruangan</span>
                            </a>
                        </li> --}}
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('admin.barang') }}">
                                <span class="feather-icon"><i data-feather="package"></i></span>
                                <span class="nav-link-text">Barang</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#data_ruang">
                                <span class="feather-icon"><i data-feather="home"></i></span>
                                <span class="nav-link-text">Ruangan</span>
                            </a>
                            <ul id="data_ruang" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('admin.ruangan') }}">Semua</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('admin.ruangan.create') }}">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#data_kendaraan">
                                <span class="feather-icon"><i data-feather="truck"></i></span>
                                <span class="nav-link-text">Kendaraan</span>
                            </a>
                            <ul id="data_kendaraan" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('admin.kendaraan') }}">Semua</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link"
                                                href="{{ route('admin.kendaraan.create') }}">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#data_barang">
                                <span class="feather-icon"><i data-feather="package"></i></span>
                                <span class="nav-link-text">Barang</span>
                            </a>
                            <ul id="data_barang" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('admin.barang') }}">Semua</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('admin.barang.create') }}">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#data_karyawan">
                                <span class="feather-icon"><i data-feather="users"></i></span>
                                <span class="nav-link-text">Karyawan</span>
                            </a>
                            <ul id="data_karyawan" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('admin.karyawan') }}">Semua</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link"
                                                href="{{ route('admin.karyawan.create') }}">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#peminjaman">
                                <span class="feather-icon"><i data-feather="log-out"></i></span>
                                <span class="nav-link-text">Peminjaman</span>
                            </a>
                            <ul id="peminjaman" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('admin.peminjaman') }}">Semua</a>
                                        </li>
                                        <li class="nav-item active">
                                            <a class="nav-link"
                                                href="{{ route('admin.peminjaman.create') }}">Tambah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#verifikasi">
                                <span class="feather-icon"><i data-feather="check"></i></span>
                                <span class="nav-link-text">Verifikasi</span>
                            </a>
                            <ul id="verifikasi" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('admin.verifikasi') }}">Semua
                                                Peminjaman</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                data-target="#pengembalian">
                                <span class="feather-icon"><i data-feather="log-in"></i></span>
                                <span class="nav-link-text">Pengembalian</span>
                            </a>
                            <ul id="pengembalian" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{ route('admin.pengembalian') }}">Semua
                                                Pengembalian</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            @yield('content')
            <!-- /Container -->

            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>{{ date('Y') }} &copy; Politeknik Indonusa Surakarta</p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <script src="{{ asset('vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{ asset('vendors/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('dist/js/toggle-data.js') }}"></script>

    <!-- Counter Animation JavaScript -->
    <script src="{{ asset('vendors/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/morris.js/morris.min.js') }}"></script>

    <!-- EChartJS JavaScript -->
    <script src="{{ asset('vendors/echarts/dist/echarts-en.min.js') }}"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <!-- Vector Maps JavaScript -->
    <script src="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dist/js/vectormap-data.js') }}"></script>

    <!-- Owl JavaScript -->
    <script src="{{ asset('vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>

    <!-- Toastr JS -->
    <script src="{{ asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('dist/js/init.js') }}"></script>
    @yield('js')
</body>

</html>
