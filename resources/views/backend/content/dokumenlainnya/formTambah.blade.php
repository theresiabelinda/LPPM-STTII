@extends('backend.layout.main')

@section('content')
    <div class="card">
        <div class="card-header"><h4>Tambah Dokumen Lainnya</h4></div>
        <div class="card-body">
            <form action="{{ route('dokumenlainnya.prosesTambah') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label>Nama Dokumen/File</label>
                    <input type="text" name="nama_file" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>File PDF</label>
                    <input type="file" name="file_pdf" class="form-control" accept=".pdf" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('dokumenlainnya.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
