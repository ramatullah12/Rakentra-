@extends('layout.admin')

@section('title', 'Edit Booking')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('booking.index') }}" class="btn d-flex align-items-center justify-content-center"
           style="width:40px;height:40px;background:rgba(255,255,255,0.07);border-radius:12px;color:#94a3b8;border:1px solid rgba(255,255,255,0.08);">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div>
            <h4 class="fw-bold text-white mb-0">Edit Booking</h4>
            <small class="text-secondary">Update reservasi: <span class="text-white">#{{ $booking->id }}</span></small>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">

            @if ($errors->any())
            <div class="alert border-0 mb-4 d-flex align-items-start gap-3"
                 style="background:rgba(220,38,38,0.12);border-left:4px solid #dc2626 !important;border-radius:14px;">
                <i class="bi bi-exclamation-triangle-fill text-danger mt-1"></i>
                <div>
                    <strong class="text-danger">Kesalahan Input:</strong>
                    <ul class="mb-0 mt-1 text-danger" style="font-size:13px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <div class="card border-0" style="background:rgba(255,255,255,0.05);border-radius:24px;border:1px solid rgba(255,255,255,0.07);overflow:hidden;">
                <div class="row g-0">
                    {{-- Side Info --}}
                    <div class="col-md-3" style="background:rgba(255,255,255,0.02);border-right:1px solid rgba(255,255,255,0.05);">
                        <div class="p-4">
                            <div class="mb-4">
                                <small class="text-secondary d-block mb-1">DIBUAT PADA</small>
                                <span class="text-white fw-semibold" style="font-size:13px;">{{ $booking->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="mb-4">
                                <small class="text-secondary d-block mb-1">PELANGGAN</small>
                                <span class="text-white fw-bold" style="font-size:15px;">{{ $booking->pelanggan->nama }}</span>
                            </div>
                            <div class="mb-4">
                                <small class="text-secondary d-block mb-1">ALAT BERAT</small>
                                <span class="text-white fw-bold d-block" style="font-size:15px;">{{ $booking->alat->nama_alat }}</span>
                                <code class="text-info" style="font-size:11px;">{{ $booking->alat->kode_alat }}</code>
                            </div>
                        </div>
                    </div>

                    {{-- Form Content --}}
                    <div class="col-md-9">
                        <div class="p-4 p-md-5">
                            <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row g-4">
                                    {{-- Status Utama --}}
                                    <div class="col-12 mb-2">
                                        <label class="form-label text-secondary fw-bold" style="font-size:12px;letter-spacing:0.5px;">STATUS BOOKING</label>
                                        <div class="row g-2">
                                            @foreach(['pending' => ['Pending','#f59e0b'], 'disetujui' => ['Disetujui','#3b82f6'], 'berjalan' => ['Berjalan','#10b981'], 'selesai' => ['Selesai','#6366f1'], 'dibatalkan' => ['Batal','#ef4444']] as $val => $opt)
                                            <div class="col">
                                                <input type="radio" name="status" id="st_{{ $val }}" value="{{ $val }}"
                                                       class="d-none status-radio"
                                                       {{ old('status', $booking->status) == $val ? 'checked' : '' }}>
                                                <label for="st_{{ $val }}" class="d-flex flex-column align-items-center justify-content-center p-2 rounded-3 gap-1 status-label text-center h-100"
                                                       style="border:1px solid rgba(255,255,255,0.08);cursor:pointer;transition:0.2s;background:rgba(255,255,255,0.03);">
                                                    <div class="rounded-circle mb-1" style="width:8px;height:8px;background:{{ $opt[1] }};"></div>
                                                    <span class="text-white" style="font-size:11px;font-weight:600;">{{ $opt[0] }}</span>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-secondary" style="font-size:13px;font-weight:600;">PELANGGAN</label>
                                        <select name="pelanggan_id" class="form-select" style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;">
                                            @foreach($pelanggans as $pelanggan)
                                                <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id', $booking->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
                                                    {{ $pelanggan->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-secondary" style="font-size:13px;font-weight:600;">ALAT BERAT</label>
                                        <select name="alat_id" class="form-select" style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;">
                                            @foreach($alats as $alat)
                                                <option value="{{ $alat->id }}" {{ old('alat_id', $booking->alat_id) == $alat->id ? 'selected' : '' }}>
                                                    {{ $alat->nama_alat }} ({{ $alat->kode_alat }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-secondary" style="font-size:13px;font-weight:600;">TGL BOOKING</label>
                                        <input type="date" name="tanggal_booking" class="form-control"
                                               style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;"
                                               value="{{ old('tanggal_booking', $booking->tanggal_booking) }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-secondary" style="font-size:13px;font-weight:600;">TGL MULAI</label>
                                        <input type="date" name="tanggal_mulai" class="form-control"
                                               style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;"
                                               value="{{ old('tanggal_mulai', $booking->tanggal_mulai) }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-secondary" style="font-size:13px;font-weight:600;">TGL SELESAI</label>
                                        <input type="date" name="tanggal_selesai" class="form-control"
                                               style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;"
                                               value="{{ old('tanggal_selesai', $booking->tanggal_selesai) }}">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label text-secondary" style="font-size:13px;font-weight:600;">KETERANGAN</label>
                                        <textarea name="keterangan" rows="4" class="form-control"
                                                  style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;"
                                                  placeholder="Tambahkan catatan khusus...">{{ old('keterangan', $booking->keterangan) }}</textarea>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-5">
                                    <a href="{{ route('booking.index') }}" class="btn px-4"
                                       style="background:rgba(255,255,255,0.05);color:#94a3b8;border:1px solid rgba(255,255,255,0.1);border-radius:12px;">
                                        <i class="bi bi-x-lg me-2"></i>Batal
                                    </a>
                                    <button type="submit" class="btn px-5 fw-bold"
                                            style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:45px;box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">
                                        <i class="bi bi-cloud-arrow-up-fill me-2"></i>Update Booking
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
.status-radio:checked + .status-label {
    border-color: #2563eb !important;
    background: rgba(37,99,235,0.12) !important;
    box-shadow: inset 0 0 10px rgba(37,99,235,0.1);
}
</style>

@endsection