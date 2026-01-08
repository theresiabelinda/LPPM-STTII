@extends('backend/layout/main')
@section('content')
    <div class="container-fluid mt-4">
        <h1 class="h3 mb-2 text-gray-800">Form Tambah Kategori</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('kategori_kegiatan.prosesTambah')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori_kegiatan" value="{{old('nama_kategori_kegiatan')}}" class="form-control @error('nama_kategori_kegiatan') is-invalid @enderror">
                        @error('nama_kategori_kegiatan')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{route('kategori_kegiatan.index')}}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
