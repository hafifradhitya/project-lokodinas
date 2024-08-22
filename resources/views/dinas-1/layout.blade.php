<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $identitas->nama_website }}</title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ $identitas->meta_deskripsi }}">
    <meta name="keywords" content="{{ $identitas->meta_keywords }}">
    <meta name="author" content="lokomedia.web.id">
    <meta name="robots" content="all,index,follow">
    <meta http-equiv="Content-Language" content="id-ID">
    <meta NAME="Distribution" CONTENT="Global">
    <meta NAME="Rating" CONTENT="General">
    <link rel="canonical" href="{{ url()->current() }}" />
    @if (request()->segment(1) == 'berita' && request()->segment(2) == 'detail')
    @php
    $rows = \App\Models\Berita::where('judul_seo', request()->segment(3))->first();
    @endphp
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url(request()->segment(3)) }}" />
    <meta property="og:image" content="{{ asset('asset/foto_berita/' . $rows->gambar) }}" />
    <meta property="og:description" content="{{ $description }}" />
    @endif
    <link rel="icon" href="{{ asset('foto_identitas/' . $identitas->favicon)}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/argon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/theme-elements.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/theme-blog.css') }}" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .bg-gray {
            background-color: #343a40;
        }

        /* CSS untuk dropdown menu */
        .dropdown-menu {
            display: none;
            /* Sembunyikan dropdown secara default */
            position: absolute;
            /* Posisi absolut untuk dropdown */
            left: 0;
            /* Posisi kiri */
            top: 100%;
            /* Posisi di bawah elemen induk */
            width: 100%;
            /* Lebar sama dengan elemen induk */
            background-color: #fff;
            /* Warna latar belakang */
            border: 1px solid #ccc;
            /* Border */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Bayangan */
            z-index: 1000;
            /* Pastikan dropdown di atas elemen lain */
        }

        /* Menampilkan dropdown saat hover */
        .position-relative:hover .dropdown-menu {
            display: block;
            /* Tampilkan dropdown saat hover */
        }

        /* Gaya untuk item dropdown */
        .dropdown-item {
            padding: 10px 15px;
            /* Padding untuk item */
            color: #333;
            /* Warna teks */
            text-decoration: none;
            /* Hapus garis bawah */
            display: block;
            /* Tampilkan sebagai blok */
        }

        /* Gaya saat item dropdown dihover */
        .dropdown-item:hover {
            background-color: #f8f9fa;
            /* Warna latar belakang saat hover */
            color: #007bff;
            /* Warna teks saat hover */
        }

        /* Gaya untuk link menu utama */
        .dropdown-toggle {
            color: #fff;
            /* Warna teks menu utama */
            padding: 15px;
            /* Padding untuk menu utama */
            text-decoration: none;
            /* Hapus garis bawah */
        }

        /* Gaya saat menu utama dihover */
        .dropdown-toggle:hover {
            background-color: #007bff;
            /* Warna latar belakang saat hover */
            color: #fff;
            /* Warna teks saat hover */
        }
    </style>
