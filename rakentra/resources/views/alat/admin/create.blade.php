@extends('layout.admin')

@section('title','Tambah Alat Berat')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('alat.admin') }}" class="btn d-flex align-items-center justify-content-center"
           style="width:40px;height:40px;background:rgba(255,255,255,0.07);border-radius:12px;color:#94a3b8;border:1px solid rgba(255,255,255,0.08);">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div>
            <h4 class="fw-bold text-white mb-0">Tambah Alat Berat</h4>
            <small class="text-secondary">Masukkan data unit alat berat baru</small>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-7">

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
                            <i class="bi bi-truck-front-fill text-white fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-white mb-0">Data Unit Baru</h6>
                            <small class="text-secondary">Isi semua field yang diperlukan</small>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('alat.store') }}">
                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">NAMA ALAT <span class="text-danger">*</span></label>
                                <input type="text" name="nama_alat"
                                       class="form-control @error('nama_alat') is-invalid @enderror"
                                       placeholder="Contoh: Excavator PC200"
                                       value="{{ old('nama_alat') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">KODE ALAT <span class="text-danger">*</span></label>
                                <input type="text" name="kode_alat"
                                       class="form-control @error('kode_alat') is-invalid @enderror"
                                       placeholder="Contoh: EXC-001"
                                       value="{{ old('kode_alat') }}">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">LOKASI</label>
                                <input type="text" name="lokasi"
                                       class="form-control"
                                       placeholder="Lokasi penempatan alat"
                                       value="{{ old('lokasi') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">HOUR METER (HM)</label>
                                <input type="number" name="hour_meter"
                                       class="form-control"
                                       placeholder="0"
                                       value="{{ old('hour_meter') }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">STATUS</label>
                                <div class="row g-2">
                                    @foreach(['tersedia' => ['Tersedia','#16a34a','bi-check-circle-fill'], 'disewa' => ['Disewa','#f59e0b','bi-gear-wide-connected'], 'maintenance' => ['Maintenance','#dc2626','bi-wrench-adjustable']] as $val => $opt)
                                    <div class="col-4">
                                        <input type="radio" name="status" id="status_{{ $val }}" value="{{ $val }}"
                                               class="d-none status-radio"
                                               {{ old('status','tersedia') == $val ? 'checked' : '' }}>
                                        <label for="status_{{ $val }}" class="d-block p-3 rounded-3 text-center cursor-pointer status-label"
                                               style="border:2px solid rgba(255,255,255,0.08);border-radius:12px !important;cursor:pointer;transition:0.2s;background:rgba(255,255,255,0.03);">
                                            <i class="bi {{ $opt[2] }} d-block mb-1" style="font-size:22px;color:{{ $opt[1] }};"></i>
                                            <small class="text-secondary fw-semibold" style="font-size:12px;">{{ $opt[0] }}</small>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4 pt-3" style="border-top:1px solid rgba(255,255,255,0.07);">
                            <a href="{{ route('alat.admin') }}" class="btn px-4"
                               style="background:rgba(255,255,255,0.07);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);border-radius:12px;">
                                <i class="bi bi-x-lg me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn px-5 fw-semibold"
                                    style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;padding:10px 30px;">
                                <i class="bi bi-floppy-fill me-2"></i>Simpan Data
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
    border-color: #2563eb !important;
    background: rgba(37,99,235,0.12) !important;
}
</style>

@endsection