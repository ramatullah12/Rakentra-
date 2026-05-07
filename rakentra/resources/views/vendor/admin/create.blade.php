@extends('layout.admin')

@section('title','Tambah Vendor')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('vendor.index') }}" class="btn d-flex align-items-center justify-content-center"
           style="width:40px;height:40px;background:rgba(255,255,255,0.07);border-radius:12px;color:#94a3b8;border:1px solid rgba(255,255,255,0.08);">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div>
            <h4 class="fw-bold text-white mb-0">Tambah Vendor</h4>
            <small class="text-secondary">Daftarkan mitra atau supplier baru</small>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-7">

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

                    <div class="d-flex align-items-center gap-3 mb-5 pb-3" style="border-bottom:1px solid rgba(255,255,255,0.07);">
                        <div class="d-flex align-items-center justify-content-center rounded-circle"
                             style="width:55px;height:55px;background:linear-gradient(135deg,#2563eb,#1d4ed8);box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);">
                            <i class="bi bi-buildings-fill text-white fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-white mb-0">Informasi Vendor</h5>
                            <small class="text-secondary">Lengkapi detail profil mitra kerja</small>
                        </div>
                    </div>

                    <form action="{{ route('vendor.store') }}" method="POST">
                        @csrf

                        <div class="row g-4">

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">NAMA VENDOR <span class="text-danger">*</span></label>
                                <div class="input-group" style="background:rgba(15,23,42,0.5);border-radius:12px;border:1px solid rgba(255,255,255,0.08);overflow:hidden;">
                                    <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;"><i class="bi bi-building"></i></span>
                                    <input type="text" name="nama_vendor"
                                           class="form-control border-0 text-white"
                                           style="background:transparent;box-shadow:none;height:50px;"
                                           placeholder="Masukkan nama perusahaan vendor"
                                           value="{{ old('nama_vendor') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">NOMOR TELEPON / HP <span class="text-danger">*</span></label>
                                <div class="input-group" style="background:rgba(15,23,42,0.5);border-radius:12px;border:1px solid rgba(255,255,255,0.08);overflow:hidden;">
                                    <span class="input-group-text border-0" style="background:transparent;color:#94a3b8;"><i class="bi bi-telephone"></i></span>
                                    <input type="text" name="hp"
                                           class="form-control border-0 text-white"
                                           style="background:transparent;box-shadow:none;height:50px;"
                                           placeholder="Contoh: 0812XXXXXXXX"
                                           value="{{ old('hp') }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-secondary" style="font-size:13px;font-weight:600;letter-spacing:0.5px;">ALAMAT LENGKAP</label>
                                <div style="background:rgba(15,23,42,0.5);border-radius:12px;border:1px solid rgba(255,255,255,0.08);overflow:hidden;">
                                    <textarea name="alamat" rows="4"
                                              class="form-control border-0 text-white p-3"
                                              style="background:transparent;box-shadow:none;"
                                              placeholder="Masukkan alamat kantor atau workshop vendor...">{{ old('alamat') }}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5 pt-3" style="border-top:1px solid rgba(255,255,255,0.07);">
                            <a href="{{ route('vendor.index') }}" class="btn px-4"
                               style="background:rgba(255,255,255,0.07);color:#94a3b8;border:1px solid rgba(255,255,255,0.08);border-radius:12px;height:45px;display:flex;align-items:center;">
                                <i class="bi bi-x-lg me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn px-5 fw-bold"
                                    style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border-radius:12px;height:45px;box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);">
                                <i class="bi bi-check2-circle me-2"></i>Simpan Vendor
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection