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
    <link rel="icon" href="{{ asset('images/favpertmin.png')}}" type="image/x-icon">
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
</style>
</head>


@yield('footer')
<div class="container-fluid fixed-bottom bg-dark text-white">
    <div class="row">
        <div class="col-md-4">
            <h3 class="mb-sm text-white">LOKASI</h3>
            <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{ $identitas->maps }}"></iframe>
        </div>
        <div class="col-md-4">
            <h3 class="mb-sm text-white">FANSPAGE</h3>
            <div class="fb-page" data-href="https://www.facebook.com/dppkbkarawang/" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/dppkbkarawang/" class="fb-xfbml-parse-ignore">
                    <a href="https://www.facebook.com/dppkbkarawang/">DPPKB Karawang</a>
                </blockquote>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="mb-sm text-white">Contact Us</h3>
            <p class="mb-xl text-white text-4xl"><strong>{{ $identitas->no_telp }}</strong></p>
            <div>
                {!! $alamat->alamat !!}
            </div>
            <ul class="social-icons mt-xl d-flex"> <!-- Tambahkan kelas d-flex untuk membuat ul menjadi horizontal -->
                <a class="sc-1 mr-4" href="javascript:void(0)"><i class="fab fa-facebook fa-2x"></i></a>
                <a class="sc-2 mr-4" href="javascript:void(0)"><i class="fab fa-twitter fa-2x"></i></a>
                <a class="sc-3 mr-4" href="javascript:void(0)"><i class="fab fa-instagram fa-2x"></i></a>
                <a class="sc-4 mr-4" href="javascript:void(0)"><i class="fab fa-youtube fa-2x"></i></a>
            </ul>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-11">
                    <p>© {{ date('Y') }} Powered by Lokomedia.web.id.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<body>
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