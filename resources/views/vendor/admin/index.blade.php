@extends('layout.admin')

@section('title', 'Data Vendor')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-white mb-1">Data Vendor & Mitra</h4>
            <small class="text-secondary"><i class="bi bi-buildings me-1"></i>Manajemen partner penyedia unit dan sparepart</small>
        </div>
        <a href="{{ route('vendor.create') }}" class="btn fw-semibold px-4"
           style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;padding:10px 25px;">
            <i class="bi bi-plus-lg me-2"></i>Tambah Vendor
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
    <div class="card border-0 mb-4 shadow-sm" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
        <div class="card-body p-4">
            <form action="{{ route('vendor.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group" style="background:#0f172a;border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                            <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="form-control border-0 text-white"
                                   style="background:transparent;box-shadow:none;height:50px;"
                                   placeholder="Cari nama vendor atau mitra...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select"
                                style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn fw-semibold flex-fill"
                                style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:50px;">
                            <i class="bi bi-funnel me-1"></i>Filter
                        </button>
                        <a href="{{ route('vendor.index') }}" class="btn d-flex align-items-center justify-content-center"
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
                            <th class="text-secondary fw-normal ps-4 py-3" style="font-size:11px;letter-spacing:1px;width:80px;">NO</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">NAMA VENDOR</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">KONTAK</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">ALAMAT</th>
                            <th class="text-secondary fw-normal py-3" style="font-size:11px;letter-spacing:1px;">STATUS</th>
                            <th class="text-secondary fw-normal py-3 text-center" style="font-size:11px;letter-spacing:1px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vendors as $i => $vendor)
                        <tr style="border-bottom:1px solid rgba(255,255,255,0.05);transition:0.2s;"
                            onmouseover="this.style.background='rgba(37,99,235,0.05)'"
                            onmouseout="this.style.background='transparent'">

                            <td class="ps-4">
                                <span class="text-secondary" style="font-size:13px;">{{ $vendors->firstItem() + $i }}</span>
                            </td>

                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:38px;height:38px;background:rgba(255,255,255,0.07);color:#fff;border:1px solid rgba(255,255,255,0.1);">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <span class="text-white fw-bold" style="font-size:14px;">{{ $vendor->nama_vendor }}</span>
                                </div>
                            </td>

                            <td>
                                <div class="text-white fw-semibold" style="font-size:13px;">{{ $vendor->hp }}</div>
                                <small class="text-secondary" style="font-size:11px;">Telepon / WA</small>
                            </td>

                            <td class="text-secondary" style="font-size:13px;">
                                <i class="bi bi-geo-alt me-1"></i>{{ Str::limit($vendor->alamat, 40) }}
                            </td>

                            <td>
                                @if($vendor->status == 'aktif')
                                    <span class="badge px-3 py-2 d-inline-flex align-items-center gap-2"
                                          style="background:rgba(22,163,74,0.15); color:#16a34a; border:1px solid rgba(22,163,74,0.3); border-radius:10px; font-size:11px;">
                                        <i class="bi bi-check-circle-fill" style="font-size:10px;"></i>
                                        Aktif
                                    </span>
                                @else
                                    <span class="badge px-3 py-2 d-inline-flex align-items-center gap-2"
                                          style="background:rgba(239,68,68,0.15); color:#ef4444; border:1px solid rgba(239,68,68,0.3); border-radius:10px; font-size:11px;">
                                        <i class="bi bi-x-circle-fill" style="font-size:10px;"></i>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('vendor.edit', $vendor->id) }}"
                                       class="btn btn-sm d-flex align-items-center justify-content-center"
                                       style="width:34px;height:34px;background:rgba(37,99,235,0.1);color:#3b82f6;border:1px solid rgba(37,99,235,0.2);border-radius:8px;"
                                       title="Edit Vendor">
                                        <i class="bi bi-pencil-fill" style="font-size:12px;"></i>
                                    </a>
                                    <form action="{{ route('vendor.destroy', $vendor->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm d-flex align-items-center justify-content-center"
                                                style="width:34px;height:34px;background:rgba(239,68,68,0.1);color:#ef4444;border:1px solid rgba(239,68,68,0.2);border-radius:8px;"
                                                onclick="return confirm('Yakin ingin menghapus vendor ini?')"
                                                title="Hapus Vendor">
                                            <i class="bi bi-trash-fill" style="font-size:12px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-5">
                                <i class="bi bi-buildings d-block mb-2" style="font-size:40px;opacity:0.3;"></i>
                                <span style="font-size:14px;">Data vendor tidak tersedia</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(method_exists($vendors, 'links'))
            <div class="p-4" style="border-top:1px solid rgba(255,255,255,0.05);">
                {{ $vendors->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </div>

</div>

@endsection