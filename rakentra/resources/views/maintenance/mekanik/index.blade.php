@extends('layout.mekanik')

@section('title', 'Data Maintenance')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Data Maintenance
            </h2>

            <p class="text-secondary mb-0">
                Monitoring dan pengelolaan maintenance alat berat
            </p>

        </div>

        <a href="{{ route('maintenance.create') }}"
           class="btn px-4 py-2"
           style="background:#2563eb;
                  color:white;
                  border:none;
                  border-radius:12px;
                  font-weight:600;">

            <i class="bi bi-plus-circle me-2"></i>
            Tambah Maintenance

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm"
             style="border-radius:14px;">

            {{ session('success') }}

        </div>

    @endif

    <div class="row mb-4">

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <h6 class="text-secondary">
                        Total Maintenance
                    </h6>

                    <h2 class="fw-bold text-white">

                        {{ $maintenances->count() }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <h6 class="text-secondary">
                        Diproses
                    </h6>

                    <h2 class="fw-bold text-warning">

                        {{ $maintenances->where('status','diproses')->count() }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <h6 class="text-secondary">
                        Selesai
                    </h6>

                    <h2 class="fw-bold text-success">

                        {{ $maintenances->where('status','selesai')->count() }}

                    </h2>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('maintenance.mekanik') }}"
                  method="GET">

                <div class="row g-3">

                    <div class="col-md-8">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari nama alat..."
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:12px;
                                      height:55px;">

                    </div>

                    <div class="col-md-4 d-flex gap-2">

                        <button type="submit"
                                class="btn"
                                style="background:#2563eb;
                                       color:white;
                                       border:none;
                                       border-radius:12px;
                                       width:70px;">

                            <i class="bi bi-search"></i>

                        </button>

                        <a href="{{ route('maintenance.mekanik') }}"
                           class="btn btn-outline-light"
                           style="border-radius:12px;">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="card border-0 shadow-sm"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-0 table-responsive">

            <table class="table align-middle mb-0">

                <thead>

                    <tr style="background:#1e293b;">

                        <th class="text-secondary border-0 py-4 ps-4">
                            No
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Nama Alat
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Jenis Maintenance
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Tanggal
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Biaya
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Status
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Foto
                        </th>

                        <th class="text-secondary border-0 py-4 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($maintenances as $i => $maintenance)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">

                                {{ $maintenances->firstItem() + $i }}

                            </td>

                            <td class="text-white fw-semibold py-4">

                                {{ $maintenance->alat->nama_alat }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $maintenance->jenis_maintenance }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $maintenance->tanggal_maintenance }}

                            </td>

                            <td class="text-success fw-bold py-4">

                                Rp {{ number_format($maintenance->biaya,0,',','.') }}

                            </td>

                            <td class="py-4">

                                @if($maintenance->status == 'pending')

                                    <span style="background:#dc2626;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Pending

                                    </span>

                                @elseif($maintenance->status == 'diproses')

                                    <span style="background:#f59e0b;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Diproses

                                    </span>

                                @else

                                    <span style="background:#16a34a;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Selesai

                                    </span>

                                @endif

                            </td>

                            <td class="py-4">

                                @if($maintenance->foto_perbaikan)

                                    <a href="{{ $maintenance->foto_perbaikan }}"
                                       target="_blank">

                                        <img src="{{ $maintenance->foto_perbaikan }}"
                                             width="70"
                                             height="70"
                                             style="object-fit:cover;
                                                    border-radius:12px;">

                                    </a>

                                @else

                                    <span class="text-secondary">

                                        Tidak ada

                                    </span>

                                @endif

                            </td>

                            <td class="py-4 text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('maintenance.edit', $maintenance->id) }}"
                                       class="btn btn-sm"
                                       style="background:#f59e0b;
                                              color:white;
                                              border:none;
                                              border-radius:10px;">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="text-center text-secondary py-5">

                                Data maintenance tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $maintenances->withQueryString()->links() }}

    </div>

</div>

@endsection