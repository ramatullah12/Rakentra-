@extends('layout.admin')

@section('title','Data Pelanggan')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-white mb-1">Data Pelanggan</h4>
            <small class="text-secondary"><i class="bi bi-people me-1"></i>Kelola data pelanggan sistem</small>
        </div>
        <a href="{{ route('pelanggan.create') }}" class="btn fw-semibold px-4"
           style="background:linear-gradient(135deg,#16a34a,#15803d);color:#fff;border-radius:12px;padding:10px 20px;">
            <i class="bi bi-plus-lg me-2"></i>Tambah Pelanggan
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

    {{-- Search --}}
    <div class="card border-0 mb-4" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <form method="GET" action="{{ route('pelanggan.index') }}">
                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <div class="input-group" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                            <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="form-control border-0 text-white"
                                   style="background:transparent;box-shadow:none;"
                                   placeholder="Cari nama pelanggan...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select" style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#e2e8f0;">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status')=='aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ request('status')=='nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn fw-semibold flex-fill"
                                style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;">
                            <i class="bi bi-funnel me-1"></i>Filter
                        </button>
                        <a href="{{ route('pelanggan.index') }}" class="btn"
                           style="background:rgba(255,255,255,0.07);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);border-radius:12px;">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Table --}}
    <div class="card border-0" style="background:rgba(255,255,255,0.05);border-radius:18px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr style="background:rgba(15,23,42,0.8);">
                            <th class="text-secondary fw-normal ps-4 py-3" style="font-size:12px;letter-spacing:0.5px;">NO</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">PELANGGAN</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">NO HP</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">ALAMAT</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:12px;letter-spacing:0.5px;">STATUS</th>
                            <th class="text-secondary fw-normal py-3 text-center" style="font-size:12px;letter-spacing:0.5px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $i => $d)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.05);transition:0.2s;"
                            onmouseover="this.style.background='rgba(37,99,235,0.05)'"
                            onmouseout="this.style.background='transparent'">

                            <td class="ps-4 text-secondary" style="font-size:13px;">
                                {{ method_exists($data,'firstItem') ? $data->firstItem() + $i : $i+1 }}
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                         style="width:36px;height:36px;background:linear-gradient(135deg,#16a34a,#15803d);font-size:14px;color:#fff;flex-shrink:0;">
                                        {{ strtoupper(substr($d->nama, 0, 1)) }}
                                    </div>
                                    <span class="text-white fw-semibold" style="font-size:14px;">{{ $d->nama }}</span>
                                </div>
                            </td>

                            <td class="text-secondary" style="font-size:13px;">
                                <i class="bi bi-telephone me-1"></i>{{ $d->hp ?? '-' }}
                            </td>

                            <td class="text-secondary" style="font-size:13px;max-width:200px;">
                                {{ Str::limit($d->alamat ?? '-', 45) }}
                            </td>

                            <td>
                                @php $st = $d->status ?? 'aktif'; @endphp
                                <span class="badge px-3 py-2"
                                      style="background:{{ $st=='aktif' ? 'rgba(22,163,74,0.15)' : 'rgba(220,38,38,0.15)' }};
                                             color:{{ $st=='aktif' ? '#34d399' : '#f87171' }};
                                             border:1px solid {{ $st=='aktif' ? 'rgba(22,163,74,0.3)' : 'rgba(220,38,38,0.3)' }};
                                             border-radius:8px;font-size:12px;">
                                    <i class="bi {{ $st=='aktif' ? 'bi-circle-fill' : 'bi-circle' }} me-1" style="font-size:8px;"></i>
                                    {{ ucfirst($st) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('pelanggan.edit', $d->id) }}"
                                   class="btn btn-sm d-inline-flex align-items-center gap-1"
                                   style="background:rgba(37,99,235,0.15);color:#60a5fa;border:1px solid rgba(37,99,235,0.3);border-radius:10px;padding:6px 14px;font-size:13px;">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-5">
                                <i class="bi bi-people d-block mb-2" style="font-size:40px;opacity:0.3;"></i>
                                <span style="font-size:14px;">Data pelanggan belum tersedia</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($data, 'links'))
            <div class="p-4" style="border-top:1px solid rgba(255,255,255,0.05);">
                {{ $data->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </div>

</div>

@endsection