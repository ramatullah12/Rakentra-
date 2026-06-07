@extends('layout.pemimpin')

@section('title', 'Executive Dashboard')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container-fluid py-3">

    <div class="mb-4">
        <h2 class="fw-bold text-white mb-1">
            Executive Dashboard
        </h2>

        <p class="text-secondary mb-0">
            Monitoring performa operasional dan biaya alat berat perusahaan
        </p>
    </div>

    {{-- CARD UTAMA --}}
    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-lg h-100"
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
            <div class="card border-0 shadow-lg h-100"
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
            <div class="card border-0 shadow-lg h-100"
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
            <div class="card border-0 shadow-lg h-100"
                 style="background:linear-gradient(135deg,#dc2626,#b91c1c);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-light mb-2">
                                Total Tagihan
                            </p>

                            <h4 class="fw-bold text-white">
                                Rp {{ number_format($totalTagihan,0,',','.') }}
                            </h4>
                        </div>

                        <div style="font-size:45px;
                                    color:rgba(255,255,255,0.3);">

                            <i class="bi bi-receipt"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- BIAYA --}}
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

                        <i class="bi bi-tools text-warning"
                           style="font-size:35px;"></i>

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

                        <i class="bi bi-box-seam text-danger"
                           style="font-size:35px;"></i>

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
                                Biaya Operasional
                            </h5>

                            <small class="text-secondary">
                                Total biaya operasional
                            </small>
                        </div>

                        <i class="bi bi-cash-stack text-primary"
                           style="font-size:35px;"></i>

                    </div>

                    <h3 class="fw-bold text-primary">
                        Rp {{ number_format($biayaOperasional,0,',','.') }}
                    </h3>

                </div>

            </div>

        </div>

    </div>

    {{-- GRAFIK --}}
    <div class="row">

        <div class="col-md-8 mb-4">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:22px;">

                <div class="card-body">

                    <div class="mb-4">

                        <h5 class="fw-bold text-white mb-1">
                            Grafik Operasional
                        </h5>

                        <small class="text-secondary">
                            Statistik biaya operasional bulanan
                        </small>

                    </div>

                    <div style="height:350px;">
                        <canvas id="operasionalChart"></canvas>
                    </div>

                </div>

            </div>

        </div>

        {{-- MONITORING --}}
        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:22px;">

                <div class="card-body">

                    <h5 class="fw-bold text-white mb-4">
                        Monitoring Sistem
                    </h5>

                    {{-- Maintenance --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-secondary">
                                Maintenance
                            </span>

                            <span class="text-warning fw-bold">
                                {{ $totalMaintenance }}
                            </span>

                        </div>

                        <div class="progress"
                             style="height:10px;
                                    border-radius:20px;">

                            <div class="progress-bar bg-warning"
                                 style="width:75%"></div>

                        </div>

                    </div>

                    {{-- Booking --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-secondary">
                                Booking
                            </span>

                            <span class="text-success fw-bold">
                                {{ $totalBooking }}
                            </span>

                        </div>

                        <div class="progress"
                             style="height:10px;
                                    border-radius:20px;">

                            <div class="progress-bar bg-success"
                                 style="width:85%"></div>

                        </div>

                    </div>

                    {{-- Operasional --}}
                    <div class="mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span class="text-secondary">
                                Operasional
                            </span>

                            <span class="text-primary fw-bold">
                                Rp {{ number_format($biayaOperasional,0,',','.') }}
                            </span>

                        </div>

                        <div class="progress"
                             style="height:10px;
                                    border-radius:20px;">

                            <div class="progress-bar bg-primary"
                                 style="width:90%"></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- CHART --}}
<script>

document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('operasionalChart');

    if (!ctx) {
        console.error('Canvas tidak ditemukan');
        return;
    }

    const operasionalData = @json($operasionalBulanan ?? []);

    const defaultData = [0,0,0,0,0,0,0,0,0,0,0,0];

    new Chart(ctx, {

        type: 'line',

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

                label: 'Biaya Operasional',

                data: operasionalData.length
                    ? operasionalData
                    : defaultData,

                borderColor: '#2563eb',

                backgroundColor: 'rgba(37,99,235,0.15)',

                fill: true,

                tension: 0.4,

                borderWidth: 3,

                pointRadius: 5,

                pointBackgroundColor: '#2563eb',

                pointBorderColor: '#ffffff',

                pointBorderWidth: 2
            }]
        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

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
                    beginAtZero: true,
                    ticks: {
                        color: '#cbd5e1',
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    },
                    grid: {
                        color: 'rgba(255,255,255,0.05)'
                    }
                }
            }
        }
    });
});
</script>
@endsection