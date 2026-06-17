@extends('layout.admin')

@section('title', 'Data Booking')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-white mb-1">Data Booking</h4>
            <small class="text-secondary"><i class="bi bi-calendar-check me-1"></i>Manajemen penyewaan unit alat berat</small>
        </div>
        <a href="{{ route('booking.create') }}" class="btn fw-semibold px-4"
           style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;padding:10px 25px;">
            <i class="bi bi-calendar-plus me-2"></i>Buat Booking
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

    {{-- Search & Filter --}}
    <div class="card border-0 mb-4" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <form action="{{ route('booking.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">CARI PELANGGAN</label>
                        <div class="input-group shadow-sm" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                            <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="form-control border-0 text-white"
                                   style="background:transparent;box-shadow:none;height:45px;"
                                   placeholder="Ketik nama pelanggan...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">STATUS</label>
                        <select name="status" class="form-select"
                                style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#e2e8f0;height:45px;">
                            <option value="">Semua Status</option>
                            @foreach(['pending' => 'Pending', 'disetujui' => 'Disetujui', 'berjalan' => 'Berjalan', 'selesai' => 'Selesai', 'dibatalkan' => 'Dibatalkan'] as $val => $label)
                                <option value="{{ $val }}" {{ request('status') == $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end gap-2">
                        <button type="submit" class="btn fw-semibold flex-fill d-flex align-items-center justify-content-center gap-2"
                                style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:45px;">
                            <i class="bi bi-filter"></i> Terapkan Filter
                        </button>
                        <a href="{{ route('booking.index') }}" class="btn d-flex align-items-center justify-content-center"
                           style="background:rgba(255,255,255,0.07);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);border-radius:12px;width:45px;height:45px;">
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
                            <th class="text-secondary fw-normal ps-4 py-3" style="font-size:11px;letter-spacing:1px;width:60px;">ID</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">PELANGGAN</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">UNIT ALAT</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">PERIODE</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">STATUS</th>
                            <th class="text-secondary fw-normal py-3 text-center" style="font-size:11px;letter-spacing:1px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $i => $booking)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.05);transition:0.2s;"
                            onmouseover="this.style.background='rgba(37,99,235,0.05)'"
                            onmouseout="this.style.background='transparent'">

                            <td class="ps-4">
                                <span class="text-secondary" style="font-size:13px;">#{{ $booking->id }}</span>
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:32px;height:32px;background:rgba(37,99,235,0.1);color:#3b82f6;font-size:12px;font-weight:bold;">
                                        {{ strtoupper(substr($booking->pelanggan->nama, 0, 1)) }}
                                    </div>
                                    <span class="text-white fw-semibold" style="font-size:14px;">{{ $booking->pelanggan->nama }}</span>
                                </div>
                            </td>

                            <td>
                                <div class="text-white" style="font-size:14px;">{{ $booking->alat->nama_alat }}</div>
                                <small class="text-secondary" style="font-size:11px;">{{ $booking->alat->kode_alat }}</small>
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="text-center" style="min-width:70px;">
                                        <div class="text-white fw-bold" style="font-size:13px;">{{ \Carbon\Carbon::parse($booking->tanggal_mulai)->format('d M') }}</div>
                                        <div class="text-secondary" style="font-size:10px;">{{ \Carbon\Carbon::parse($booking->tanggal_mulai)->format('Y') }}</div>
                                    </div>
                                    <i class="bi bi-arrow-right text-secondary" style="font-size:12px;"></i>
                                    <div class="text-center" style="min-width:70px;">
                                        <div class="text-white fw-bold" style="font-size:13px;">{{ \Carbon\Carbon::parse($booking->tanggal_selesai)->format('d M') }}</div>
                                        <div class="text-secondary" style="font-size:10px;">{{ \Carbon\Carbon::parse($booking->tanggal_selesai)->format('Y') }}</div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                @php
                                    $status = $booking->status;
                                    $color = match($status) {
                                        'pending' => ['#f59e0b', 'rgba(245,158,11,0.15)', 'bi-clock-history'],
                                        'disetujui' => ['#3b82f6', 'rgba(59,130,246,0.15)', 'bi-check-circle'],
                                        'berjalan' => ['#10b981', 'rgba(16,185,129,0.15)', 'bi-play-circle'],
                                        'selesai' => ['#6366f1', 'rgba(99,102,241,0.15)', 'bi-flag'],
                                        'dibatalkan' => ['#ef4444', 'rgba(239,68,68,0.15)', 'bi-x-circle'],
                                        default => ['#94a3b8', 'rgba(148,163,184,0.15)', 'bi-question-circle']
                                    };
                                @endphp
                                <span class="badge px-3 py-2 d-inline-flex align-items-center gap-2"
                                      style="background:{{ $color[1] }}; color:{{ $color[0] }}; border:1px solid {{ $color[0] }}40; border-radius:10px; font-size:11px;">
                                    <i class="bi {{ $color[2] }}" style="font-size:10px;"></i>
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('booking.edit', $booking->id) }}"
                                       class="btn btn-sm d-flex align-items-center justify-content-center"
                                       style="width:34px;height:34px;background:rgba(37,99,235,0.1);color:#3b82f6;border:1px solid rgba(37,99,235,0.2);border-radius:8px;"
                                       title="Edit Booking">
                                        <i class="bi bi-pencil-fill" style="font-size:12px;"></i>
                                    </a>
                                    <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm d-flex align-items-center justify-content-center"
                                                style="width:34px;height:34px;background:rgba(239,68,68,0.1);color:#ef4444;border:1px solid rgba(239,68,68,0.2);border-radius:8px;"
                                                onclick="return confirm('Yakin ingin menghapus booking ini?')"
                                                title="Hapus Booking">
                                            <i class="bi bi-trash-fill" style="font-size:12px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-5">
                                <i class="bi bi-calendar-x d-block mb-2" style="font-size:40px;opacity:0.3;"></i>
                                <span style="font-size:14px;">Tidak ada data booking yang ditemukan</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($bookings, 'links'))
            <div class="p-4" style="border-top:1px solid rgba(255,255,255,0.05);">
                {{ $bookings->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </div>

</div>

@endsection