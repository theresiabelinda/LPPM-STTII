@extends('frontend.layout.main')

@section('content')

    <style>
        .mission-card {
            transition: all 0.3s ease-in-out;
            border: none;
            border-radius: 15px;
            background: #fff;
        }

        .mission-card:hover {
            transform: translateY(-10px); /* Naik ke atas 10px */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .icon-box {
            width: 60px;
            height: 60px;
            background: #eef7ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .mission-card:hover .icon-box {
            background: #ff5821; /* Warna oranye khas template Dewi */
            color: #fff;
        }

        .icon-box i {
            font-size: 28px;
            color: #ff5821;
        }

        .mission-card:hover .icon-box i {
            color: #fff;
        }

        /* Visi Section Highlight */
        .visi-highlight {
            border-left: 5px solid #ff5821;
            padding-left: 20px;
        }
    </style>

    <div class="breadcrumbs" style="background-color: #f8f9fa; padding: 40px 0;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold text-dark">Visi & Misi</h2>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Visi & Misi</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="zoom-in" data-aos-duration="1000">

                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="card-body p-5 text-center bg-white">
                            <span class="badge bg-primary px-3 py-2 mb-3 rounded-pill">VISI KAMI</span>
                            <h2 class="display-6 fw-bold mb-4">
                                "Menjadi lembaga pemberdaya dan pengembang bagi civitas akademika
                                STTII Yogyakarta dalam penelitian dan PkM, yang kreatif dan berintegritas berdasarkan
                                nilai-nilai Kristus."
                            </h2>
                            <p class="text-muted lead">
                                Kami berkomitmen untuk mengembangkan ilmu teologi yang relevan dengan tantangan zaman tanpa meninggalkan akar kebenaran Firman Tuhan.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h6 class="text-primary fw-bold text-uppercase ls-md">Misi Kami</h6>
                <h2 class="fw-bold">Langkah Nyata LPPM STTII</h2>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card mission-card h-100 p-4 shadow-sm">
                        <div class="card-body text-center">
                            <div class="icon-box mx-auto">
                                <i class="bi bi-journal-bookmark-fill"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Pusat Penelitian</h4>
                            <p class="text-muted">
                                Mewadahi kegiatan penelitian internal dan eksternal bagi civitas akademika STTII
                                Yogyakarta.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card mission-card h-100 p-4 shadow-sm">
                        <div class="card-body text-center">
                            <div class="icon-box mx-auto">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Mobilisasi Pelayanan</h4>
                            <p class="text-muted">
                                Mengkoordinir dan memotivasi kegiatan pengabdian kepada masyarakat bagi civitas
                                akademika STTII Yogyakarta.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card mission-card h-100 p-4 shadow-sm">
                        <div class="card-body text-center">
                            <div class="icon-box mx-auto">
                                <i class="bi bi-globe"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Peningkatan Mutu</h4>
                            <p class="text-muted">
                                Meningkatkan kualitas civitas akademika STTII Yogyakarta dalam penelitian dan PkM.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card mission-card h-100 p-4 shadow-sm">
                        <div class="card-body text-center">
                            <div class="icon-box mx-auto">
                                <i class="bi bi-diagram-3-fill"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Kolaborasi Multidisiplin</h4>
                            <p class="text-muted">
                                Memberdayakan dan membantu masyarakat dalam menghadapi permasalahan
                                masyarakat terkini dalam isu strategis nasional dengan kerjasama multidisiplin.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="fw-bold mb-4 visi-highlight">Tujuan Strategis</h3>
                    <p class="mb-4">
                        Berikut adalah sasaran jangka panjang yang ingin dicapai oleh LPPM STTII Yogyakarta:
                    </p>

                    <div class="accordion shadow-sm" id="accordionTujuan">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    1. Peningkatan Mutu Riset
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionTujuan">
                                <div class="accordion-body">
                                    Terselenggaranya kegiatan penelitian internal dan eksternal oleh civitas
                                    akademika STTII Yogyakarta
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    2. Pelaksanaan PkM
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionTujuan">
                                <div class="accordion-body">
                                    Terselenggaranya kegiatan pengabdian kepada masyarakat oleh civitas
                                    akademika STTII Yogyakarta.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    3. Pengembangan Kompetensi
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionTujuan">
                                <div class="accordion-body">
                                    Terwujudnya peningkatan kualitas civitas akademika STTII Yogyakarta.
                                    dalam penelitian dan PkM.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    4. Kolaborasi Pemberdayaan
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionTujuan">
                                <div class="accordion-body">
                                    Terlaksananya kerjasama multidisiplin dalam memberdayakan dan membantu
                                    masyarakat untuk menghadapi permasalahan masyarakat, melalui penelitian dan
                                    pengabdian kepada masyarakat.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="{{ asset('assets-fe/assets/img/foto-visimisi.jpeg') }}" class="img-fluid rounded-4 shadow" alt="Tujuan Strategis">
                </div>
            </div>
        </div>
    </section>

@endsection
