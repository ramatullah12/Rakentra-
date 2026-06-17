@extends('layout.admin')

@section('title','Tambah Booking')

@section('content')

<div class="container-fluid">

    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('booking.index') }}" class="btn d-flex align-items-center justify-content-center"
           style="width:40px;height:40px;background:rgba(255,255,255,0.07);border-radius:12px;color:#94a3b8;border:1px solid rgba(255,255,255,0.08);">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div>
            <h4 class="fw-bold text-white mb-0">Tambah Booking</h4>
            <small class="text-secondary">Buat permintaan sewa alat berat baru</small>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            @if($errors->any())
            <div class="alert border-0 mb-4 d-flex align-items-start gap-3"
                 style="background:rgba(220,38,38,0.12);border-left:4px solid #dc2626 !important;border-radius:14px;">
                <i class="bi bi-exclamation-triangle-fill text-danger mt-1"></i>
                <div>
                    <strong class="text-danger">Terdapat kesalahan input:</strong>
                    <ul class="mb-0 mt-1 text-danger" style="font-size:13px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <div class="card border-0" style="background:rgba(255,255,255,0.05);border-radius:20px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center gap-3 mb-4 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.07);">
                        <div class="d-flex align-items-center justify-content-center rounded-3"
                             style="width:48px;height:48px;background:linear-gradient(135deg,#2563eb,#1d4ed8);">
                            <i class="bi bi-calendar-plus-fill text-white fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-0">Form Booking Baru</h6>
                            <small class="text-secondary">Isi detail permintaan sewa</small>
                        </div>
                    </div>

                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">

                            {{-- Pelanggan & Alat --}}
                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">PELANGGAN <span class="text-danger">*</span></label>
                                <select name="pelanggan_id" class="form-select @error('pelanggan_id') is-invalid @enderror">
                                    <option value="">— Pilih Pelanggan —</option>
                                    @foreach($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                                            {{ $pelanggan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">ALAT BERAT <span class="text-danger">*</span></label>
                                <select name="alat_id" class="form-select @error('alat_id') is-invalid @enderror">
                                    <option value="">— Pilih Alat —</option>
                                    @foreach($alats as $alat)
                                        <option value="{{ $alat->id }}" {{ old('alat_id') == $alat->id ? 'selected' : '' }}>
                                            {{ $alat->nama_alat }} ({{ $alat->kode_alat }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Divider --}}
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-2 py-1">
                                    <i class="bi bi-calendar3 text-secondary" style="font-size:14px;"></i>
                                    <small class="text-secondary fw-semibold" style="letter-spacing:0.5px;">PERIODE SEWA</small>
                                    <div class="flex-fill" style="border-top:1px solid rgba(255,255,255,0.07);"></div>
                                </div>
                            </div>

                            {{-- Tanggal --}}
                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">TGL BOOKING <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_booking"
                                       class="form-control @error('tanggal_booking') is-invalid @enderror"
                                       value="{{ old('tanggal_booking') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">TGL MULAI <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_mulai"
                                       class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                       value="{{ old('tanggal_mulai') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">TGL SELESAI <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_selesai"
                                       class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                       value="{{ old('tanggal_selesai') }}">
                            </div>

                            {{-- Keterangan --}}
                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">KETERANGAN</label>
                                <textarea name="keterangan" rows="4" class="form-control"
                                          placeholder="Tambahkan catatan atau keterangan booking...">{{ old('keterangan') }}</textarea>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.07);">
                            <a href="{{ route('booking.index') }}" class="btn px-4"
                               style="background:rgba(255,255,255,0.07);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);border-radius:12px;">
                                <i class="bi bi-x-lg me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn px-5 fw-semibold"
                                    style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;padding:10px 30px;">
                                <i class="bi bi-floppy-fill me-2"></i>Simpan Booking
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection