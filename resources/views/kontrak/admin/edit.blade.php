@extends('layout.admin')

@section('title', 'Edit Kontrak')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('kontrak.index') }}" class="btn d-flex align-items-center justify-content-center"
           style="width:40px;height:40px;background:rgba(255,255,255,0.07);border-radius:12px;color:#94a3b8;border:1px solid rgba(255,255,255,0.08);">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div>
            <h4 class="fw-bold text-white mb-0">Edit Kontrak</h4>
            <small class="text-secondary">Update data kontrak: <span class="text-white">{{ $kontrak->nomor_kontrak }}</span></small>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">

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

            <div class="card border-0" style="background:rgba(255,255,255,0.05);border-radius:24px;border:1px solid rgba(255,255,255,0.07);">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('kontrak.update', $kontrak->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">
                            {{-- Section 1: Relasi & Status --}}
                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">REFERENSI BOOKING <span class="text-danger">*</span></label>
                                <select name="booking_id" required class="form-select"
                                        style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:55px;">
                                    @foreach($bookings as $booking)
                                        <option value="{{ $booking->id }}" {{ old('booking_id', $kontrak->booking_id) == $booking->id ? 'selected' : '' }}>
                                            {{ $booking->pelanggan->nama }} - {{ $booking->alat->nama_alat }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">STATUS KONTRAK <span class="text-danger">*</span></label>
                                <select name="status" required class="form-select"
                                        style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:55px;">
                                    @foreach(['aktif' => 'Aktif', 'selesai' => 'Selesai', 'dibatalkan' => 'Dibatalkan'] as $val => $label)
                                        <option value="{{ $val }}" {{ old('status', $kontrak->status) == $val ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Section 2: Detail Waktu & Nilai --}}
                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">TANGGAL KONTRAK <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_kontrak" required class="form-control"
                                       style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;height:50px;"
                                       value="{{ old('tanggal_kontrak', $kontrak->tanggal_kontrak) }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">DURASI (HARI) <span class="text-danger">*</span></label>
                                <div class="input-group" style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;overflow:hidden;">
                                    <input type="number" name="durasi" required class="form-control border-0 text-white"
                                           style="background:transparent;box-shadow:none;height:50px;"
                                           value="{{ old('durasi', $kontrak->durasi) }}">
                                    <span class="input-group-text border-0 text-secondary" style="background:transparent;">Hari</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">NILAI KONTRAK (RP) <span class="text-danger">*</span></label>
                                <div class="input-group" style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;overflow:hidden;">
                                    <span class="input-group-text border-0 text-secondary" style="background:transparent;">Rp</span>
                                    <input type="number" name="nilai_kontrak" required class="form-control border-0 text-white"
                                           style="background:transparent;box-shadow:none;height:50px;"
                                           value="{{ old('nilai_kontrak', $kontrak->nilai_kontrak) }}">
                                </div>
                            </div>

                            {{-- Section 3: Dokumen Lampiran --}}
                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">DOKUMEN PO (PURCHASE ORDER)</label>
                                <div class="p-3 rounded-4" style="background:rgba(255,255,255,0.02); border:1px dashed rgba(255,255,255,0.1);">
                                    <input type="file" name="file_po" class="form-control border-0 text-secondary"
                                           style="background:transparent;font-size:13px;" accept=".pdf,.jpg,.jpeg,.png">
                                    @if($kontrak->file_po)
                                        <div class="mt-2 d-flex align-items-center gap-2">
                                            <i class="bi bi-file-earmark-text text-primary"></i>
                                            <a href="{{ $kontrak->file_po }}" target="_blank" class="text-decoration-none text-info" style="font-size:12px;">Lihat PO Saat Ini</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">DOKUMEN SPK (SURAT PERINTAH KERJA)</label>
                                <div class="p-3 rounded-4" style="background:rgba(255,255,255,0.02); border:1px dashed rgba(255,255,255,0.1);">
                                    <input type="file" name="file_spk" class="form-control border-0 text-secondary"
                                           style="background:transparent;font-size:13px;" accept=".pdf,.jpg,.jpeg,.png">
                                    @if($kontrak->file_spk)
                                        <div class="mt-2 d-flex align-items-center gap-2">
                                            <i class="bi bi-file-earmark-check text-success"></i>
                                            <a href="{{ $kontrak->file_spk }}" target="_blank" class="text-decoration-none text-info" style="font-size:12px;">Lihat SPK Saat Ini</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:12px;font-weight:600;">KETERANGAN</label>
                                <textarea name="keterangan" rows="3" class="form-control"
                                          style="background:#0f172a;border:1px solid rgba(255,255,255,0.08);border-radius:12px;color:#fff;"
                                          placeholder="Tambahkan catatan khusus jika ada...">{{ old('keterangan', $kontrak->keterangan) }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5 pt-4" style="border-top:1px solid rgba(255,255,255,0.07);">
                            <a href="{{ route('kontrak.index') }}" class="btn px-4"
                               style="background:rgba(255,255,255,0.07);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);border-radius:12px;">
                                <i class="bi bi-x-lg me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn px-5 fw-bold"
                                    style="background:linear-gradient(135deg,#3b82f6,#2563eb);color:#fff;border-radius:12px;height:45px;box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">
                                <i class="bi bi-cloud-arrow-up-fill me-2"></i>Update Kontrak
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection