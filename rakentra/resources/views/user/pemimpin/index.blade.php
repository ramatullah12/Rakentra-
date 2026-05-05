@extends('layout.pemimpin')

@section('title', 'Manajemen User')

@section('content')

<style>
    .card-dark {
        background: rgba(255,255,255,0.05);
        border-radius: 15px;
    }

    .input-dark {
        background: #1e293b;
        border: none;
        color: #fff;
        border-radius: 10px;
    }

    .input-dark::placeholder {
        color: #94a3b8;
    }

    .table-dark-custom thead {
        background: #1e293b;
    }

    .table-dark-custom tbody tr {
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: 0.2s;
    }

    .table-dark-custom tbody tr:hover {
        background: rgba(255,255,255,0.04);
    }

    .badge-role {
        background: #334155;
        border-radius: 8px;
        padding: 5px 12px;
        font-size: 13px;
    }

    .btn-action {
        background: #facc15;
        border-radius: 8px;
    }
</style>

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold text-white">Manajemen User</h3>
        <p class="text-secondary mb-0">Kelola akses dan role pengguna sistem</p>
    </div>

    <div class="card card-dark shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('user.index') }}">
                <div class="row g-3 align-items-center">

                    <div class="col-md-4">
                        <input type="text" name="search"
                               class="form-control input-dark"
                               placeholder="Cari nama atau email..."
                               value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="role" class="form-select input-dark">
                            <option value="">Semua Role</option>
                            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="mekanik" {{ request('role') == 'mekanik' ? 'selected' : '' }}>Mekanik</option>
                        </select>
                    </div>

                    <div class="col-md-5 d-flex gap-2">
                        <button class="btn btn-primary px-4" style="border-radius:10px;">
                            <i class="bi bi-search"></i>
                        </button>

                        <a href="{{ route('user.index') }}" class="btn btn-outline-light" style="border-radius:10px;">
                            Reset
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="card card-dark shadow-sm">
        <div class="card-body p-0 table-responsive">

            <table class="table table-dark-custom align-middle mb-0 text-white">

                <thead>
                    <tr>
                        <th class="ps-4 text-secondary">No</th>
                        <th class="text-secondary">Nama</th>
                        <th class="text-secondary">Email</th>
                        <th class="text-secondary">Role</th>
                        <th class="text-center text-secondary">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $i => $u)
                    <tr>

                        <td class="ps-4">
                            {{ method_exists($data,'firstItem') ? $data->firstItem() + $i : $i+1 }}
                        </td>

                        <td class="fw-semibold">{{ $u->name }}</td>

                        <td class="text-secondary">{{ $u->email }}</td>

                        <td>
                            <span class="badge-role">
                                {{ ucfirst($u->role) }}
                            </span>
                        </td>

                        <td class="text-center">
                            <a href="{{ route('user.edit', $u->id) }}"
                               class="btn btn-sm btn-action">
                                <i class="bi bi-gear text-dark"></i>
                            </a>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-secondary">
                            Data user tidak tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

            @if(method_exists($data,'links'))
            <div class="p-3">
                {{ $data->withQueryString()->links() }}
            </div>
            @endif

        </div>
    </div>

</div>
@endsection