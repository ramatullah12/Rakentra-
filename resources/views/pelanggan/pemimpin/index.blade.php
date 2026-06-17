@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Data Pelanggan</h3>

    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('pelanggan.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama pelanggan..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-control">
                            <option value="">-- Semua Status --</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-primary">Filter</button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>HP</th>
                        <th>Alamat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $i => $d)
                    <tr>
                        <td>{{ $data->firstItem() + $i }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->hp }}</td>
                        <td>{{ $d->alamat }}</td>
                        <td>
                            <span class="badge bg-{{ $d->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($d->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $data->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection