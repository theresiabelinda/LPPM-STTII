@extends('frontend.layout.main')

@section('content')

    <div class="breadcrumbs" style="background-color: #f4f4f4; padding: 40px 0;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold">Struktur Organisasi</h2>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Struktur Organisasi</li>
                </ol>
            </div>
        </div>
    </div>

    <section id="struktur" class="struktur py-5">
        <div class="container" data-aos="fade-up">

            <div class="row gy-5">

                <div class="col-lg-8">
                    <div class="sticky-top" style="top: 20px; z-index: 1;">
                        <h3 class="fw-bold mb-4">Bagan Struktur</h3>
                        <img src="{{ asset('assets-fe/assets/img/foto-struktur.png') }}" class="img-fluid rounded shadow w-100" alt="Struktur Organisasi STTII">
                    </div>
                </div>

                <div class="col-lg-4">
                    <h3 class="fw-bold mb-4">Tim Penyelenggara</h3>

                    <div class="row gy-4">

                        <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="member d-flex align-items-center bg-white p-3 rounded shadow-sm border">
                                {{-- FOTO DIPERBESAR: width: 110px; height: 110px; dan jarak me-4 --}}
                                <div class="pic team-img-wrapper me-4" style="width: 110px; height: 110px; flex-shrink: 0; overflow: hidden; border-radius: 50%;">
                                    <img src="{{asset('assets-fe/assets/img/team/foto-anon.jpeg')}}" class="img-fluid w-100 h-100 object-fit-cover" alt="Anon Dwi Saputro">
                                </div>
                                <div class="member-info">
                                    {{-- Font diperbesar sedikit --}}
                                    <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Anon Dwi Saputro, M.Th</h5>
                                    <span class="text-muted" style="font-size: 0.9rem;">Ketua LPPM STTII Yogyakarta</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                            <div class="member d-flex align-items-center bg-white p-3 rounded shadow-sm border">
                                {{-- FOTO DIPERBESAR: width: 110px; height: 110px; dan jarak me-4 --}}
                                <div class="pic team-img-wrapper me-4" style="width: 110px; height: 110px; flex-shrink: 0; overflow: hidden; border-radius: 50%;">
                                    <img src="{{asset('assets-fe/assets/img/team/foto-riston.jpg')}}" class="img-fluid w-100 h-100 object-fit-cover" alt="Riston Batuara">
                                </div>
                                <div class="member-info">
                                    {{-- Font diperbesar sedikit --}}
                                    <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Riston Batuara, S.Pd., M.Th</h5>
                                    <span class="text-muted" style="font-size: 0.9rem;">KA Bidang Pengabdian Kepada Masyarakat</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                            <div class="member d-flex align-items-center bg-white p-3 rounded shadow-sm border">
                                {{-- FOTO DIPERBESAR: width: 110px; height: 110px; dan jarak me-4 --}}
                                <div class="pic team-img-wrapper me-4" style="width: 110px; height: 110px; flex-shrink: 0; overflow: hidden; border-radius: 50%;">
                                    <img src="{{asset('assets-fe/assets/img/team/foto-farel.jpg')}}" class="img-fluid w-100 h-100 object-fit-cover" alt="Farel Yosua Sualang">
                                </div>
                                <div class="member-info">
                                    {{-- Font diperbesar sedikit --}}
                                    <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Dr. Farel Yosua Sualang, M.Th</h5>
                                    <span class="text-muted" style="font-size: 0.9rem;">KA Bidang Penelitian, Publikasi dan Sistem Informasi</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
