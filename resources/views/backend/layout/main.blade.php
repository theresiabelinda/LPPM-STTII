<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 d-flex align-items-center" href="{{route('dashboard.index')}}">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo STTII" height="35" class="me-2">

        <div class="d-flex flex-column lh-1">
            <span class="fw-bold">LPPM STTII</span>
            <small style="font-size: 0.8rem; opacity: 0.8;">Yogyakarta</small>
        </div>
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('activity_log.index') }}">
                        Activity Log
                    </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{route('auth.logout')}}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{route('dashboard.index')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Interface</div>

                    <!-- BUKAN DROPDOWN -->
                    <a class="nav-link" href="{{ route('kategori_kegiatan.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Kategori Kegiatan
                    </a>

                    <!-- BUKAN DROPDOWN -->
                    <a class="nav-link" href="{{ route('berita.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Tampilan Berita
                    </a>

{{--                    <!-- BUKAN DROPDOWN -->--}}
{{--                    <a class="nav-link" href="{{route('laporan_kegiatan.index')}}">--}}
{{--                        <div class="sb-nav-link-icon"><i class="fas fa-cloud-upload-alt"></i></div>--}}
{{--                        Upload Laporan Kegiatan--}}
{{--                    </a>--}}

                    <!-- DROPDOWN KHUSUS -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                       data-bs-target="#collapseAnggaran" aria-expanded="false"
                       aria-controls="collapseAnggaran">
                        <div class="sb-nav-link-icon"><i class="fas fa-file-pdf"></i></div>
                        Dokumen
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse" id="collapseAnggaran" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('pedoman.index')}}">
                                Pedoman
                            </a>
                            <a class="nav-link" href="{{route('dokumenlainnya.index')}}">
                                Dokumen Lainnya
                            </a>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Admin
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/datatables-simple-demo.js')}}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch( error => {
            console.error( error );
        });
</script>

<script>
    function tampilkanPreview(gambar, idPreview){
        var gb = gambar.files;
        for(var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idPreview);
            var reader = new FileReader();
            if(gbPreview.type.match(imageType)) {
                preview.file = gbPreview;
                reader.onload = (function (element){
                    return function (e){
                        element.src = e.target.result;
                    };
                })(preview);
                reader.readAsDataURL(gbPreview);
            } else {
                alert("Type file tidak sesuai hanya khusus image.");
            }
        }
    }
</script>

</body>
</html>
