@extends('layout.mekanik')

@section('title', 'Dashboard Mekanik')

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 24px;
        transition: all 0.3s ease;
    }
    
    .glass-card:hover {
        background: rgba(255, 255, 255, 0.05);
        transform: translateY(-5px);
        border-color: rgba(255, 255, 255, 0.15);
    }

    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .progress-custom {
        height: 8px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
        overflow: hidden;
    }

    .table-custom thead th {
        background: rgba(255, 255, 255, 0.02) !important;
        color: #94a3b8 !important;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 15px 20px !important;
        border: none !important;
    }

    .table-custom tbody td {
        padding: 18px 20px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        color: #e2e8f0;
    }

    .btn-action {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #fff;
        border-radius: 12px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-action:hover {
        background: #fff;
        color: #0f172a;
    }
</style>

<div class="container-fluid p-0">
    <!-- Header Summary -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="glass-card p-4 h-100">
                <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                    <i class="bi bi-truck"></i>
                </div>
                <h3 class="fw-bold mb-1">{{ $totalAlat }}</h3>
                <p class="text-muted small mb-0">Total Alat Berat</p>
                <div class="mt-3">
                    <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> Terpantau</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card p-4 h-100">
                <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                    <i class="bi bi-wrench"></i>
                </div>
                <h3 class="fw-bold mb-1">{{ $totalMaintenance }}</h3>
                <p class="text-muted small mb-0">Maintenance Aktif</p>
                <div class="mt-3">
                    <span class="text-warning small fw-semibold"><i class="bi bi-clock"></i> Sedang Proses</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card p-4 h-100">
                <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                    <i class="bi bi-clipboard-check"></i>
                </div>
                <h3 class="fw-bold mb-1">{{ $totalInspeksi }}</h3>
                <p class="text-muted small mb-0">Total Inspeksi</p>
                <div class="mt-3">
                    <span class="text-info small fw-semibold"><i class="bi bi-check2-circle"></i> Selesai Hari Ini</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="glass-card p-4 h-100">
                <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h3 class="fw-bold mb-1">{{ $totalMaterial }}</h3>
                <p class="text-muted small mb-0">Material Request</p>
                <div class="mt-3">
                    <span class="text-danger small fw-semibold"><i class="bi bi-exclamation-triangle"></i> Perlu Review</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Task Status & Progress -->
        <div class="col-lg-4">
            <div class="glass-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0">Status Tugas</h5>
                    <i class="bi bi-three-dots text-muted"></i>
                </div>
                
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="small text-muted">Perbaikan Alat</span>
                        <span class="small fw-bold">{{ $alatMaintenance }} Unit</span>
                    </div>
                    <div class="progress-custom">
                        <div class="progress-bar" style="width: 65%; background: var(--accent-orange);"></div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="small text-muted">Permintaan Material</span>
                        <span class="small fw-bold">{{ $totalMaterial }} Item</span>
                    </div>
                    <div class="progress-custom">
                        <div class="progress-bar" style="width: 40%; background: var(--accent-blue);"></div>
                    </div>
                </div>

                <div class="p-3 rounded-4 mt-4" style="background: rgba(59, 130, 246, 0.05); border: 1px dashed rgba(59, 130, 246, 0.2);">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="avatar-sm bg-primary rounded-circle p-2" style="width: 32px; height: 32px; display: flex; align-items:center; justify-content:center;">
                            <i class="bi bi-info-circle text-white small"></i>
                        </div>
                        <span class="small text-muted">Pastikan HM unit sudah diupdate setelah maintenance.</span>
                    </div>
                </div>
            </div>

            <div class="glass-card p-4 mt-4">
                <h6 class="fw-bold mb-3">Menu Cepat</h6>
                <div class="d-grid gap-2">
                    <a href="{{ route('maintenance.mekanik') }}" class="btn btn-action text-start">
                        <i class="bi bi-plus-circle me-2"></i> Input Maintenance
                    </a>
                    <a href="{{ route('inspeksi.mekanik') }}" class="btn btn-action text-start">
                        <i class="bi bi-search me-2"></i> Mulai Inspeksi
                    </a>
                    <a href="{{ route('material.mekanik') }}" class="btn btn-action text-start">
                        <i class="bi bi-box me-2"></i> Request Sparepart
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Maintenance Table -->
        <div class="col-lg-8">
            <div class="glass-card overflow-hidden">
                <div class="p-4 d-flex justify-content-between align-items-center border-bottom border-secondary" style="border-color: rgba(255,255,255,0.05) !important;">
                    <div>
                        <h5 class="fw-bold m-0">Aktivitas Terakhir</h5>
                        <p class="text-muted small m-0">Daftar pemeliharaan alat terbaru</p>
                    </div>
                    <a href="{{ route('maintenance.mekanik') }}" class="btn-action text-decoration-none">Lihat Semua</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th>Unit / Jenis</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($maintenanceTerbaru as $maintenance)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2" style="width: 40px; height: 40px; display: flex; align-items:center; justify-content:center;">
                                            <i class="bi bi-tools"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $maintenance->jenis_maintenance }}</div>
                                            <div class="small text-muted">ID: #MNT-{{ $maintenance->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-muted">{{ Str::limit($maintenance->keterangan ?? 'Tidak ada detail', 45) }}</div>
                                </td>
                                <td>
                                    @php
                                        $st = $maintenance->status ?? 'pending';
                                        $color = match($st) {
                                            'selesai' => '#10b981',
                                            'proses' => '#3b82f6',
                                            default => '#f59e0b',
                                        };
                                    @endphp
                                    <span class="badge rounded-pill px-3 py-2" style="background: {{ $color }}20; color: {{ $color }}; border: 1px solid {{ $color }}40;">
                                        {{ ucfirst($st) }}
                                    </span>
                                </td>
                                <td class="small text-muted">
                                    {{ $maintenance->created_at->translatedFormat('d M Y') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-3 opacity-25"></i>
                                    Belum ada data maintenance terbaru.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection