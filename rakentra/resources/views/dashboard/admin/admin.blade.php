@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold text-white mb-1">Dashboard Admin</h2>
            <p class="text-secondary mb-0">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>
        <div>
            <span class="badge px-3 py-2" style="background:linear-gradient(135deg,#2563eb,#1d4ed8);border-radius:10px;font-size:13px;">
                <i class="bi bi-shield-check me-1"></i> Administrator
            </span>
        </div>
    </div>

    {{-- Stat Cards Row 1 --}}
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
                        <small class="text-light opacity-75"><i class="bi bi-arrow-up me-1"></i>Semua alat berat</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#16a34a,#15803d);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Alat Tersedia</small>
                            <h2 class="fw-bold text-white mb-0">{{ $alatTersedia }}</h2>
                            <small class="text-light opacity-60">Siap disewa</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75"><i class="bi bi-circle-fill me-1" style="font-size:8px;"></i>Status aktif</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Sedang Disewa</small>
                            <h2 class="fw-bold text-white mb-0">{{ $alatDisewa }}</h2>
                            <small class="text-light opacity-60">Unit aktif</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-gear-wide-connected"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75"><i class="bi bi-activity me-1"></i>Sedang beroperasi</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#dc2626,#b91c1c);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Maintenance</small>
                            <h2 class="fw-bold text-white mb-0">{{ $alatMaintenance }}</h2>
                            <small class="text-light opacity-60">Dalam perbaikan</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-wrench-adjustable"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75"><i class="bi bi-tools me-1"></i>Perlu perhatian</small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Stat Cards Row 2 --}}
    <div class="row g-3 mb-4">

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:28px;color:#60a5fa;" class="mb-2"><i class="bi bi-people-fill"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $totalPelanggan }}</h4>
                    <small class="text-secondary">Pelanggan</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:28px;color:#34d399;" class="mb-2"><i class="bi bi-calendar-check-fill"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $totalBooking }}</h4>
                    <small class="text-secondary">Booking</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:28px;color:#fb923c;" class="mb-2"><i class="bi bi-wrench-adjustable-circle-fill"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $totalMaintenance }}</h4>
                    <small class="text-secondary">Maintenance</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:28px;color:#a78bfa;" class="mb-2"><i class="bi bi-clipboard-check-fill"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $totalInspeksi }}</h4>
                    <small class="text-secondary">Inspeksi</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:28px;color:#f472b6;" class="mb-2"><i class="bi bi-box-seam-fill"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $totalMaterial }}</h4>
                    <small class="text-secondary">Material</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-2">
            <div class="card border-0 text-center h-100" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body py-4">
                    <div style="font-size:28px;color:#facc15;" class="mb-2"><i class="bi bi-receipt-cutoff"></i></div>
                    <h4 class="fw-bold text-white mb-0">{{ $totalTagihan }}</h4>
                    <small class="text-secondary">Tagihan</small>
                </div>
            </div>
        </div>

    </div>

    {{-- Charts + Booking Terbaru --}}
    <div class="row g-3">

        {{-- Status Alat Chart --}}
        <div class="col-md-4">
            <div class="card border-0 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-white mb-1">Status Alat Berat</h6>
                    <small class="text-secondary d-block mb-4">Distribusi status semua alat</small>
                    <canvas id="statusAlatChart" style="max-height:220px;"></canvas>
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-secondary"><span class="me-2" style="color:#16a34a;">●</span> Tersedia</span>
                            <span class="fw-bold text-white">{{ $alatTersedia }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-secondary"><span class="me-2" style="color:#f59e0b;">●</span> Disewa</span>
                            <span class="fw-bold text-white">{{ $alatDisewa }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary"><span class="me-2" style="color:#dc2626;">●</span> Maintenance</span>
                            <span class="fw-bold text-white">{{ $alatMaintenance }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ringkasan Aktivitas --}}
        <div class="col-md-4">
            <div class="card border-0 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-white mb-1">Ringkasan Aktivitas</h6>
                    <small class="text-secondary d-block mb-4">Kondisi sistem saat ini</small>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-secondary">Booking</small>
                            <small class="text-white fw-bold">{{ $totalBooking }}</small>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $totalAlat > 0 ? min(100, ($totalBooking / max($totalAlat,1)) * 100) : 0 }}%;background:linear-gradient(90deg,#2563eb,#60a5fa);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-secondary">Maintenance</small>
                            <small class="text-white fw-bold">{{ $totalMaintenance }}</small>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $totalAlat > 0 ? min(100, ($totalMaintenance / max($totalAlat,1)) * 100) : 0 }}%;background:linear-gradient(90deg,#f59e0b,#fcd34d);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-secondary">Inspeksi</small>
                            <small class="text-white fw-bold">{{ $totalInspeksi }}</small>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $totalAlat > 0 ? min(100, ($totalInspeksi / max($totalAlat,1)) * 100) : 0 }}%;background:linear-gradient(90deg,#a78bfa,#c4b5fd);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-secondary">Material Request</small>
                            <small class="text-white fw-bold">{{ $totalMaterial }}</small>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $totalAlat > 0 ? min(100, ($totalMaterial / max($totalAlat,1)) * 100) : 0 }}%;background:linear-gradient(90deg,#f472b6,#fbcfe8);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-secondary">Tagihan</small>
                            <small class="text-white fw-bold">{{ $totalTagihan }}</small>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $totalAlat > 0 ? min(100, ($totalTagihan / max($totalAlat,1)) * 100) : 0 }}%;background:linear-gradient(90deg,#facc15,#fef08a);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.07);">
                        <a href="{{ route('laporan.admin') }}" class="btn btn-sm w-100 fw-semibold" style="background:linear-gradient(135deg,#2563eb,#1d4ed8);border-radius:10px;color:#fff;">
                            <i class="bi bi-bar-chart-line me-2"></i>Lihat Laporan Lengkap
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="col-md-4">
            <div class="card border-0 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-white mb-1">Aksi Cepat</h6>
                    <small class="text-secondary d-block mb-4">Navigasi menu utama</small>

                    <div class="row g-2">
                        <div class="col-6">
                            <a href="{{ route('alat.admin') }}" class="d-block text-decoration-none p-3 rounded-3 text-center" style="background:rgba(37,99,235,0.15);border:1px solid rgba(37,99,235,0.25);transition:0.2s;" onmouseover="this.style.background='rgba(37,99,235,0.3)'" onmouseout="this.style.background='rgba(37,99,235,0.15)'">
                                <i class="bi bi-truck d-block mb-1" style="font-size:22px;color:#60a5fa;"></i>
                                <small class="text-secondary" style="font-size:11px;">Data Alat</small>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('pelanggan.index') }}" class="d-block text-decoration-none p-3 rounded-3 text-center" style="background:rgba(16,163,74,0.15);border:1px solid rgba(16,163,74,0.25);transition:0.2s;" onmouseover="this.style.background='rgba(16,163,74,0.3)'" onmouseout="this.style.background='rgba(16,163,74,0.15)'">
                                <i class="bi bi-people d-block mb-1" style="font-size:22px;color:#34d399;"></i>
                                <small class="text-secondary" style="font-size:11px;">Pelanggan</small>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('booking.index') }}" class="d-block text-decoration-none p-3 rounded-3 text-center" style="background:rgba(245,158,11,0.15);border:1px solid rgba(245,158,11,0.25);transition:0.2s;" onmouseover="this.style.background='rgba(245,158,11,0.3)'" onmouseout="this.style.background='rgba(245,158,11,0.15)'">
                                <i class="bi bi-calendar-check d-block mb-1" style="font-size:22px;color:#fbbf24;"></i>
                                <small class="text-secondary" style="font-size:11px;">Booking</small>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('maintenance.index') }}" class="d-block text-decoration-none p-3 rounded-3 text-center" style="background:rgba(220,38,38,0.15);border:1px solid rgba(220,38,38,0.25);transition:0.2s;" onmouseover="this.style.background='rgba(220,38,38,0.3)'" onmouseout="this.style.background='rgba(220,38,38,0.15)'">
                                <i class="bi bi-wrench d-block mb-1" style="font-size:22px;color:#f87171;"></i>
                                <small class="text-secondary" style="font-size:11px;">Maintenance</small>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('inspeksi.index') }}" class="d-block text-decoration-none p-3 rounded-3 text-center" style="background:rgba(167,139,250,0.15);border:1px solid rgba(167,139,250,0.25);transition:0.2s;" onmouseover="this.style.background='rgba(167,139,250,0.3)'" onmouseout="this.style.background='rgba(167,139,250,0.15)'">
                                <i class="bi bi-clipboard-check d-block mb-1" style="font-size:22px;color:#a78bfa;"></i>
                                <small class="text-secondary" style="font-size:11px;">Inspeksi</small>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('tagihan.index') }}" class="d-block text-decoration-none p-3 rounded-3 text-center" style="background:rgba(250,204,21,0.15);border:1px solid rgba(250,204,21,0.25);transition:0.2s;" onmouseover="this.style.background='rgba(250,204,21,0.3)'" onmouseout="this.style.background='rgba(250,204,21,0.15)'">
                                <i class="bi bi-receipt d-block mb-1" style="font-size:22px;color:#facc15;"></i>
                                <small class="text-secondary" style="font-size:11px;">Tagihan</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Booking Terbaru --}}
    <div class="card border-0 mt-4" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h6 class="fw-bold text-white mb-1">Booking Terbaru</h6>
                    <small class="text-secondary">5 booking paling baru masuk</small>
                </div>
                <a href="{{ route('booking.index') }}" class="btn btn-sm" style="background:rgba(37,99,235,0.15);color:#60a5fa;border:1px solid rgba(37,99,235,0.3);border-radius:10px;">
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
                                         style="width:34px;height:34px;background:linear-gradient(135deg,#2563eb,#1d4ed8);font-size:13px;">
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
                                Belum ada data booking
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
    const ctx = document.getElementById('statusAlatChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Tersedia', 'Disewa', 'Maintenance'],
            datasets: [{
                data: [{{ $alatTersedia }}, {{ $alatDisewa }}, {{ $alatMaintenance }}],
                backgroundColor: ['#16a34a', '#f59e0b', '#dc2626'],
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