</head>
<header id="header" class="header-no-border-bottom" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 190, 'stickySetTop': '-190px', 'stickyChangeLogo': false}">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div style="text-align: center;">
                        <img style='width:70px;' src="{{ asset('logo/' . $logo->gambar) }}" />
                        <h4><b><span style=" color: #fff;">PEMERINTAH KABUPATEN KARAWANG</span></b></h4>
                        <h4><b><span style=" color: #fff;">DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA</span></b></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container header-nav header-nav-center header-nav-bar header-nav-bar-dark bg-dark position:">
            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                <i class="fa fa-bars"></i>
            </button>
            <div class="header-nav-main header-nav-main-dark header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse" style="padding-top:3px;">
                <nav class="bg-dark">
                    <ul class="nav nav-pills justify-content-center" id="mainNav">
                        <li class="">
                            <a href="{{ url('/') }}" class="text-white">
                                <i class="fa fa-home" style="font-size:25px;"></i>
                            </a>
                        </li>
                        @foreach($menus as $menu)
                        <li class="position-relative">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown{{ $menu->id_menu }}" role="button" data-bs-toggle="dropdown" aria-expanded="false" onmouseover="showDropdown('{{ $menu->id_menu }}')" onmouseout="hideDropdown('{{ $menu->id_menu }}')">
                                {{ $menu->nama_menu }}
                            </a>
                            @if($menu->children->count() > 0)
                            <ul class="dropdown-menu" id="dropdown{{ $menu->id_menu }}" aria-labelledby="navbarDropdown{{ $menu->id_menu }}" style="display: none; position: absolute; left: 0; ">
                                @foreach($menu->children as $child)
                                <li><a class="dropdown-item" href="#">{{ $child->nama_menu }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        <li>
                            <a href="{{ url('hubungi/') }}" class="text-white">
                                Hubungi Kami
                            </a>
                        </li>
                        <li class="hidden-xs hidden-sm" style="padding:10px 13px;">
                            <form method="POST" action="{{ url('berita/index/') }}">
                                @csrf
                                <div class="input-group" style="position:absolute; width:150px; right:50px;">
                                    <input name="kata" type="text" class="form-control" placeholder="Cari...">
                                    <span class="input-group-btn">
                                        <button name="cari" class="btn btn-default" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">

</div>
<br>
<br>
<br>
@yield('footer')
<footer class="">
    <div class="container-fluid bg-dark text-white p-6">
        <div class="row">
            <div class="col-md-4">
                <h5 class="mb-sm text-white">LOKASI</h5>
                <iframe width="100%" height="305" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{ $identitas->maps }}"></iframe>
            </div>
            <div class="col-md-4">
                <h5 class="mb-sm text-white">FANSPAGE</h5>
                <div class="fb-page" data-href="https://www.facebook.com/dppkbkarawang/" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/dppkbkarawang/" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/dppkbkarawang/">DPPKB Karawang</a>
                    </blockquote>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="mb-sm text-white">CONTACT US</h5>
                <h2 class="mb-xl text-white"><strong>{{ $identitas->no_telp }}</strong></h2>
                <div class="text-white">
                    {!! $alamat->alamat !!}
                </div>
                <ul class="social-icons mt-xl d-flex">
                    <a class="sc-1 mr-4" href="#"><i class="fab fa-facebook fa-2x"></i></a>
                    <a class="sc-2 mr-4" href="#"><i class="fab fa-twitter fa-2x"></i></a>
                    <a class="sc-3 mr-4" href="#"><i class="fab fa-instagram fa-2x"></i></a>
                    <a class="sc-4 mr-4" href="#"><i class="fab fa-youtube fa-2x"></i></a>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white bg-gray-dark">
        <div class="row">
            <div class="col-md-11 p-4">
                <p class="text-white d-flex justify-content-start ml-6">© {{ date('Y') }} Powered by Lokomedia.web.id.</p>
            </div>
        </div>
    </div>
</footer>

<body>
    <script>
        function showDropdown(id) {
            document.getElementById('dropdown' + id).style.display = 'block';
        }

        function hideDropdown(id) {
            document.getElementById('dropdown' + id).style.display = 'none';
        }
    </script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="{{ url('assets/js/ckeditor.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ url('assets/js/argon.js') }}"></script>

    <script src="{{ url('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

    <script src="{{ url('assets/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

    <script src="{{ url('assets/js/demo.min.js') }}"></script>
    <script src="{{ url('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

    <script src="{{ url('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ url('assets/js/components/charts/chart-bar.js') }}"></script>
    <script src="{{ url('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="{{ url('assets/vendor/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ url('assets/js/vendor/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>

    <script src="{{ url('assets/js/argon.js?v=1.1.0') }}"></script>

    <script src="{{ url('assets/js/demo.min.js') }}"></script>
</body>

</html>