@extends('layout.admin')

@section('title', 'Material Request')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Material Request
            </h2>

            <p class="text-secondary mb-0">
                Monitoring pengajuan sparepart dan material maintenance
            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm"
             style="border-radius:14px;">

            {{ session('success') }}

        </div>

    @endif

    <div class="row mb-4">

        <div class="col-md-3 mb-3">

            <div class="card border-0 shadow-sm h-100"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-secondary">
                                Total Request
                            </h6>

                            <h2 class="fw-bold text-white">

                                {{ $materials->total() }}

                            </h2>

                        </div>

                        <div style="width:55px;
                                    height:55px;
                                    background:rgba(37,99,235,0.15);
                                    border-radius:15px;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;">

                            <i class="bi bi-box-seam text-primary fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card border-0 shadow-sm h-100"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-secondary">
                                Pending
                            </h6>

                            <h2 class="fw-bold text-danger">

                                {{ $materials->where('status','pending')->count() }}

                            </h2>

                        </div>

                        <div style="width:55px;
                                    height:55px;
                                    background:rgba(220,38,38,0.15);
                                    border-radius:15px;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;">

                            <i class="bi bi-clock-history text-danger fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card border-0 shadow-sm h-100"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-secondary">
                                Disetujui
                            </h6>

                            <h2 class="fw-bold text-success">

                                {{ $materials->where('status','disetujui')->count() }}

                            </h2>

                        </div>

                        <div style="width:55px;
                                    height:55px;
                                    background:rgba(22,163,74,0.15);
                                    border-radius:15px;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;">

                            <i class="bi bi-check-circle text-success fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card border-0 shadow-sm h-100"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h6 class="text-secondary">
                                Ditolak
                            </h6>

                            <h2 class="fw-bold text-warning">

                                {{ $materials->where('status','ditolak')->count() }}

                            </h2>

                        </div>

                        <div style="width:55px;
                                    height:55px;
                                    background:rgba(245,158,11,0.15);
                                    border-radius:15px;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;">

                            <i class="bi bi-x-circle text-warning fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('material.index') }}"
                  method="GET">

                <div class="row g-3">

                    <div class="col-md-8">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari material..."
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

                        <a href="{{ route('material.index') }}"
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
                            Nama Mekanik
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Nama Alat
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Material
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Jumlah
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Harga
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Total
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Supplier
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Status
                        </th>

                        <th class="text-secondary border-0 py-4 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($materials as $i => $material)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">

                                {{ $materials->firstItem() + $i }}

                            </td>

                            <td class="text-info fw-semibold py-4">

                                {{ $material->mekanik->nama_mekanik ?? '-' }}

                            </td>

                            <td class="text-white fw-semibold py-4">

                                {{ $material->maintenance->alat->nama_alat ?? '-' }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $material->nama_material }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $material->jumlah }}
                                {{ $material->satuan }}

                            </td>

                            <td class="text-success fw-bold py-4">

                                Rp {{ number_format($material->harga,0,',','.') }}

                            </td>

                            <td class="text-warning fw-bold py-4">

                                Rp {{ number_format($material->total_harga,0,',','.') }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $material->vendor->nama_vendor ?? $material->supplier ?? '-' }}

                            </td>

                            <td class="py-4">

                                @if($material->status == 'pending')

                                    <span class="badge bg-danger px-3 py-2">
                                        Pending
                                    </span>

                                @elseif($material->status == 'disetujui')

                                    <span class="badge bg-success px-3 py-2">
                                        Disetujui
                                    </span>

                                @elseif($material->status == 'ditolak')

                                    <span class="badge bg-warning px-3 py-2">
                                        Ditolak
                                    </span>

                                @else

                                    <span class="badge bg-primary px-3 py-2">
                                        Selesai
                                    </span>

                                @endif

                            </td>

                            <td class="py-4 text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('material.edit', $material->id) }}"
                                       class="btn btn-sm"
                                       style="background:#2563eb;
                                              color:white;
                                              border:none;
                                              border-radius:10px;">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <form action="{{ route('material.destroy', $material->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin hapus data?')"
                                                class="btn btn-sm"
                                                style="background:#dc2626;
                                                       color:white;
                                                       border:none;
                                                       border-radius:10px;">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10"
                                class="text-center text-secondary py-5">

                                Data material request tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $materials->withQueryString()->links() }}

    </div>

</div>

@endsection