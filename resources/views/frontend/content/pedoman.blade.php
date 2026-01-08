@extends('frontend.layout.main')

@section('content')

    <div class="container py-5" style="min-height: 80vh;">

        <div class="row justify-content-center">
            <div class="col-lg-10">

                {{-- Header Simple --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold text-dark">Pedoman</h2>
                        <p class="text-muted mb-0">Daftar dokumen dan panduan resmi.</p>
                    </div>

                    {{-- Search Bar --}}
                    <div style="width: 300px;">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                            <input type="text" id="searchDoc" class="form-control border-start-0 ps-0" placeholder="Cari dokumen...">
                        </div>
                    </div>
                </div>

                {{-- List Dokumen --}}
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3" width="60%">Nama Dokumen</th>
                                    <th class="py-3">Tanggal Upload</th>
                                    <th class="pe-4 py-3 text-end">Aksi</th>
                                </tr>
                                </thead>
                                <tbody id="docContainer">
                                @forelse($pedomans as $item)
                                    <tr class="doc-item">
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="me-3 text-danger" style="font-size: 1.5rem;">
                                                    <i class="fas fa-file-pdf"></i>
                                                </div>
                                                <div>
                                                    <span class="fw-bold text-dark doc-title">{{ $item->nama_file }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-muted">
                                            <small><i class="far fa-calendar me-1"></i> {{ $item->created_at->format('d M Y') }}</small>
                                        </td>
                                        <td class="pe-4 text-end">
                                            {{-- PERBAIKAN DISINI: Gunakan asset() untuk akses publik langsung --}}
                                            {{-- Asumsi path_file tersimpan seperti 'pedoman/file.pdf' --}}
                                            <a href="{{ asset('storage/pedoman_pdf/' . $item->path_file) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                                Buka <i class="fas fa-external-link-alt ms-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-5 text-muted">
                                            <i class="fas fa-folder-open mb-2 fa-2x"></i>
                                            <p class="mb-0">Belum ada dokumen pedoman.</p>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchDoc').addEventListener('keyup', function() {
            let value = this.value.toLowerCase();
            let items = document.querySelectorAll('.doc-item');

            items.forEach(function(item) {
                let text = item.querySelector('.doc-title').innerText.toLowerCase();
                if(text.indexOf(value) > -1) {
                    item.style.display = "";
                } else {
                    item.style.display = "none";
                }
            });
        });
    </script>

@endsection
