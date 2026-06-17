@extends('layout.mekanik')

@section('title', 'Data Maintenance')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-white mb-1">Manajemen Maintenance</h4>
            <small class="text-secondary"><i class="bi bi-gear-wide-connected me-1"></i>Kelola riwayat dan proses perbaikan unit</small>
        </div>
        <a href="{{ route('maintenance.mekanik.create') }}" class="btn fw-semibold px-4"
           style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;padding:10px 25px;">
            <i class="bi bi-plus-circle me-2"></i>Tambah Maintenance
        </a>
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
        <div class="col-md-4">
            <div class="card border-0 p-3 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(148,163,184,0.1);color:#94a3b8;">
                        <i class="bi bi-collection fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">TOTAL RIWAYAT</small>
                        <h3 class="text-white fw-bold mb-0">{{ $maintenances->total() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 p-3 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(245,158,11,0.1);color:#f59e0b;">
                        <i class="bi bi-tools fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">SEDANG DIPROSES</small>
                        <h3 class="text-warning fw-bold mb-0">{{ $maintenances->where('status','diproses')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 p-3 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(22,163,74,0.1);color:#16a34a;">
                        <i class="bi bi-patch-check fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">SELESAI</small>
                        <h3 class="text-success fw-bold mb-0">{{ $maintenances->where('status','selesai')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter --}}
    <div class="card border-0 mb-4" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <form action="{{ route('maintenance.mekanik') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-9">
                        <div class="input-group" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                            <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="form-control border-0 text-white"
                                   style="background:transparent;box-shadow:none;height:50px;"
                                   placeholder="Cari berdasarkan nama unit...">
                        </div>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn fw-semibold flex-fill"
                                style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:50px;">
                            <i class="bi bi-search me-1"></i>Cari
                        </button>
                        <a href="{{ route('maintenance.mekanik') }}" class="btn d-flex align-items-center justify-content-center"
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
                            <th class="text-secondary fw-normal ps-4 py-3" style="font-size:11px;letter-spacing:1px;">ALAT BERAT</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">MEKANIK</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">JENIS & TANGGAL</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">BIAYA</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">STATUS</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">DOKUMENTASI</th>
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
                                <div class="text-white" style="font-size:13px;">{{ $maintenance->mekanik->nama_mekanik ?? '-' }}</div>
                            </td>

                            <td>
                                <div class="text-white fw-semibold" style="font-size:13px;">{{ $maintenance->jenis_maintenance }}</div>
                                <small class="text-secondary" style="font-size:11px;">{{ \Carbon\Carbon::parse($maintenance->tanggal_maintenance)->format('d M Y') }}</small>
                            </td>

                            <td>
                                <span class="text-success fw-bold" style="font-size:14px;">Rp {{ number_format($maintenance->biaya,0,',','.') }}</span>
                            </td>

                            <td>
                                @php
                                    $status = $maintenance->status;
                                    $color = match($status) {
                                        'pending' => ['#ef4444', 'rgba(239,68,68,0.15)', 'bi-clock'],
                                        'diproses' => ['#f59e0b', 'rgba(245,158,11,0.15)', 'bi-tools'],
                                        'selesai' => ['#16a34a', 'rgba(22,163,74,0.15)', 'bi-patch-check-fill'],
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
                                @if($maintenance->foto_perbaikan && is_array($maintenance->foto_perbaikan) && count($maintenance->foto_perbaikan) > 0)
                                    <div class="d-flex align-items-center">
                                        @foreach($maintenance->foto_perbaikan as $index => $foto)
                                            @if($index < 3)
                                                <div class="position-relative" style="width:35px;height:35px;overflow:hidden;border-radius:8px;border:2px solid #0f172a;margin-left:{{ $index > 0 ? '-15px' : '0' }};z-index:{{ 10 - $index }};">
                                                    <img src="{{ $foto }}" class="w-100 h-100" style="object-fit:cover;">
                                                    <a href="{{ $foto }}" target="_blank" class="position-absolute top-0 start-0 w-100 h-100"></a>
                                                </div>
                                            @endif
                                        @endforeach
                                        @if(count($maintenance->foto_perbaikan) > 3)
                                            <div class="ms-2 small text-secondary" style="font-size:10px;">+{{ count($maintenance->foto_perbaikan) - 3 }}</div>
                                        @endif
                                    </div>
                                @elseif($maintenance->foto_perbaikan && !is_array($maintenance->foto_perbaikan))
                                    <div class="position-relative" style="width:35px;height:35px;overflow:hidden;border-radius:8px;border:1px solid rgba(255,255,255,0.1);">
                                        <img src="{{ $maintenance->foto_perbaikan }}" class="w-100 h-100" style="object-fit:cover;">
                                        <a href="{{ $maintenance->foto_perbaikan }}" target="_blank" class="position-absolute top-0 start-0 w-100 h-100"></a>
                                    </div>
                                @else
                                    <small class="text-secondary">N/A</small>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('maintenance.mekanik.edit', $maintenance->id) }}"
                                   class="btn btn-sm d-flex align-items-center justify-content-center mx-auto"
                                   style="width:34px;height:34px;background:rgba(245,158,11,0.1);color:#f59e0b;border:1px solid rgba(245,158,11,0.2);border-radius:8px;"
                                   title="Update Data">
                                    <i class="bi bi-pencil-square" style="font-size:12px;"></i>
                                </a>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-5">
                                <i class="bi bi-clipboard-x d-block mb-2" style="font-size:40px;opacity:0.3;"></i>
                                <span style="font-size:14px;">Belum ada tugas maintenance</span>
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