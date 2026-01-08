@extends('backend.layout.main')

@section('content')
    <div class="container-fluid mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Laporan Kegiatan</h6>
            </div>
            <div class="card-body">
                {{-- Asumsi variabel data yang dikirim dari controller bernama $laporan --}}
                <form action="{{ route('laporan_kegiatan.prosesUbah', $laporan->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Nama Ketua</label>
                        <input type="text" name="nama_ketua" class="form-control" value="{{ $laporan->nama_ketua }}" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <select name="id_dosen" class="form-control" required>
                            <option value="">-- Pilih Dosen --</option>
                            @foreach($dosen as $row)
                                <option value="{{ $row->id }}" {{ $laporan->id_dosen == $row->id ? 'selected' : '' }}>
                                    {{ $row->nama_dosen }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tema Kegiatan</label>
                        <input type="text" name="judul" class="form-control" value="{{ $laporan->judul }}" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori Kegiatan</label>
                        <select name="id_kategori_kegiatan" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->id_kategori_kegiatan }}" {{ $laporan->id_kategori_kegiatan == $kat->id_kategori_kegiatan ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori_kegiatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ $laporan->tahun }}" required>
                    </div>

                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="{{ $laporan->lokasi }}" required>
                    </div>

                    <div class="form-group">
                        <label>Upload File PDF</label>
                        {{-- Hapus 'required' agar user tidak wajib upload ulang jika file tidak berubah --}}
                        <input type="file" name="file_pdf" class="form-control" accept=".pdf">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah file PDF.</small>

                        {{-- Opsional: Menampilkan link file lama jika ada --}}
                        @if($laporan->file_pdf)
                            <div class="mt-2">
                                <small>File saat ini: <a href="{{ asset('storage/laporan_pdf/' . $laporan->file_pdf) }}" target="_blank">Lihat PDF</a></small>
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('laporan_kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
