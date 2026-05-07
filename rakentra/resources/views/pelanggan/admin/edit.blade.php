@extends('layout.admin')

@section('title','Edit Pelanggan')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('pelanggan.index') }}" class="btn d-flex align-items-center justify-content-center"
           style="width:40px;height:40px;background:rgba(255,255,255,0.07);border-radius:12px;color:#94a3b8;border:1px solid rgba(255,255,255,0.08);">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div>
            <h4 class="fw-bold text-white mb-0">Edit Pelanggan</h4>
            <small class="text-secondary">Ubah informasi pelanggan: <span class="text-white">{{ $pelanggan->nama }}</span></small>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-7">

            @if ($errors->any())
            <div class="alert border-0 mb-4 d-flex align-items-start gap-3"
                 style="background:rgba(220,38,38,0.12);border-left:4px solid #dc2626 !important;border-radius:14px;">
                <i class="bi bi-exclamation-triangle-fill text-danger mt-1"></i>
                <div>
                    <strong class="text-danger">Terjadi kesalahan:</strong>
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

                    <div class="d-flex align-items-center gap-3 mb-5 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.07);">
                        <div class="d-flex align-items-center justify-content-center rounded-circle"
                             style="width:55px;height:55px;background:linear-gradient(135deg,#3b82f6,#2563eb);box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);">
                            <i class="bi bi-person-gear text-white fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-white mb-0">Perbarui Data</h5>
                            <small class="text-secondary">Sesuaikan informasi pelanggan jika ada perubahan</small>
                        </div>
                    </div>

                    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">NAMA LENGKAP <span class="text-danger">*</span></label>
                                <div class="input-group" style="background:rgba(15,23,42,0.5);border-radius:12px;border:1px solid rgba(255,255,255,0.08);overflow:hidden;">
                                    <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;"><i class="bi bi-person"></i></span>
                                    <input type="text" name="nama"
                                           class="form-control border-0 text-white"
                                           style="background:transparent;box-shadow:none;height:50px;"
                                           value="{{ old('nama', $pelanggan->nama) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">NOMOR TELEPON / HP <span class="text-danger">*</span></label>
                                <div class="input-group" style="background:rgba(15,23,42,0.5);border-radius:12px;border:1px solid rgba(255,255,255,0.08);overflow:hidden;">
                                    <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;"><i class="bi bi-telephone"></i></span>
                                    <input type="text" name="hp"
                                           class="form-control border-0 text-white"
                                           style="background:transparent;box-shadow:none;height:50px;"
                                           value="{{ old('hp', $pelanggan->hp) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">ALAMAT LENGKAP</label>
                                <div style="background:rgba(15,23,42,0.5);border-radius:12px;border:1px solid rgba(255,255,255,0.08);overflow:hidden;">
                                    <textarea name="alamat" rows="4"
                                              class="form-control border-0 text-white p-3"
                                              style="background:transparent;box-shadow:none;">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">STATUS PELANGGAN</label>
                                <div class="row g-2">
                                    @foreach(['aktif' => ['Aktif','#16a34a'], 'nonaktif' => ['Nonaktif','#ef4444']] as $val => $opt)
                                    <div class="col-6">
                                        <input type="radio" name="status" id="st_{{ $val }}" value="{{ $val }}"
                                               class="d-none status-radio"
                                               {{ old('status', $pelanggan->status) == $val ? 'checked' : '' }}>
                                        <label for="st_{{ $val }}" class="d-flex align-items-center justify-content-center p-3 rounded-3 gap-2 status-label"
                                               style="border:2px solid rgba(255,255,255,0.08);cursor:pointer;transition:0.2s;background:rgba(255,255,255,0.03);">
                                            <div class="rounded-circle" style="width:10px;height:10px;background:{{ $opt[1] }}; shadow:0 0 8px {{ $opt[1] }};"></div>
                                            <span class="text-white fw-semibold" style="font-size:14px;">{{ $opt[0] }}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5 pt-3" style="border-top:1px solid rgba(255,255,255,0.07);">
                            <a href="{{ route('pelanggan.index') }}" class="btn px-4"
                               style="background:rgba(255,255,255,0.07);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);border-radius:12px;height:45px;display:flex;align-items:center;">
                                <i class="bi bi-x-lg me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn px-5 fw-bold"
                                    style="background:linear-gradient(135deg,#3b82f6,#2563eb);color:#fff;border-radius:12px;height:45px;box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">
                                <i class="bi bi-floppy-fill me-2"></i>Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
.status-radio:checked + .status-label {
    border-color: #3b82f6 !important;
    background: rgba(59,130,246,0.1) !important;
}
</style>

@endsection