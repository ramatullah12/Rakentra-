@extends('layout.admin')

@section('title','Data Alat Berat')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-white mb-1">Data Alat Berat</h4>
            <small class="text-secondary"><i class="bi bi-truck me-1"></i>Manajemen inventaris unit alat berat</small>
        </div>
        <a href="{{ route('alat.create') }}" class="btn fw-semibold px-4"
           style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;padding:10px 20px;">
            <i class="bi bi-plus-lg me-2"></i>Tambah Unit
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

    {{-- Stats Mini (Optional, adds professional feel) --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 p-3" style="background:rgba(255,255,255,0.05);border-radius:16px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:45px;height:45px;background:rgba(37,99,235,0.1);color:#3b82f6;">
                        <i class="bi bi-box-seam fs-5"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block">Total Unit</small>
                        <span class="text-white fw-bold fs-5">{{ count($alats) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 p-3" style="background:rgba(255,255,255,0.05);border-radius:16px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:45px;height:45px;background:rgba(22,163,74,0.1);color:#10b981;">
                        <i class="bi bi-check-circle fs-5"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block">Tersedia</small>
                        <span class="text-white fw-bold fs-5">{{ $alats->where('status','tersedia')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 p-3" style="background:rgba(255,255,255,0.05);border-radius:16px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:45px;height:45px;background:rgba(245,158,11,0.1);color:#f59e0b;">
                        <i class="bi bi-arrow-repeat fs-5"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block">Disewa</small>
                        <span class="text-white fw-bold fs-5">{{ $alats->where('status','disewa')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 p-3" style="background:rgba(255,255,255,0.05);border-radius:16px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:45px;height:45px;background:rgba(239,68,68,0.1);color:#ef4444;">
                        <i class="bi bi-wrench fs-5"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block">Maintenance</small>
                        <span class="text-white fw-bold fs-5">{{ $alats->where('status','maintenance')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="card border-0" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr style="background:rgba(15,23,42,0.8);">
                            <th class="text-secondary fw-normal ps-4 py-3" style="font-size:12px;letter-spacing:0.5px;">NAMA ALAT</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">KODE</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">LOKASI</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">HOUR METER</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">STATUS</th>
                            <th class="text-secondary fw-normal py-3 text-center" style="font-size:12px;letter-spacing:0.5px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alats as $alat)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.05);transition:0.2s;"
                            onmouseover="this.style.background='rgba(37,99,235,0.05)'"
                            onmouseout="this.style.background='transparent'">

                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-3 d-flex align-items-center justify-content-center"
                                         style="width:40px;height:40px;background:rgba(255,255,255,0.07);color:#fff;border:1px solid rgba(255,255,255,0.1);">
                                        <i class="bi bi-truck"></i>
                                    </div>
                                    <span class="text-white fw-semibold" style="font-size:14px;">{{ $alat->nama_alat }}</span>
                                </div>
                            </td>

                            <td>
                                <code class="px-2 py-1 rounded" style="background:rgba(37,99,235,0.1);color:#60a5fa;font-size:12px;border:1px solid rgba(37,99,235,0.2);">
                                    {{ $alat->kode_alat }}
                                </code>
                            </td>

                            <td class="text-secondary" style="font-size:13px;">
                                <i class="bi bi-geo-alt me-1"></i>{{ $alat->lokasi ?? '-' }}
                            </td>

                            <td class="text-secondary" style="font-size:13px;">
                                <span class="text-white fw-bold">{{ number_format($alat->hour_meter) }}</span> <small>HM</small>
                            </td>

                            <td>
                                @php
                                    $status = $alat->status;
                                    $color = match($status) {
                                        'tersedia' => ['#16a34a', 'rgba(22,163,74,0.15)', 'bi-check-circle-fill'],
                                        'disewa' => ['#f59e0b', 'rgba(245,158,11,0.15)', 'bi-arrow-repeat'],
                                        'maintenance' => ['#ef4444', 'rgba(239,68,68,0.15)', 'bi-wrench-adjustable'],
                                        default => ['#94a3b8', 'rgba(148,163,184,0.15)', 'bi-question-circle']
                                    };
                                @endphp
                                <span class="badge px-3 py-2 d-inline-flex align-items-center gap-2"
                                      style="background:{{ $color[1] }}; color:{{ $color[0] }}; border:1px solid {{ $color[0] }}40; border-radius:10px; font-size:12px;">
                                    <i class="bi {{ $color[2] }}" style="font-size:10px;"></i>
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('alat.edit', $alat->id) }}"
                                       class="btn btn-sm d-flex align-items-center justify-content-center"
                                       style="width:34px;height:34px;background:rgba(37,99,235,0.1);color:#3b82f6;border:1px solid rgba(37,99,235,0.2);border-radius:8px;">
                                        <i class="bi bi-pencil-fill" style="font-size:12px;"></i>
                                    </a>
                                    <form action="{{ route('alat.delete', $alat->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm d-flex align-items-center justify-content-center"
                                                style="width:34px;height:34px;background:rgba(239,68,68,0.1);color:#ef4444;border:1px solid rgba(239,68,68,0.2);border-radius:8px;"
                                                onclick="return confirm('Yakin ingin menghapus data alat ini?')">
                                            <i class="bi bi-trash-fill" style="font-size:12px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-5">
                                <i class="bi bi-box-seam d-block mb-2" style="font-size:40px;opacity:0.3;"></i>
                                <span style="font-size:14px;">Belum ada data alat berat</span>
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