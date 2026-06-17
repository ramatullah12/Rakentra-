@extends('layout.admin')

@section('title', 'Data Kontrak')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-white mb-1">Manajemen Kontrak</h4>
            <small class="text-secondary"><i class="bi bi-file-earmark-text me-1"></i>Kelola dokumen kontrak dan kesepakatan sewa</small>
        </div>
        <a href="{{ route('kontrak.create') }}" class="btn fw-semibold px-4"
           style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;padding:10px 25px;">
            <i class="bi bi-plus-lg me-2"></i>Buat Kontrak
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

    {{-- Filter --}}
    <div class="card border-0 mb-4" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <form action="{{ route('kontrak.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-5">
                        <div class="input-group" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                            <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="form-control border-0 text-white"
                                   style="background:transparent;box-shadow:none;height:50px;"
                                   placeholder="Cari nomor kontrak atau pelanggan...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select"
                                style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                    <div class="col-md-4 d-flex gap-2">
                        <button type="submit" class="btn fw-semibold flex-fill"
                                style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:50px;">
                            <i class="bi bi-funnel me-1"></i>Filter
                        </button>
                        <a href="{{ route('kontrak.index') }}" class="btn d-flex align-items-center justify-content-center"
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
                            <th class="text-secondary fw-normal ps-4 py-3" style="font-size:11px;letter-spacing:1px;">NO KONTRAK</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">PIHAK KONTRAK</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">TGL & DURASI</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">NILAI KONTRAK</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">DOKUMEN</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">STATUS</th>
                            <th class="text-secondary fw-normal py-3 text-center" style="font-size:11px;letter-spacing:1px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kontraks as $i => $kontrak)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.05);transition:0.2s;"
                            onmouseover="this.style.background='rgba(37,99,235,0.05)'"
                            onmouseout="this.style.background='transparent'">

                            <td class="ps-4">
                                <div class="text-white fw-bold" style="font-size:14px;">{{ $kontrak->nomor_kontrak }}</div>
                                <small class="text-secondary" style="font-size:11px;">#ID-{{ $kontrak->id }}</small>
                            </td>

                            <td>
                                <div class="text-white fw-semibold" style="font-size:14px;">{{ $kontrak->booking->pelanggan->nama }}</div>
                                <div class="text-secondary" style="font-size:12px;"><i class="bi bi-truck me-1"></i>{{ $kontrak->booking->alat->nama_alat }}</div>
                            </td>

                            <td>
                                <div class="text-white fw-semibold" style="font-size:13px;">{{ \Carbon\Carbon::parse($kontrak->tanggal_kontrak)->format('d M Y') }}</div>
                                <small class="text-info" style="font-size:11px;"><i class="bi bi-clock-history me-1"></i>{{ $kontrak->durasi }} Hari</small>
                            </td>

                            <td>
                                <span class="text-success fw-bold" style="font-size:15px;">Rp {{ number_format($kontrak->nilai_kontrak,0,',','.') }}</span>
                            </td>

                            <td>
                                <div class="d-flex gap-1">
                                    @if($kontrak->file_po)
                                        <a href="{{ $kontrak->file_po }}" target="_blank" class="btn btn-sm p-1" style="color:#3b82f6;" title="File PO">
                                            <i class="bi bi-file-earmark-text fs-5"></i>
                                        </a>
                                    @endif
                                    @if($kontrak->file_spk)
                                        <a href="{{ $kontrak->file_spk }}" target="_blank" class="btn btn-sm p-1" style="color:#10b981;" title="File SPK">
                                            <i class="bi bi-file-earmark-check fs-5"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('kontrak.spk',$kontrak->id) }}" target="_blank" class="btn btn-sm p-1" style="color:#ef4444;" title="Download PDF">
                                        <i class="bi bi-file-earmark-pdf fs-5"></i>
                                    </a>
                                </div>
                            </td>

                            <td>
                                @php
                                    $status = $kontrak->status;
                                    $color = match($status) {
                                        'aktif' => ['#16a34a', 'rgba(22,163,74,0.15)', 'bi-lightning-fill'],
                                        'selesai' => ['#3b82f6', 'rgba(59,130,246,0.15)', 'bi-check-all'],
                                        'dibatalkan' => ['#ef4444', 'rgba(239,68,68,0.15)', 'bi-x-octagon'],
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
                                    <a href="{{ route('kontrak.edit',$kontrak->id) }}"
                                       class="btn btn-sm d-flex align-items-center justify-content-center"
                                       style="width:34px;height:34px;background:rgba(37,99,235,0.1);color:#3b82f6;border:1px solid rgba(37,99,235,0.2);border-radius:8px;">
                                        <i class="bi bi-pencil-fill" style="font-size:12px;"></i>
                                    </a>
                                    <form action="{{ route('kontrak.destroy',$kontrak->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm d-flex align-items-center justify-content-center"
                                                style="width:34px;height:34px;background:rgba(239,68,68,0.1);color:#ef4444;border:1px solid rgba(239,68,68,0.2);border-radius:8px;"
                                                onclick="return confirm('Yakin ingin menghapus kontrak ini?')">
                                            <i class="bi bi-trash-fill" style="font-size:12px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-secondary py-5">
                                <i class="bi bi-file-earmark-x d-block mb-2" style="font-size:40px;opacity:0.3;"></i>
                                <span style="font-size:14px;">Belum ada data kontrak yang tersimpan</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(method_exists($kontraks, 'links'))
            <div class="p-4" style="border-top:1px solid rgba(255,255,255,0.05);">
                {{ $kontraks->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </div>

</div>

@endsection