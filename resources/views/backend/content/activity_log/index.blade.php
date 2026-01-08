@extends('backend/layout/main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Activity Log</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Riwayat Aktivitas Anda</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-history me-1"></i>
                Data Log Aktivitas
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                    <tr>
                        <th>Waktu</th>
                        <th>Deskripsi Aktivitas</th>
                        <th>Detail (Subject)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>{{ $log->created_at->format('d M Y, H:i') }}</td>

                            <td>{{ $log->description }}</td>

                            <td>
                                @if($log->subject_type)
                                    <span class="badge bg-secondary">{{ class_basename($log->subject_type) }} #{{ $log->subject_id }}</span>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada aktivitas tercatat.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-end">
                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
