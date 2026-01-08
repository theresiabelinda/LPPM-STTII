@extends('frontend.layout.main')

@section('content')

    <div class="page-title position-relative" style="background-color: #eef5ff; padding: 60px 0;">
        <div class="container d-lg-flex justify-content-between align-items-center">

            <div class="" data-aos="fade-right">

                <h1 class="fw-bold display-5" style="color: #0a2a43 !important; opacity: 1 !important;">
                    Pengabdian Kepada Masyarakat
                </h1>

                <p class="mb-0" style="color: #555555 !important; opacity: 1 !important;">
                    Arsip berita, jurnal, dan kegiatan pengabdian kepada masyarakat LPPM STTII.
                </p>
            </div>

            <div class="mt-3 mt-lg-0" data-aos="fade-left">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">PKM</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    {{-- 2. Daftar Berita Section --}}
    <section id="blog-posts" class="blog-posts section py-5">
        <div class="container">

            <div class="row gy-4">

                {{-- LOOPING DATA (Pastikan controller mengirim variabel $berita) --}}
                @forelse($berita as $item)
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                        <div class="card h-100 border-0 shadow-sm hover-card overflow-hidden">

                            {{-- Gambar Berita --}}
                            <div class="card-img-top position-relative overflow-hidden" style="height: 240px;">
                                <img src="{{ asset('storage/berita/' . $item->gambar_berita) }}"
                                     class="img-fluid w-100 h-100 object-fit-cover transition-scale"
                                     alt="{{ $item->judul_berita }}">

                                {{-- Badge Kategori (Pojok Kiri Atas Gambar) --}}
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-primary rounded-pill px-3 py-2 shadow-sm">
                                        <i class="bi bi-journal-text me-1"></i> Pengabdian Kepada Masyarakat
                                    </span>
                                </div>
                            </div>

                            <div class="card-body p-4 d-flex flex-col flex-column">

                                {{-- Judul --}}
                                <h4 class="card-title fw-bold mb-3">
                                    <a href="{{ route('berita.detail', $item->id_berita) }}" class="text-dark text-decoration-none stretched-link title-hover">
                                        {{ Str::limit($item->judul_berita, 60) }}
                                    </a>
                                </h4>

                                {{-- Excerpt / Ringkasan --}}
                                <p class="card-text text-muted mb-4 flex-grow-1">
                                    {{ Str::limit(strip_tags($item->isi_berita), 120) }}
                                </p>

                                {{-- Footer Card --}}
                                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                    <span class="text-primary fw-bold small">
                                        Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    {{-- Tampilan Kosong --}}
                    <div class="col-12 text-center py-5">
                        <div class="empty-state">
                            <i class="bi bi-search display-1 text-muted opacity-25"></i>
                            <h4 class="mt-3 text-muted">Belum ada artikel PKM ditemukan.</h4>
                            <a href="{{route('home.index')}}" class="btn btn-outline-primary mt-3 rounded-pill">Kembali ke Beranda</a>
                        </div>
                    </div>
                @endforelse

            </div>

            {{-- Pagination (Jika ada) --}}
            <div class="row mt-5" data-aos="fade-up">
                <div class="col-12 d-flex justify-content-center">
                    {{-- {{ $berita->links() }} --}}
                    {{-- Uncomment baris di atas jika menggunakan pagination Laravel --}}
                </div>
            </div>

        </div>
    </section>

    {{-- CSS Tambahan (Bisa ditaruh di file .css kamu) --}}
    <style>
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        }
        .transition-scale {
            transition: transform 0.5s ease;
        }
        .hover-card:hover .transition-scale {
            transform: scale(1.05);
        }
        .title-hover:hover {
            color: #0d6efd !important; /* Warna Primary Bootstrap */
        }
        .object-fit-cover {
            object-fit: cover;
        }
    </style>

@endsection
