@extends('frontend.layout.main')

@section('content')

    <section class="breadcrumbs" style="background: #f3f5fa; padding: 20px 0;">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li> <li class="breadcrumb-item active">Detail Berita</li>
            </ol>
            <h2 class="mt-2">{{ $berita->judul_berita }}</h2>
        </div>
    </section>

    <section class="inner-page section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card shadow-sm border-0">
                        <img src="{{ asset('storage/berita/' . $berita->gambar_berita) }}"
                             class="card-img-top"
                             alt="{{ $berita->judul_berita }}"
                             style="max-height: 500px; object-fit: cover;">

                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-4 text-muted">
                                <div class="me-4">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ optional($berita->created_at)->format('d M Y') ?? '-' }}
                                </div>
                                <div>
                                    <i class="bi bi-tag me-1"></i>
                                    <span class="badge bg-primary">
                                    {{ $berita->kategori_kegiatan->nama_kategori_kegiatan ?? 'Umum' }}
                                </span>
                                </div>
                            </div>

                            <div class="content-body" style="line-height: 1.8; font-size: 1.1rem; color: #444;">
                                {!! $berita->isi_berita !!}
                            </div>
                        </div>

                        <div class="card-footer bg-white p-3">
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
