@extends('backend.layout.main')

@section('content')
    <div class="container-fluid mt-4">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Laporan Kegiatan</h1>
            <a href="{{ route('laporan_kegiatan.tambah') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Laporan
            </a>
        </div>

        @if(session()->has('pesan'))
            <div class="alert alert-{{session()->get('pesan')[0]}}">
                {{session()->get('pesan')[1]}}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Ketua</th>
                            <th>Dosen Pendamping</th>
                            <th>Tema</th>
                            <th>Kategori</th>
                            <th>Tahun</th>
                            <th>Lokasi</th>
                            <th>File</th>
                            <th width="1%" style="white-space: nowrap;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($laporan as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->nama_ketua }}</td>

                                <td>{{ $row->dosen->nama_dosen ?? 'Data Dosen Hilang' }}</td>
                                <td>{{ $row->judul }}</td>
                                <td>{{ $row->kategori_kegiatan->nama_kategori_kegiatan ?? '-' }}</td>
                                <td>{{ $row->tahun }}</td>
                                <td>{{ $row->lokasi }}</td>

                                <td class="text-center">
                                    <a href="{{ asset('storage/laporan_pdf/'.$row->file_pdf) }}" target="_blank" class="btn btn-sm btn-info" title="Lihat PDF">
                                        <i class="fa fa-file-pdf"></i> Lihat
                                    </a>
                                </td>

                                <td class="text-center" style="white-space: nowrap;">
                                    <a href="{{ route('laporan_kegiatan.ubah', $row->id_laporan) }}" class="btn btn-sm btn-warning" title="Ubah">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{ route('laporan_kegiatan.hapus', $row->id_laporan) }}"
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                       class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
