@extends('frontend.layout.main')

@section('content')

    <div class="breadcrumbs" style="background-color: #f4f4f4; padding: 40px 0;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold">Sejarah Kami</h2>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Sejarah</li>
                </ol>
            </div>
        </div>
    </div>

    <section id="sejarah" class="sejarah py-5">
        <div class="container" data-aos="fade-up">

            <div class="row content">
                <div class="col-lg-6">
                    <img src="{{ asset('assets-fe/assets/img/sttii-foto.jpg') }}" class="img-fluid rounded shadow" alt="Gedung Lama STTII">
                </div>

                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h3 class="mb-3">Sejarah Berdirinya LPPM</h3>
                    <h4 class="mb-2">Sekolah Tinggi Teologi Injili Indonesia Yogyakarta</h4>
                    <p class="fst-italic text-muted">
                        Perguruan Tinggi dan Tridharma merupakan suatu kesatuan yang tidak dapat terpisahkan.
                    </p>

                    <p>
                        Suatu perguruan tinggi dianggap memiliki kualitas akademik yang baik
                        apabila dapat melaksanakan Tridharma perguruan tinggi yakni pengajaran, penelitian
                        dan PkM kepada masyarakat secara utuh dan berkelanjutan.

                        Ketiga aktivitas pendidikan ini merupakan kewajiban perguruan tinggi sesuai dengan Undang-undang
                        Nomor 12 Tahun 2012. Hal ini memperlihatkan bahwa kegiatan penelitian memiliki
                        peranan yang sangat penting dalam menopang pengembangan dan kemajuan ilmu
                        pengetahuan serta teknologi yang difasilitasi oleh perguruan tinggi.
                    </p>

                    <p>
                        Kemajuan ilmu pengetahuan dan teknologi memerlukan pengembangan yang
                        komprehensif. Kesuksesan pengembangan ilmu pengetahuan dan teknologi di
                        perguruan tinggi memiliki keterkaitan erat dengan strategi perencanaan. Merespon
                        upaya pencapaian kualitas tersebut maka STTII Yogyakarta merumuskan rencana
                        strategis penelitian dan PkM tahun 2021-2025.
                    </p>

                </div>
            </div>

        </div>
    </section>

@endsection
