@extends('layout.admin')

@section('title', 'Data Tagihan')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-white mb-1">Monitoring Tagihan</h4>
            <small class="text-secondary"><i class="bi bi-wallet2 me-1"></i>Kelola invoice dan status pembayaran pelanggan</small>
        </div>
        <a href="{{ route('tagihan.create') }}" class="btn fw-semibold px-4"
           style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;padding:10px 25px;">
            <i class="bi bi-plus-circle me-2"></i>Buat Tagihan
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
                        <i class="bi bi-receipt-cutoff fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">TOTAL INVOICE</small>
                        <h3 class="text-white fw-bold mb-0">{{ $tagihans->total() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 p-3 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(22,163,74,0.1);color:#16a34a;">
                        <i class="bi bi-cash-stack fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">DIBAYAR</small>
                        <h3 class="text-success fw-bold mb-0">{{ $tagihans->where('status_tagihan','dibayar')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 p-3 h-100" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px;height:48px;background:rgba(245,158,11,0.1);color:#f59e0b;">
                        <i class="bi bi-hourglass-split fs-4"></i>
                    </div>
                    <div>
                        <small class="text-secondary d-block" style="font-size:12px;font-weight:600;">PENDING</small>
                        <h3 class="text-warning fw-bold mb-0">{{ $tagihans->where('status_tagihan','pending')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter --}}
    <div class="card border-0 mb-4" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <form action="{{ route('tagihan.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-9">
                        <div class="input-group" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                            <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="form-control border-0 text-white"
                                   style="background:transparent;box-shadow:none;height:50px;"
                                   placeholder="Cari nomor tagihan atau pelanggan...">
                        </div>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn fw-semibold flex-fill"
                                style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:50px;">
                            <i class="bi bi-filter me-1"></i>Filter
                        </button>
                        <a href="{{ route('tagihan.index') }}" class="btn d-flex align-items-center justify-content-center"
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
                            <th class="text-secondary fw-normal ps-4 py-3" style="font-size:11px;letter-spacing:1px;">NO INVOICE</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">PELANGGAN</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">UNIT ALAT</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">JATUH TEMPO</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">TOTAL</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">STATUS</th>
                            <th class="text-secondary fw-normal py-3 text-center" style="font-size:11px;letter-spacing:1px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tagihans as $i => $tagihan)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.05);transition:0.2s;"
                            onmouseover="this.style.background='rgba(37,99,235,0.05)'"
                            onmouseout="this.style.background='transparent'">

                            <td class="ps-4">
                                <div class="text-white fw-bold" style="font-size:14px;">{{ $tagihan->nomor_tagihan }}</div>
                                <small class="text-secondary" style="font-size:11px;">Tgl: {{ \Carbon\Carbon::parse($tagihan->tanggal_tagihan)->format('d/m/Y') }}</small>
                            </td>

                            <td>
                                <div class="text-white fw-semibold" style="font-size:14px;">{{ $tagihan->kontrak->booking->pelanggan->nama }}</div>
                            </td>

                            <td>
                                <div class="text-secondary" style="font-size:13px;"><i class="bi bi-truck me-1"></i>{{ $tagihan->kontrak->booking->alat->nama_alat }}</div>
                            </td>

                            <td>
                                <div class="text-white fw-semibold" style="font-size:13px;">{{ \Carbon\Carbon::parse($tagihan->jatuh_tempo)->format('d M Y') }}</div>
                                @if(\Carbon\Carbon::parse($tagihan->jatuh_tempo)->isPast() && $tagihan->status_tagihan != 'dibayar')
                                    <small class="text-danger" style="font-size:10px;font-weight:bold;">TERLAMBAT</small>
                                @endif
                            </td>

                            <td>
                                <span class="text-white fw-bold" style="font-size:15px;">Rp {{ number_format($tagihan->total,0,',','.') }}</span>
                            </td>

                            <td>
                                @php
                                    $status = $tagihan->status_tagihan;
                                    $color = match($status) {
                                        'dibayar' => ['#16a34a', 'rgba(22,163,74,0.15)', 'bi-check-circle-fill'],
                                        'pending' => ['#f59e0b', 'rgba(245,158,11,0.15)', 'bi-clock-history'],
                                        'jatuh_tempo' => ['#ef4444', 'rgba(239,68,68,0.15)', 'bi-exclamation-octagon'],
                                        default => ['#94a3b8', 'rgba(148,163,184,0.15)', 'bi-question-circle']
                                    };
                                @endphp
                                <span class="badge px-3 py-2 d-inline-flex align-items-center gap-2"
                                      style="background:{{ $color[1] }}; color:{{ $color[0] }}; border:1px solid {{ $color[0] }}40; border-radius:10px; font-size:11px;">
                                    <i class="bi {{ $color[2] }}" style="font-size:10px;"></i>
                                    {{ str_replace('_', ' ', ucfirst($status)) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('tagihan.faktur', $tagihan->id) }}"
                                       class="btn btn-sm d-flex align-items-center justify-content-center"
                                       style="width:34px;height:34px;background:rgba(14,165,233,0.1);color:#0ea5e9;border:1px solid rgba(14,165,233,0.2);border-radius:8px;"
                                       title="Lihat Faktur">
                                        <i class="bi bi-receipt" style="font-size:12px;"></i>
                                    </a>
                                    <a href="{{ route('tagihan.cetak', $tagihan->id) }}"
                                       class="btn btn-sm d-flex align-items-center justify-content-center"
                                       style="width:34px;height:34px;background:rgba(22,163,74,0.1);color:#16a34a;border:1px solid rgba(22,163,74,0.2);border-radius:8px;"
                                       title="Cetak">
                                        <i class="bi bi-printer-fill" style="font-size:12px;"></i>
                                    </a>
                                    <a href="{{ route('tagihan.edit', $tagihan->id) }}"
                                       class="btn btn-sm d-flex align-items-center justify-content-center"
                                       style="width:34px;height:34px;background:rgba(245,158,11,0.1);color:#f59e0b;border:1px solid rgba(245,158,11,0.2);border-radius:8px;"
                                       title="Edit">
                                        <i class="bi bi-pencil-fill" style="font-size:12px;"></i>
                                    </a>
                                    <form action="{{ route('tagihan.destroy', $tagihan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm d-flex align-items-center justify-content-center"
                                                style="width:34px;height:34px;background:rgba(239,68,68,0.1);color:#ef4444;border:1px solid rgba(239,68,68,0.2);border-radius:8px;"
                                                onclick="return confirm('Yakin ingin menghapus tagihan ini?')">
                                            <i class="bi bi-trash-fill" style="font-size:12px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-secondary py-5">
                                <i class="bi bi-receipt-cutoff d-block mb-2" style="font-size:40px;opacity:0.3;"></i>
                                <span style="font-size:14px;">Belum ada data tagihan yang diterbitkan</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(method_exists($tagihans, 'links'))
            <div class="p-4" style="border-top:1px solid rgba(255,255,255,0.05);">
                {{ $tagihans->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </div>

</div>

@endsection