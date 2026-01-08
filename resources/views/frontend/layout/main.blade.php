<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LPPM STTII Yogyakarta</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <link href="{{asset('assets-fe/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets-fe/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="{{asset('assets-fe/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets-fe/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets-fe/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets-fe/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets-fe/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets-fe/assets/css/main.css')}}" rel="stylesheet">
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top"
        style="{{ !Route::is('home.index') ? 'background-color: rgba(21, 34, 43, 0.95);' : '' }}">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{route('home.index')}}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('assets/img/logo.png') }}" alt="" class="me-2" style="max-height: 50px;">

            <div class="d-flex flex-column">
                <h1 class="sitename mb-0 text-white" style="font-size: 24px; line-height: 1;">
                    <span class="fw-bold">LPPM</span> <span class="fw-light">STTII</span>
                </h1>
                <span class="text-white-50" style="font-size: 11px; letter-spacing: 3px; font-weight: 500;">
                    YOGYAKARTA
                </span>
            </div>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{route('home.index')}}" class="active">Home</a></li>
                <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a class="nav-link" href="{{ route('home.sejarah') }}">Sejarah</a></li>
                        <li><a href="{{route('home.visimisi')}}">Visi & Misi</a></li>
                        <li><a href="{{route('home.struktur')}}">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"><span>Pusat LPPM</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{route('home.penelitian')}}">Penelitian</a></li>
                        <li><a href="{{route('home.pkm')}}">Pengabdian Kepada Masyarakat</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Publikasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="https://pistis.sttii-yogyakarta.ac.id/">Jurnal Pistis: Teologi dan Praktika</a></li>
                        <li><a href="https://www.ejournal.sttii-yogyakarta.ac.id/">Jurnal Predica Verbum: Jurnal Teologi & Misi</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Dokumen</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a class="nav-link" href="{{route('home.pedoman')}}">Pedoman</a></li>
                        <li><a href="{{route('home.dokumenlainnya')}}">Dokumen Lainnya</a></li>
                    </ul>
                </li>
                {{-- UBAH DISINI: Link mengarah ke ID footer --}}
                <li><a href="#footer">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="cta-btn" href="{{route('auth.index')}}">Login</a>

    </div>
</header>

<main class="main" style="{{ !Route::is('home.index') ? 'margin-top: 100px;' : '' }}">
    @yield('content')
</main>

<footer id="footer" class="footer dark-background">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">

                <div class="col-lg-5 col-md-6 footer-about">
                    <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
                        <span class="sitename">LPPM STTII Yogyakarta</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jl. Ukrim No.23</p>
                        <p>Cupuwatu I, Purwomartani, Kalasan</p>
                        <p>Kab. Sleman, Daerah Istimewa Yogyakarta 55571</p>
                        <p class="mt-3"><strong>Telepon:</strong> <span>(0274) 496256</span></p>
                        <p><strong>Email:</strong> <span>humas@sttii-yogyakarta.ac.id</span></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Ikuti Kami</h4>
                    <p>Dapatkan informasi terbaru melalui sosial media kami.</p>
                    <div class="social-links d-flex mt-4">
                        {{-- Ganti href dengan link sosmed asli --}}
                        <a href="https://www.instagram.com/sttii.jogja/" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.youtube.com/@STTII" target="_blank"><i class="bi bi-youtube"></i></a>
                    </div>

                    <div class="mt-4">
                        <a href="https://sttii-jogjakarta.ac.id/" target="_blank" class="btn btn-outline-light btn-sm rounded-pill px-3">
                            <i class="bi bi-globe me-1"></i> Website Kampus
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">STTII Yogyakarta</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<script src="{{asset('assets-fe/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets-fe/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('assets-fe/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets-fe/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets-fe/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets-fe/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets-fe/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets-fe/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('assets-fe/assets/js/main.js')}}"></script>

</body>

</html>
