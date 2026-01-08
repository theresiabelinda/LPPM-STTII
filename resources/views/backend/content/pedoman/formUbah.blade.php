@extends('backend.layout.main')

@section('content')
    <div class="card">
        <div class="card-header"><h4>Ubah Pedoman</h4></div>
        <div class="card-body">
            <form action="{{ route('pedoman.prosesUbah') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $pedoman->id }}">
                <div class="form-group mb-3">
                    <label>Nama Dokumen/File</label>
                    <input type="text" name="nama_file" class="form-control" value="{{ $pedoman->nama_file }}" required>
                </div>
                <div class="form-group mb-3">
                    <label>File PDF (Kosongkan jika tidak ingin mengubah file)</label>
                    <input type="file" name="file_pdf" class="form-control" accept=".pdf">
                    <small class="text-muted">File saat ini: <a href="{{ route('storage.pedoman_view', $pedoman->path_file) }}" target="_blank">Lihat</a></small>
                </div>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('pedoman.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
