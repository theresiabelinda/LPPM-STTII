@extends('frontend.layout.main')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    <img src="{{asset('assets-fe/assets/img/sttii-foto.jpg')}}" alt="" data-aos="fade-in">

    <div class="container d-flex justify-content-center align-items-center h-100" style="min-height: 80vh;">

        <div class="text-center position-relative">

            <div class="mb-4">
                <img src="{{ asset('assets/img/logo.png') }}"
                     alt="Logo STTII"
                     style="width: 150px; height: auto; display: block; margin: 0 auto; position: relative !important; z-index: 10;"
                     data-aos="zoom-in">
            </div>

            <div class="text-content">
                <h2 data-aos="fade-up" data-aos-delay="200" class="mb-3 text-white fw-bold display-4">
                    LPPM STTII Yogyakarta
                </h2>
                <p data-aos="fade-up" data-aos-delay="300" class="lead text-white">
                    Lembaga Penelitian dan Pengabdian Kepada Masyarakat
                </p>

            </div>

        </div>
    </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container">

        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3>Selamat datang di LPPM STTII Yogyakarta</h3>
                <img src="assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
                <p>Selamat datang di website resmi Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) Sekolah Tinggi Teologi Injili Indonesia Yogyakarta. Portal ini hadir sebagai wujud komitmen kami dalam meningkatkan mutu dan transparansi pelaksanaan Tri Dharma Perguruan Tinggi.
                    Melalui website ini, kami memfasilitasi civitas akademika, baik dosen maupun mahasiswa, untuk mengakses informasi terkini, mengelola pelaporan kegiatan, serta mempublikasikan hasil penelitian dan pengabdian secara digital.</p>
                <p>Kami berharap platform ini dapat menjadi pusat data yang integratif yang tidak hanya mempermudah administrasi, tetapi juga mendorong terciptanya karya-karya teologis yang berdampak positif bagi gereja dan masyarakat luas.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <div class="position-relative mt-4">
                        <img src="{{asset('assets-fe/assets/img/foto_selamatdatang.jpeg')}}" class="img-fluid rounded-4" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->

<!-- Services Section -->
<section id="services" class="services section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <section id="services" class="services section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Berita Terkini</h2>
                <p>Kabar & Kegiatan Terbaru<br></p>
            </div><div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-5">

                    {{-- LOOPING DATA BERITA --}}
                    @forelse($berita as $item)
                        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ 100 + ($loop->iteration * 100) }}">
                            <div class="service-item">
                                <div class="img">
                                    {{-- GAMBAR BERITA --}}
                                    {{-- object-fit: cover agar gambar rapi tidak gepeng --}}
                                    <img src="{{ asset('storage/berita/' . $item->gambar_berita) }}"
                                         class="img-fluid"
                                         alt="{{ $item->judul_berita }}"
                                         style="width: 100%; height: 250px; object-fit: cover;">
                                </div>
                                <div class="details position-relative">
                                    <div class="icon">
                                        <i class="bi bi-newspaper"></i> </div>

                                    {{-- JUDUL BERITA --}}
                                    <a href="{{ route('berita.detail', $item->id_berita) }}" class="stretched-link">
                                        <h3>{{ $item->judul_berita }}</h3>
                                    </a>

                                    {{-- KATEGORI & TANGGAL (Opsional, tambahan info) --}}
                                    <div class="mb-2 text-muted" style="font-size: 0.85rem;">
                                        <span class="badge bg-primary">{{ $item->kategori_kegiatan->nama_kategori_kegiatan ?? 'Umum' }}</span>
                                    </div>

                                    {{-- ISI BERITA SINGKAT --}}
                                    <p>
                                        {{ Str::limit(strip_tags($item->isi_berita), 100) }}
                                    </p>
                                </div>
                            </div>
                        </div>@empty
                        {{-- TAMPILAN JIKA DATA KOSONG --}}
                        <div class="col-12 text-center">
                            <div class="alert alert-warning">Belum ada berita yang dipublikasikan.</div>
                        </div>
                    @endforelse

                </div>

            </div>

        </section>
    </div>

</section><!-- /Services Section -->

@endsection
