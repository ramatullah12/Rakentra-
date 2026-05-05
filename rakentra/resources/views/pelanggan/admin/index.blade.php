@extends('layout.admin')

@section('title','Data Pelanggan')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h4 class="fw-bold text-white">Data Pelanggan</h4>
        <small class="text-secondary">Kelola data pelanggan sistem</small>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4" style="background: rgba(255,255,255,0.05); border-radius:15px;">
        <div class="card-body">
            <form method="GET" action="{{ route('pelanggan.index') }}">
                <div class="row g-3 align-items-center">

                    <div class="col-md-4">
                        <input type="text" name="search"
                               class="form-control text-white"
                               style="background:#1e293b; border:none; border-radius:10px;"
                               placeholder="Cari nama pelanggan..."
                               value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="status"
                                class="form-select text-white"
                                style="background:#1e293b; border:none; border-radius:10px;">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div class="col-md-5 d-flex gap-2">
                        <button class="btn px-4"
                                style="background:#2563eb; color:#fff; border-radius:10px;">
                            <i class="bi bi-search"></i>
                        </button>

                        <a href="{{ route('pelanggan.index') }}"
                           class="btn btn-outline-light"
                           style="border-radius:10px;">
                            Reset
                        </a>

                        <a href="{{ route('pelanggan.create') }}"
                           class="btn ms-auto"
                           style="background:#22c55e; color:#fff; border-radius:10px;">
                            + Tambah
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm"
         style="background: rgba(255,255,255,0.05); border-radius:15px;">

        <div class="card-body p-0 table-responsive">

            <table class="table align-middle mb-0 text-white">

                <thead>
                    <tr style="background:#1e293b;">
                        <th class="ps-4 text-secondary">No</th>
                        <th class="text-secondary">Nama</th>
                        <th class="text-secondary">HP</th>
                        <th class="text-secondary">Alamat</th>
                        <th class="text-secondary">Status</th>
                        <th class="text-center text-secondary">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $i => $d)

                    <tr style="border-bottom:1px solid rgba(255,255,255,0.05); transition:0.2s;"
                        onmouseover="this.style.background='#1e293b'"
                        onmouseout="this.style.background='transparent'">

                        <td class="ps-4">
                            {{ method_exists($data,'firstItem') ? $data->firstItem() + $i : $i+1 }}
                        </td>

                        <td class="fw-semibold">{{ $d->nama }}</td>

                        <td class="text-secondary">{{ $d->hp }}</td>

                        <td class="text-secondary">{{ $d->alamat }}</td>

                        <td>
                            @if($d->status == 'aktif')
                                <span style="background:#16a34a; padding:5px 12px; border-radius:8px; font-size:12px;">
                                    Aktif
                                </span>
                            @else
                                <span style="background:#ef4444; padding:5px 12px; border-radius:8px; font-size:12px;">
                                    Nonaktif
                                </span>
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('pelanggan.edit', $d->id) }}"
                                   style="width:38px;height:38px;
                                          display:flex;align-items:center;justify-content:center;
                                          background:#2563eb;color:#fff;
                                          border-radius:8px;text-decoration:none;">
                                    <i class="bi bi-pencil"></i>
                                </a>

                            </div>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-secondary py-4">
                            Data tidak ditemukan
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="p-3">
                {{ $data->withQueryString()->links() }}
            </div>

        </div>
    </div>

</div>

@endsection