@extends('layout.admin')

@section('title', 'Data Maintenance')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-white mb-1">Data Maintenance</h4>
            <small class="text-secondary"><i class="bi bi-wrench-adjustable me-1"></i>Monitoring maintenance dan perbaikan alat berat</small>
        </div>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="alert border-0 mb-4 d-flex align-items-center gap-3"
         style="background:rgba(22,163,74,0.12);border-left:4px solid #16a34a !important;border-radius:14px;">
        <i class="bi bi-check-circle-fill text-success fs-5"></i>
        <span class="text-white">{{ session('success') }}</span>
        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- Stats Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 p-3 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(148,163,184,0.1);color:#94a3b8;">
                        <i class="bi bi-tools fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">TOTAL RIWAYAT</small>
                        <h3 class="text-white fw-bold mb-0">{{ $maintenances->total() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 p-3 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(239,68,68,0.1);color:#ef4444;">
                        <i class="bi bi-exclamation-circle fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">PENDING</small>
                        <h3 class="text-danger fw-bold mb-0">{{ $maintenances->where('status','pending')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 p-3 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(245,158,11,0.1);color:#f59e0b;">
                        <i class="bi bi-arrow-repeat fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">DIPROSES</small>
                        <h3 class="text-warning fw-bold mb-0">{{ $maintenances->where('status','diproses')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 p-3 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(22,163,74,0.1);color:#16a34a;">
                        <i class="bi bi-check-all fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">SELESAI</small>
                        <h3 class="text-success fw-bold mb-0">{{ $maintenances->where('status','selesai')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Search Filter --}}
    <div class="card border-0 mb-4" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <form action="{{ route('maintenance.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-9">
                        <div class="input-group" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                            <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="form-control border-0 text-white"
                                   style="background:transparent;box-shadow:none;height:50px;"
                                   placeholder="Cari nama alat atau jenis maintenance...">
                        </div>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn fw-semibold flex-fill"
                                style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:50px;">
                            <i class="bi bi-funnel me-1"></i>Filter
                        </button>
                        <a href="{{ route('maintenance.index') }}" class="btn d-flex align-items-center justify-content-center"
                           style="background:rgba(255,255,255,0.07);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);border-radius:12px;width:50px;height:50px;">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Table --}}
    <div class="card border-0 shadow-sm" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr style="background:rgba(15,23,42,0.8);">
                            <th class="text-secondary fw-normal ps-4 py-3" style="font-size:11px;letter-spacing:1px;">UNIT ALAT</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">MAINTENANCE</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">DESKRIPSI</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">BIAYA</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">STATUS</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">BUKTI</th>
                            <th class="text-secondary fw-normal py-3 text-center" style="font-size:11px;letter-spacing:1px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($maintenances as $i => $maintenance)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.05);transition:0.2s;"
                            onmouseover="this.style.background='rgba(37,99,235,0.05)'"
                            onmouseout="this.style.background='transparent'">

                            <td class="ps-4">
                                <div class="text-white fw-bold" style="font-size:14px;">{{ $maintenance->alat->nama_alat }}</div>
                                <code class="text-info" style="font-size:11px;">{{ $maintenance->alat->kode_alat }}</code>
                            </td>

                            <td>
                                <span class="text-white fw-semibold" style="font-size:13px;">{{ $maintenance->jenis_maintenance }}</span>
                            </td>

                            <td class="text-secondary" style="font-size:13px;">
                                {{ Str::limit($maintenance->deskripsi_kerusakan, 35) }}
                            </td>

                            <td class="text-success fw-bold" style="font-size:14px;">
                                Rp {{ number_format($maintenance->biaya,0,',','.') }}
                            </td>

                            <td>
                                @php
                                    $status = $maintenance->status;
                                    $color = match($status) {
                                        'pending' => ['#ef4444', 'rgba(239,68,68,0.15)', 'bi-clock'],
                                        'diproses' => ['#f59e0b', 'rgba(245,158,11,0.15)', 'bi-gear-wide-connected'],
                                        'selesai' => ['#16a34a', 'rgba(22,163,74,0.15)', 'bi-check-all'],
                                        default => ['#94a3b8', 'rgba(148,163,184,0.15)', 'bi-question-circle']
                                    };
                                @endphp
                                <span class="badge px-3 py-2 d-inline-flex align-items-center gap-2"
                                      style="background:{{ $color[1] }}; color:{{ $color[0] }}; border:1px solid {{ $color[0] }}40; border-radius:10px; font-size:11px;">
                                    <i class="bi {{ $color[2] }}" style="font-size:10px;"></i>
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            <td>
                                @if($maintenance->foto_perbaikan)
                                    <div class="position-relative" style="width:50px;height:50px;overflow:hidden;border-radius:10px;border:1px solid rgba(255,255,255,0.1);">
                                        <img src="{{ $maintenance->foto_perbaikan }}" class="w-100 h-100" style="object-fit:cover;">
                                        <a href="{{ $maintenance->foto_perbaikan }}" target="_blank" class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 hover-opacity-100 transition-2">
                                            <i class="bi bi-eye text-white"></i>
                                        </a>
                                    </div>
                                @else
                                    <span class="text-secondary" style="font-size:11px;">Tidak ada</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <form action="{{ route('maintenance.delete', $maintenance->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm d-flex align-items-center justify-content-center mx-auto"
                                            style="width:34px;height:34px;background:rgba(239,68,68,0.1);color:#ef4444;border:1px solid rgba(239,68,68,0.2);border-radius:8px;"
                                            onclick="return confirm('Yakin ingin menghapus data maintenance ini?')">
                                        <i class="bi bi-trash-fill" style="font-size:12px;"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-secondary py-5">
                                <i class="bi bi-wrench-adjustable d-block mb-2" style="font-size:40px;opacity:0.3;"></i>
                                <span style="font-size:14px;">Data maintenance tidak tersedia</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(method_exists($maintenances, 'links'))
            <div class="p-4" style="border-top:1px solid rgba(255,255,255,0.05);">
                {{ $maintenances->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </div>

</div>

<style>
.hover-opacity-100:hover { opacity: 1 !important; }
.transition-2 { transition: 0.2s; }
</style>

@endsection