@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Dashboard Admin
        </h2>
        <p class="text-secondary mb-0">
            Monitoring sistem rental alat berat
        </p>

    </div>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm h-100"
                 style="background:linear-gradient(135deg,#2563eb,#1d4ed8);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-light">
                                Total Alat
                            </small>

                            <h2 class="fw-bold text-white mt-2">

                                {{ $totalAlat }}

                            </h2>

                        </div>

                        <div style="font-size:45px;
                                    color:rgba(255,255,255,0.3);">

                            <i class="bi bi-truck"></i> 
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-sm h-100"
                 style="background:linear-gradient(135deg,#16a34a,#15803d);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-light">
                                Pelanggan
                            </small>

                            <h2 class="fw-bold text-white mt-2">

                                {{ $totalPelanggan }}

                            </h2>

                        </div>

                        <div style="font-size:45px;
                                    color:rgba(255,255,255,0.3);">

                            <i class="bi bi-people"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-sm h-100"
                 style="background:linear-gradient(135deg,#f59e0b,#d97706);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-light">
                                Booking
                            </small>

                            <h2 class="fw-bold text-white mt-2">

                                {{ $totalBooking }}

                            </h2>

                        </div>

                        <div style="font-size:45px;
                                    color:rgba(255,255,255,0.3);">

                            <i class="bi bi-calendar-check"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-sm h-100"
                 style="background:linear-gradient(135deg,#dc2626,#b91c1c);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-light">
                                Maintenance
                            </small>

                            <h2 class="fw-bold text-white mt-2">

                                {{ $totalMaintenance }}

                            </h2>

                        </div>

                        <div style="font-size:45px;
                                    color:rgba(255,255,255,0.3);">

                            <i class="bi bi-tools"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:22px;">

                <div class="card-body">

                    <h5 class="fw-bold text-white mb-4">
                        Status Alat
                    </h5>

                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-secondary">
                                Tersedia
                            </span>

                            <span class="text-success fw-bold">

                                {{ $alatTersedia }}

                            </span>

                        </div>

                        <div class="progress"
                             style="height:10px;
                                    border-radius:20px;">

                            <div class="progress-bar bg-success"
                                 style="width:80%"></div>

                        </div>

                    </div>

                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-secondary">
                                Disewa
                            </span>

                            <span class="text-primary fw-bold">

                                {{ $alatDisewa }}

                            </span>

                        </div>

                        <div class="progress"
                             style="height:10px;
                                    border-radius:20px;">

                            <div class="progress-bar bg-primary"
                                 style="width:60%"></div>

                        </div>

                    </div>

                    <div>

                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-secondary">
                                Maintenance
                            </span>

                            <span class="text-warning fw-bold">

                                {{ $alatMaintenance }}

                            </span>

                        </div>

                        <div class="progress"
                             style="height:10px;
                                    border-radius:20px;">

                            <div class="progress-bar bg-warning"
                                 style="width:40%"></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-md-8 mb-4">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h5 class="fw-bold text-white mb-1">
                                Statistik Sistem
                            </h5>

                            <small class="text-secondary">
                                Monitoring data operasional sistem
                            </small>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3 mb-3">

                            <div class="p-4 rounded-4"
                                 style="background:rgba(37,99,235,0.15);">

                                <small class="text-secondary">
                                    Inspeksi
                                </small>

                                <h3 class="fw-bold text-info mt-2">

                                    {{ $totalInspeksi }}

                                </h3>

                            </div>

                        </div>

                        <div class="col-md-3 mb-3">

                            <div class="p-4 rounded-4"
                                 style="background:rgba(22,163,74,0.15);">

                                <small class="text-secondary">
                                    Material
                                </small>

                                <h3 class="fw-bold text-success mt-2">

                                    {{ $totalMaterial }}

                                </h3>

                            </div>

                        </div>

                        <div class="col-md-3 mb-3">

                            <div class="p-4 rounded-4"
                                 style="background:rgba(245,158,11,0.15);">

                                <small class="text-secondary">
                                    Operasional
                                </small>

                                <h3 class="fw-bold text-warning mt-2">

                                    {{ $totalOperasional }}

                                </h3>

                            </div>

                        </div>

                        <div class="col-md-3 mb-3">

                            <div class="p-4 rounded-4"
                                 style="background:rgba(220,38,38,0.15);">

                                <small class="text-secondary">
                                    Tagihan
                                </small>

                                <h3 class="fw-bold text-danger mt-2">

                                    {{ $totalTagihan }}

                                </h3>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm"
         style="background:rgba(255,255,255,0.05);
                border-radius:22px;">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h5 class="fw-bold text-white mb-1">
                        Booking Terbaru
                    </h5>

                    <small class="text-secondary">
                        Data booking terbaru pelanggan
                    </small>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr class="text-secondary">

                            <th>No</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bookingTerbaru as $i => $booking)

                        <tr>

                            <td class="text-white">

                                {{ $i + 1 }}

                            </td>

                            <td class="text-white">

                                {{ $booking->pelanggan->nama ?? '-' }}

                            </td>

                            <td class="text-white">

                                {{ $booking->created_at->format('d M Y') }}

                            </td>

                            <td>

                                <span class="badge bg-success">

                                    Aktif

                                </span>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4"
                                class="text-center text-secondary py-4">

                                Data booking belum tersedia

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