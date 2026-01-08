@extends('backend.layout.main')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Data Buku Pedoman</h4>
            <a href="{{ route('pedoman.tambah') }}" class="btn btn-primary">Tambah Pedoman</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama File</th>
                    <th>Lihat PDF</th>
                    <th width="15%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama_file }}</td>
                        <td>
                            <a href="{{ route('storage.pedoman_view', $item->path_file) }}" target="_blank" class="btn btn-sm btn-info text-white">
                                <i class="fas fa-eye"></i> Lihat PDF
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('pedoman.ubah', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('pedoman.hapus', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
