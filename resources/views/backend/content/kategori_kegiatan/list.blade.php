@extends('backend.layout.main')

@section('content')
    <div class="container-fluid mt-4">

        <div class="row mb-3">
            <div class="col-lg-6">
                <h1 class="h3 text-gray-800">Kategori Kegiatan</h1>
            </div>

            <div class="col-lg-6 text-right">
                <a href="{{ route('kategori_kegiatan.tambah') }}"
                   class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>Tambah
                </a>
            </div>
        </div>

        @if(session()->has('pesan'))
            <div class="alert alert-{{session()->get('pesan')[0]}}">
                {{session()->get('pesan')[1]}}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered table-striped" id="dataTable" width="100%">
                        <thead class="thead-dark">
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Kategori Kegiatan</th>
                            <th width="200">Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        @php $no = 1; @endphp
                        @foreach($kategori_kegiatan as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama_kategori_kegiatan }}</td>
                                <td>
                                    <a href="{{ route('kategori_kegiatan.ubah', $row->id_kategori_kegiatan) }}"
                                       class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i> Ubah
                                    </a>

                                    <a href="{{ route('kategori_kegiatan.hapus', $row->id_kategori_kegiatan) }}"
                                       onclick="return confirm('Anda yakin menghapus?')"
                                       class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
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
