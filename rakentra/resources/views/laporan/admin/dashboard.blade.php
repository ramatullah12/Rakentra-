@extends('layout.admin')

@section('title', 'Dashboard Analytics')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Dashboard Analytics
        </h2>

        <p class="text-secondary mb-0">
            Monitoring operasional dan performa sistem rental alat berat
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

                            <p class="text-light mb-2">
                                Total Alat
                            </p>

                            <h2 class="fw-bold text-white">

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

                            <p class="text-light mb-2">
                                Total Booking
                            </p>

                            <h2 class="fw-bold text-white">

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
                 style="background:linear-gradient(135deg,#f59e0b,#d97706);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-light mb-2">
                                Maintenance
                            </p>

                            <h2 class="fw-bold text-white">

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

        <div class="col-md-3 mb-4">

            <div class="card border-0 shadow-sm h-100"
                 style="background:linear-gradient(135deg,#dc2626,#b91c1c);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-light mb-2">
                                Material Request
                            </p>

                            <h2 class="fw-bold text-white">

                                {{ $totalMaterial }}

                            </h2>

                        </div>

                        <div style="font-size:45px;
                                    color:rgba(255,255,255,0.3);">

                            <i class="bi bi-box-seam"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-sm h-100"
                 style="border-radius:22px;
                        background:rgba(255,255,255,0.05);">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>

                            <h5 class="fw-bold text-white">
                                Biaya Maintenance
                            </h5>

                            <small class="text-secondary">
                                Total biaya perbaikan alat
                            </small>

                        </div>

                        <div class="text-warning"
                             style="font-size:35px;">

                            <i class="bi bi-tools"></i>

                        </div>

                    </div>

                    <h3 class="fw-bold text-warning">

                        Rp {{ number_format($biayaMaintenance,0,',','.') }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-sm h-100"
                 style="border-radius:22px;
                        background:rgba(255,255,255,0.05);">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>

                            <h5 class="fw-bold text-white">
                                Biaya Material
                            </h5>

                            <small class="text-secondary">
                                Total sparepart dan material
                            </small>

                        </div>

                        <div class="text-danger"
                             style="font-size:35px;">

                            <i class="bi bi-box-seam"></i>

                        </div>

                    </div>

                    <h3 class="fw-bold text-danger">

                        Rp {{ number_format($biayaMaterial,0,',','.') }}

                    </h3>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-sm h-100"
                 style="border-radius:22px;
                        background:rgba(255,255,255,0.05);">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>

                            <h5 class="fw-bold text-white">
                                Operasional
                            </h5>

                            <small class="text-secondary">
                                Total biaya operasional
                            </small>

                        </div>

                        <div class="text-primary"
                             style="font-size:35px;">

                            <i class="bi bi-cash-stack"></i>

                        </div>

                    </div>

                    <h3 class="fw-bold text-primary">

                        Rp {{ number_format($biayaOperasional,0,',','.') }}

                    </h3>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-8 mb-4">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>

                            <h5 class="fw-bold text-white mb-1">
                                Grafik Maintenance
                            </h5>

                            <small class="text-secondary">
                                Statistik maintenance bulanan
                            </small>

                        </div>

                    </div>

                    <canvas id="maintenanceChart"
                            height="120"></canvas>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:22px;">

                <div class="card-body">

                    <h5 class="fw-bold text-white mb-4">
                        Export Laporan
                    </h5>

                    <div class="d-grid gap-3">

                        <a href="{{ route('laporan.maintenance.pdf') }}"
                           class="btn btn-warning text-dark fw-semibold py-3"
                           style="border-radius:14px;">

                            <i class="bi bi-file-earmark-pdf me-2"></i>
                            Laporan Maintenance

                        </a>

                        <a href="{{ route('laporan.material.pdf') }}"
                           class="btn btn-danger fw-semibold py-3"
                           style="border-radius:14px;">

                            <i class="bi bi-file-earmark-pdf me-2"></i>
                            Laporan Material

                        </a>

                        <a href="{{ route('laporan.operasional.pdf') }}"
                           class="btn btn-primary fw-semibold py-3"
                           style="border-radius:14px;">

                            <i class="bi bi-file-earmark-pdf me-2"></i>
                            Laporan Operasional

                        </a>

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
                        Ringkasan Sistem
                    </h5>

                    <small class="text-secondary">
                        Statistik keseluruhan sistem rental alat berat
                    </small>

                </div>

            </div>

            <div class="row">

                <div class="col-md-3 mb-3">

                    <div class="p-4 rounded-4"
                         style="background:rgba(37,99,235,0.15);">

                        <h6 class="text-secondary">
                            Total Tagihan
                        </h6>

                        <h3 class="fw-bold text-info">

                            {{ $totalTagihan }}

                        </h3>

                    </div>

                </div>

                <div class="col-md-3 mb-3">

                    <div class="p-4 rounded-4"
                         style="background:rgba(22,163,74,0.15);">

                        <h6 class="text-secondary">
                            Booking Aktif
                        </h6>

                        <h3 class="fw-bold text-success">

                            {{ $totalBooking }}

                        </h3>

                    </div>

                </div>

                <div class="col-md-3 mb-3">

                    <div class="p-4 rounded-4"
                         style="background:rgba(245,158,11,0.15);">

                        <h6 class="text-secondary">
                            Maintenance Aktif
                        </h6>

                        <h3 class="fw-bold text-warning">

                            {{ $totalMaintenance }}

                        </h3>

                    </div>

                </div>

                <div class="col-md-3 mb-3">

                    <div class="p-4 rounded-4"
                         style="background:rgba(220,38,38,0.15);">

                        <h6 class="text-secondary">
                            Material Digunakan
                        </h6>

                        <h3 class="fw-bold text-danger">

                            {{ $totalMaterial }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const ctx = document.getElementById('maintenanceChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ],

        datasets: [{

            label: 'Maintenance',

            data: @json($maintenanceBulanan),

            borderRadius: 12,

            backgroundColor: [
                '#2563eb',
                '#16a34a',
                '#f59e0b',
                '#dc2626',
                '#8b5cf6',
                '#0ea5e9'
            ]

        }]
    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                labels: {

                    color: '#ffffff'

                }
            }
        },

        scales: {

            x: {

                ticks: {

                    color: '#cbd5e1'

                },

                grid: {

                    color: 'rgba(255,255,255,0.05)'

                }
            },

            y: {

                ticks: {

                    color: '#cbd5e1'

                },

                grid: {

                    color: 'rgba(255,255,255,0.05)'

                }
            }
        }
    }
});

</script>

@endsection