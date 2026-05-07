@extends('layout.admin')

@section('title', 'Data Inspeksi')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Data Inspeksi
            </h2>

            <p class="text-secondary mb-0">
                Monitoring hasil inspeksi dan kerusakan alat
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

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <h6 class="text-secondary">
                        Total Inspeksi
                    </h6>

                    <h2 class="fw-bold text-white">

                        {{ $inspeksis->count() }}

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
                        Rusak Ringan
                    </h6>

                    <h2 class="fw-bold text-warning">

                        {{ $inspeksis->where('kondisi_alat','rusak_ringan')->count() }}

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
                        Rusak Berat
                    </h6>

                    <h2 class="fw-bold text-danger">

                        {{ $inspeksis->where('kondisi_alat','rusak_berat')->count() }}

                    </h2>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('inspeksi.index') }}"
                  method="GET">

                <div class="row g-3">

                    <div class="col-md-8">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari alat..."
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

                        <a href="{{ route('inspeksi.index') }}"
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
                            Alat
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Tanggal
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Kondisi
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Hasil Inspeksi
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Foto Kerusakan
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Status
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Keterangan
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($inspeksis as $i => $inspeksi)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">

                                {{ $inspeksis->firstItem() + $i }}

                            </td>

                            <td class="text-white fw-semibold py-4">

                                {{ $inspeksi->alat->nama_alat }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $inspeksi->tanggal_inspeksi }}

                            </td>

                            <td class="py-4">

                                @if($inspeksi->kondisi_alat == 'baik')

                                    <span style="background:#16a34a;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Baik

                                    </span>

                                @elseif($inspeksi->kondisi_alat == 'rusak_ringan')

                                    <span style="background:#f59e0b;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Rusak Ringan

                                    </span>

                                @else

                                    <span style="background:#dc2626;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Rusak Berat

                                    </span>

                                @endif

                            </td>

                            <td class="text-secondary py-4">

                                {{ Str::limit($inspeksi->hasil_inspeksi, 50) }}

                            </td>

                            <td class="py-4">

                                @if($inspeksi->foto_kerusakan)

                                    <a href="{{ $inspeksi->foto_kerusakan }}"
                                       target="_blank">

                                        <img src="{{ $inspeksi->foto_kerusakan }}"
                                             width="90"
                                             height="65"
                                             style="object-fit:cover;
                                                    border-radius:10px;">

                                    </a>

                                @else

                                    <span class="text-secondary">
                                        Tidak ada foto
                                    </span>

                                @endif

                            </td>

                            <td class="py-4">

                                @if($inspeksi->status == 'pending')

                                    <span style="background:#64748b;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Pending

                                    </span>

                                @elseif($inspeksi->status == 'proses')

                                    <span style="background:#2563eb;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Proses

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

                            <td class="text-secondary py-4">

                                {{ $inspeksi->keterangan }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="text-center text-secondary py-5">

                                Data inspeksi tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $inspeksis->withQueryString()->links() }}

    </div>

</div>

@endsection