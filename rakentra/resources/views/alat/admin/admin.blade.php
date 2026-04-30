@extends('layout.admin')

@section('title','Data Alat')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="mb-0">Data Alat Berat</h4>
            <small class="text-muted">Manajemen alat berat</small>
        </div>


        <a href="{{ route('alat.create') }}" class="btn btn-dark">
            <i class="bi bi-plus-lg"></i> Tambah
        </a>
    </div>

    <!-- ALERT -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- TABLE -->
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Lokasi</th>
                            <th>HM</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($alats as $alat)
                        <tr>
                            <td class="fw-semibold">{{ $alat->nama_alat }}</td>
                            <td>{{ $alat->kode_alat }}</td>
                            <td>{{ $alat->lokasi }}</td>
                            <td>{{ $alat->hour_meter }}</td>

                            <td>
                                @if($alat->status == 'tersedia')
                                    <span class="badge bg-success">Tersedia</span>
                                @elseif($alat->status == 'disewa')
                                    <span class="badge bg-warning text-dark">Disewa</span>
                                @else
                                    <span class="badge bg-danger">Maintenance</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    <!-- ✅ FIX: edit pakai halaman -->
                                    <a href="{{ route('alat.edit',$alat->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('alat.delete',$alat->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin hapus data?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Data belum tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection