@extends('backend.layout.main')

@section('content')
    <div class="container-fluid mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Laporan Kegiatan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('laporan_kegiatan.prosesTambah') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Nama Ketua</label>
                        <input type="text" name="nama_ketua" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Nama Dosen</label>
                        <select name="id_dosen" class="form-control" required>
                            <option value="">-- Pilih Dosen --</option>
                            @foreach($dosen as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_dosen }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tema Kegiatan</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Kategori Kegiatan</label>
                        <select name="id_kategori_kegiatan" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->id_kategori_kegiatan }}">{{ $kat->nama_kategori_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ date('Y') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Upload File PDF</label>
                        <input type="file" name="file_pdf" class="form-control" accept=".pdf" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('laporan_kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
