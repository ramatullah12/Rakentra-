@extends('layout.mekanik')

@section('title', 'Dashboard Mekanik')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold text-white mb-1">Dashboard Mekanik</h2>
            <p class="text-secondary mb-0">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>
        <div>
            <span class="badge px-3 py-2" style="background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:10px;font-size:13px;">
                <i class="bi bi-wrench me-1"></i> Mekanik
            </span>
        </div>
    </div>

    {{-- Stat Cards --}}
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
                        <small class="text-light opacity-75"><i class="bi bi-layers me-1"></i>Semua unit</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Total Maintenance</small>
                            <h2 class="fw-bold text-white mb-0">{{ $totalMaintenance }}</h2>
                            <small class="text-light opacity-60">Pekerjaan service</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-tools"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75"><i class="bi bi-hammer me-1"></i>Perlu dikerjakan</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#16a34a,#15803d);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Total Inspeksi</small>
                            <h2 class="fw-bold text-white mb-0">{{ $totalInspeksi }}</h2>
                            <small class="text-light opacity-60">Pemeriksaan alat</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75"><i class="bi bi-search me-1"></i>Hasil inspeksi</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 h-100" style="background:linear-gradient(135deg,#dc2626,#b91c1c);border-radius:20px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <small class="text-light opacity-75 d-block mb-1">Material Request</small>
                            <h2 class="fw-bold text-white mb-0">{{ $totalMaterial }}</h2>
                            <small class="text-light opacity-60">Permintaan bahan</small>
                        </div>
                        <div style="font-size:40px;color:rgba(255,255,255,0.25);">
                            <i class="bi bi-box-seam"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.15);">
                        <small class="text-light opacity-75"><i class="bi bi-archive me-1"></i>Stok material</small>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Middle Row --}}
    <div class="row g-3 mb-4">

        {{-- Status Panel --}}
        <div class="col-md-4">
            <div class="card border-0 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-white mb-1">Status Pekerjaan</h6>
                    <small class="text-secondary d-block mb-4">Progres tugas mekanik</small>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-tools" style="color:#f59e0b;"></i>
                                <small class="text-secondary">Alat Maintenance</small>
                            </div>
                            <span class="fw-bold text-warning">{{ $alatMaintenance }}</span>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $totalAlat > 0 ? min(100, ($alatMaintenance / max($totalAlat,1)) * 100) : 0 }}%;background:linear-gradient(90deg,#f59e0b,#fcd34d);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-box-seam" style="color:#dc2626;"></i>
                                <small class="text-secondary">Material Request</small>
                            </div>
                            <span class="fw-bold text-danger">{{ $totalMaterial }}</span>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $totalMaterial > 0 ? min(100, $totalMaterial * 10) : 0 }}%;background:linear-gradient(90deg,#dc2626,#f87171);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-clock-history" style="color:#60a5fa;"></i>
                                <small class="text-secondary">Operasional</small>
                            </div>
                            <span class="fw-bold text-info">{{ $totalOperasional }}</span>
                        </div>
                        <div class="progress" style="height:8px;border-radius:20px;background:rgba(255,255,255,0.1);">
                            <div class="progress-bar" style="width:{{ $totalOperasional > 0 ? min(100, $totalOperasional * 8) : 0 }}%;background:linear-gradient(90deg,#2563eb,#60a5fa);border-radius:20px;"></div>
                        </div>
                    </div>

                    <div class="mt-4 p-3 rounded-3" style="background:rgba(245,158,11,0.08);border:1px solid rgba(245,158,11,0.2);">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-info-circle text-warning"></i>
                            <small class="text-secondary">{{ $alatMaintenance }} alat sedang dalam perbaikan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistik + Quick Links --}}
        <div class="col-md-8">
            <div class="card border-0 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-white mb-1">Statistik Mekanik</h6>
                    <small class="text-secondary d-block mb-4">Ringkasan pekerjaan dan aktivitas mekanik</small>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="p-4 rounded-3 text-center" style="background:rgba(245,158,11,0.12);border:1px solid rgba(245,158,11,0.2);">
                                <i class="bi bi-tools d-block mb-2" style="font-size:28px;color:#f59e0b;"></i>
                                <h3 class="fw-bold text-warning mb-1">{{ $totalMaintenance }}</h3>
                                <small class="text-secondary">Maintenance</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 rounded-3 text-center" style="background:rgba(22,163,74,0.12);border:1px solid rgba(22,163,74,0.2);">
                                <i class="bi bi-clipboard-check d-block mb-2" style="font-size:28px;color:#34d399;"></i>
                                <h3 class="fw-bold text-success mb-1">{{ $totalInspeksi }}</h3>
                                <small class="text-secondary">Inspeksi</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 rounded-3 text-center" style="background:rgba(220,38,38,0.12);border:1px solid rgba(220,38,38,0.2);">
                                <i class="bi bi-box-seam d-block mb-2" style="font-size:28px;color:#f87171;"></i>
                                <h3 class="fw-bold text-danger mb-1">{{ $totalMaterial }}</h3>
                                <small class="text-secondary">Material</small>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3" style="border-top:1px solid rgba(255,255,255,0.07);">
                        <p class="text-secondary mb-3" style="font-size:13px;">Menu cepat:</p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('maintenance.mekanik') }}" class="btn btn-sm fw-semibold" style="background:linear-gradient(135deg,#f59e0b,#d97706);color:#fff;border-radius:10px;padding:8px 16px;">
                                <i class="bi bi-tools me-1"></i> Maintenance
                            </a>
                            <a href="{{ route('inspeksi.mekanik') }}" class="btn btn-sm fw-semibold" style="background:linear-gradient(135deg,#16a34a,#15803d);color:#fff;border-radius:10px;padding:8px 16px;">
                                <i class="bi bi-clipboard-check me-1"></i> Inspeksi
                            </a>
                            <a href="{{ route('material.mekanik') }}" class="btn btn-sm fw-semibold" style="background:linear-gradient(135deg,#dc2626,#b91c1c);color:#fff;border-radius:10px;padding:8px 16px;">
                                <i class="bi bi-box-seam me-1"></i> Material
                            </a>
                            <a href="{{ route('alat.mekanik') }}" class="btn btn-sm fw-semibold" style="background:rgba(37,99,235,0.2);color:#60a5fa;border:1px solid rgba(37,99,235,0.3);border-radius:10px;padding:8px 16px;">
                                <i class="bi bi-truck me-1"></i> Data Alat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Maintenance Terbaru --}}
    <div class="card border-0" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h6 class="fw-bold text-white mb-1">Maintenance Terbaru</h6>
                    <small class="text-secondary">5 data maintenance paling baru</small>
                </div>
                <a href="{{ route('maintenance.mekanik') }}" class="btn btn-sm" style="background:rgba(245,158,11,0.15);color:#fbbf24;border:1px solid rgba(245,158,11,0.3);border-radius:10px;">
                    Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="text-secondary fw-normal" style="font-size:13px;">No</th>
                            <th class="text-secondary fw-normal" style="font-size:13px;">Jenis Maintenance</th>
                            <th class="text-secondary fw-normal" style="font-size:13px;">Keterangan</th>
                            <th class="text-secondary fw-normal" style="font-size:13px;">Status</th>
                            <th class="text-secondary fw-normal" style="font-size:13px;">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($maintenanceTerbaru as $i => $maintenance)
                        <tr>
                            <td class="text-secondary">{{ $i + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:34px;height:34px;background:rgba(245,158,11,0.15);">
                                        <i class="bi bi-wrench" style="color:#f59e0b;font-size:14px;"></i>
                                    </div>
                                    <span class="text-white fw-semibold" style="font-size:14px;">{{ $maintenance->jenis_maintenance }}</span>
                                </div>
                            </td>
                            <td class="text-secondary" style="font-size:13px;">{{ Str::limit($maintenance->keterangan ?? '-', 40) }}</td>
                            <td>
                                @php
                                    $st = $maintenance->status ?? 'pending';
                                    $bg = match($st) {
                                        'selesai' => '#16a34a',
                                        'proses' => '#2563eb',
                                        default => '#f59e0b',
                                    };
                                @endphp
                                <span class="badge" style="background:{{ $bg }};border-radius:8px;padding:5px 12px;font-size:12px;">
                                    {{ ucfirst($st) }}
                                </span>
                            </td>
                            <td class="text-secondary" style="font-size:13px;">{{ $maintenance->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-5">
                                <i class="bi bi-inbox d-block mb-2" style="font-size:32px;"></i>
                                Data maintenance belum tersedia
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