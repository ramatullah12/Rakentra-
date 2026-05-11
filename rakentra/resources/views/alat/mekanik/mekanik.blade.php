@extends('layout.mekanik')

@section('title', 'Data Alat Berat')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-white mb-1">Monitoring Alat Berat</h4>
            <small class="text-secondary"><i class="bi bi-truck me-1"></i>Informasi kondisi dan lokasi unit alat berat</small>
        </div>
    </div>

    {{-- Search Filter --}}
    <div class="card border-0 mb-4" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <form action="{{ route('alat.mekanik') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-9">
                        <div class="input-group" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                            <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="form-control border-0 text-white"
                                   style="background:transparent;box-shadow:none;height:50px;"
                                   placeholder="Cari berdasarkan nama atau kode alat...">
                        </div>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn fw-semibold flex-fill"
                                style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:50px;">
                            <i class="bi bi-search me-1"></i>Cari
                        </button>
                        <a href="{{ route('alat.mekanik') }}" class="btn d-flex align-items-center justify-content-center"
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
                            <th class="text-secondary fw-normal ps-4 py-3" style="font-size:12px;letter-spacing:0.5px;">NAMA ALAT</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">KODE</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">LOKASI</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">HOUR METER</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">STATUS</th>
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

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-5">
                                <i class="bi bi-box-seam d-block mb-2" style="font-size:40px;opacity:0.3;"></i>
                                <span style="font-size:14px;">Belum ada data alat berat</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(method_exists($alats, 'links'))
            <div class="p-4" style="border-top:1px solid rgba(255,255,255,0.05);">
                {{ $alats->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </div>

</div>

@endsection