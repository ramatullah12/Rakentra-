@extends('layout.pemimpin')

@section('title', 'Dashboard Executive')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h2 class="fw-bold text-white mb-1">Executive Dashboard</h2>
            <p class="text-secondary mb-0">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <span class="badge px-3 py-2" style="background:linear-gradient(135deg,#7c3aed,#6d28d9);border-radius:10px;font-size:13px;">
                <i class="bi bi-star-fill me-1"></i> Pemimpin
            </span>
        </div>
    </div>

    {{-- KPI Cards --}}
    <div class="row g-3 mb-4">

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#2563eb,#1d4ed8);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Total Alat</small>
                            <h2 class="fw-bold text-white mb-0">{{ $totalAlat }}</h2>
                            <small class="text-light opacity-60">Unit terdaftar</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-truck"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75">
                            <i class="bi bi-check-circle me-1"></i>{{ $alatTersedia }} tersedia
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#16a34a,#15803d);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Total User</small>
                            <h2 class="fw-bold text-white mb-0">{{ $totalUser }}</h2>
                            <small class="text-light opacity-60">Pengguna sistem</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75">
                            <i class="bi bi-person-check me-1"></i>Admin & Mekanik
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Total Booking</small>
                            <h2 class="fw-bold text-white mb-0">{{ $totalBooking }}</h2>
                            <small class="text-light opacity-60">Permintaan sewa</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75">
                            <i class="bi bi-graph-up me-1"></i>Total transaksi
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#7c3aed,#6d28d9);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Estimasi Revenue</small>
                            <h4 class="fw-bold text-white mb-0" style="font-size:18px;">
                                Rp {{ number_format($revenue, 0, ',', '.') }}
                            </h4>
                            <small class="text-light opacity-60">Tahun berjalan</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75">
                            <i class="bi bi-currency-dollar me-1"></i>Proyeksi keuangan
                        </small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Sub Stats Row --}}
    <div class="row g-3 mb-4">

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:26px;color:#34d399;" class="mb-2"><i class="bi bi-check-circle-fill"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $alatTersedia }}</h4>
                    <small class="text-secondary">Tersedia</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:26px;color:#60a5fa;" class="mb-2"><i class="bi bi-gear-wide-connected"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $alatDisewa }}</h4>
                    <small class="text-secondary">Disewa</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:26px;color:#f87171;" class="mb-2"><i class="bi bi-wrench-adjustable-circle-fill"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $alatMaintenance }}</h4>
                    <small class="text-secondary">Maintenance</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:26px;color:#fbbf24;" class="mb-2"><i class="bi bi-person-lines-fill"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $totalPelanggan }}</h4>
                    <small class="text-secondary">Pelanggan</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:26px;color:#a78bfa;" class="mb-2"><i class="bi bi-file-earmark-text-fill"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $totalOperasional }}</h4>
                    <small class="text-secondary">Operasional</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:26px;color:#f472b6;" class="mb-2"><i class="bi bi-receipt-cutoff"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $totalTagihan }}</h4>
                    <small class="text-secondary">Tagihan</small>
                </div>
            </div>
        </div>

    </div>

    {{-- Charts + Stats --}}
    <div class="row g-3 mb-4">

        {{-- Donut Chart Alat --}}
        <div class="col-md-4">
            <div class="card border-0 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-white mb-1">Distribusi Alat Berat</h6>
                    <small class="text-secondary d-block mb-4">Status seluruh unit armada</small>
                    <canvas id="alatChart" style="max-height:200px;"></canvas>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-secondary"><span class="me-2" style="color:#16a34a;">●</span> Tersedia</span>
                            <span class="fw-bold text-white">{{ $alatTersedia }} unit</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-secondary"><span class="me-2" style="color:#2563eb;">●</span> Disewa</span>
                            <span class="fw-bold text-white">{{ $alatDisewa }} unit</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary"><span class="me-2" style="color:#dc2626;">●</span> Maintenance</span>
                            <span class="fw-bold text-white">{{ $alatMaintenance }} unit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- KPI Summary --}}
        <div class="col-md-4">
            <div class="card border-0 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-white mb-1">KPI Perusahaan</h6>
                    <small class="text-secondary d-block mb-4">Indikator kinerja utama</small>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-secondary">Utilisasi Alat</small>
                            @php $utilisasi = $totalAlat > 0 ? round(($alatDisewa / $totalAlat) * 100) : 0; @endphp
                            <small class="text-white fw-bold">{{ $utilisasi }}%</small>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $utilisasi }}%;background:linear-gradient(90deg,#16a34a,#34d399);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-secondary">Tingkat Maintenance</small>
                            @php $tingkatMaint = $totalAlat > 0 ? round(($alatMaintenance / $totalAlat) * 100) : 0; @endphp
                            <small class="text-white fw-bold">{{ $tingkatMaint }}%</small>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $tingkatMaint }}%;background:linear-gradient(90deg,#dc2626,#f87171);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-secondary">Booking Rate</small>
                            @php $bookingRate = $totalPelanggan > 0 ? min(100, round(($totalBooking / max($totalPelanggan,1)) * 20)) : 0; @endphp
                            <small class="text-white fw-bold">{{ $bookingRate }}%</small>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $bookingRate }}%;background:linear-gradient(90deg,#f59e0b,#fcd34d);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-secondary">Material Terpakai</small>
                            @php $matRate = min(100, $totalMaterial * 5); @endphp
                            <small class="text-white fw-bold">{{ $matRate }}%</small>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $matRate }}%;background:linear-gradient(90deg,#a78bfa,#c4b5fd);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mt-4 p-3 rounded-3" style="background:rgba(124,58,237,0.1);border:1px solid rgba(124,58,237,0.2);">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-graph-up-arrow" style="color:#a78bfa;"></i>
                            <small class="text-secondary">Utilisasi armada: <span class="text-white fw-bold">{{ $utilisasi }}%</span> dari total unit</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistik Detail --}}
        <div class="col-md-4">
            <div class="card border-0 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-white mb-1">Statistik Operasional</h6>
                    <small class="text-secondary d-block mb-4">Ringkasan aktivitas sistem</small>

                    <div class="row g-2 mb-4">
                        <div class="col-6">
                            <div class="p-3 rounded-3" style="background:rgba(22,163,74,0.12);border:1px solid rgba(22,163,74,0.2);">
                                <small class="text-secondary d-block" style="font-size:11px;">Booking</small>
                                <h5 class="fw-bold text-success mb-0 mt-1">{{ $totalBooking }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded-3" style="background:rgba(37,99,235,0.12);border:1px solid rgba(37,99,235,0.2);">
                                <small class="text-secondary d-block" style="font-size:11px;">Operasional</small>
                                <h5 class="fw-bold text-info mb-0 mt-1">{{ $totalOperasional }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded-3" style="background:rgba(245,158,11,0.12);border:1px solid rgba(245,158,11,0.2);">
                                <small class="text-secondary d-block" style="font-size:11px;">Maintenance</small>
                                <h5 class="fw-bold text-warning mb-0 mt-1">{{ $totalMaintenance }}</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 rounded-3" style="background:rgba(220,38,38,0.12);border:1px solid rgba(220,38,38,0.2);">
                                <small class="text-secondary d-block" style="font-size:11px;">Tagihan</small>
                                <h5 class="fw-bold text-danger mb-0 mt-1">{{ $totalTagihan }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3" style="border-top:1px solid rgba(255,255,255,0.07);">
                        <a href="{{ route('laporan.pemimpin') }}" class="btn btn-sm w-100 fw-semibold" style="background:linear-gradient(135deg,#7c3aed,#6d28d9);border-radius:10px;color:#fff;padding:10px;">
                            <i class="bi bi-bar-chart-line me-2"></i>Lihat Executive Report
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Booking Terbaru --}}
    <div class="card border-0" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h6 class="fw-bold text-white mb-1">Booking Terbaru</h6>
                    <small class="text-secondary">Monitoring 5 transaksi terbaru</small>
                </div>
                <a href="{{ route('booking.pemimpin') }}" class="btn btn-sm" style="background:rgba(124,58,237,0.15);color:#a78bfa;border:1px solid rgba(124,58,237,0.3);border-radius:10px;">
                    Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="text-secondary fw-normal" style="font-size:13px;">No</th>
                            <th class="text-secondary fw-normal" style="font-size:13px;">Pelanggan</th>
                            <th class="text-secondary fw-normal" style="font-size:13px;">Tanggal Mulai</th>
                            <th class="text-secondary fw-normal" style="font-size:13px;">Tanggal Selesai</th>
                            <th class="text-secondary fw-normal" style="font-size:13px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookingTerbaru as $i => $booking)
                        <tr>
                            <td class="text-secondary">{{ $i + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                         style="width:34px;height:34px;background:linear-gradient(135deg,#7c3aed,#6d28d9);font-size:13px;color:#fff;">
                                        {{ strtoupper(substr($booking->pelanggan->nama ?? 'N', 0, 1)) }}
                                    </div>
                                    <span class="text-white fw-semibold" style="font-size:14px;">
                                        {{ $booking->pelanggan->nama ?? '-' }}
                                    </span>
                                </div>
                            </td>
                            <td class="text-secondary" style="font-size:13px;">{{ \Carbon\Carbon::parse($booking->tanggal_mulai)->format('d M Y') }}</td>
                            <td class="text-secondary" style="font-size:13px;">{{ \Carbon\Carbon::parse($booking->tanggal_selesai)->format('d M Y') }}</td>
                            <td>
                                @php
                                    $status = $booking->status ?? 'pending';
                                    $badgeColor = match($status) {
                                        'selesai'    => '#16a34a',
                                        'berjalan'   => '#2563eb',
                                        'disetujui'  => '#0891b2',
                                        'dibatalkan' => '#dc2626',
                                        default      => '#f59e0b',
                                    };
                                @endphp
                                <span class="badge" style="background:{{ $badgeColor }};border-radius:8px;padding:5px 12px;font-size:12px;">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-5">
                                <i class="bi bi-inbox d-block mb-2" style="font-size:32px;"></i>
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

<script>
    const ctx2 = document.getElementById('alatChart').getContext('2d');
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Tersedia', 'Disewa', 'Maintenance'],
            datasets: [{
                data: [{{ $alatTersedia }}, {{ $alatDisewa }}, {{ $alatMaintenance }}],
                backgroundColor: ['#16a34a', '#2563eb', '#dc2626'],
                borderWidth: 0,
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>

@endsection