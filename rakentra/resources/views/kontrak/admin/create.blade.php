@extends('layout.admin')

@section('title', 'Tambah Kontrak')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Tambah Kontrak
        </h2>

        <p class="text-secondary mb-0">
            Tambahkan data kontrak penyewaan alat
        </p>

    </div>

    @if ($errors->any())

        <div class="alert alert-danger border-0 shadow-sm"
             style="border-radius:14px;">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card border-0 shadow-sm"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('kontrak.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Booking
                        </label>

                        <select name="booking_id"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Booking
                            </option>

                            @foreach($bookings as $booking)

                                <option value="{{ $booking->id }}"
                                    {{ old('booking_id') == $booking->id ? 'selected' : '' }}>

                                    {{ $booking->pelanggan->nama }}
                                    -
                                    {{ $booking->alat->nama_alat }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal Kontrak
                        </label>

                        <input type="date"
                               name="tanggal_kontrak"
                               required
                               value="{{ old('tanggal_kontrak') }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Durasi (Hari)
                        </label>

                        <input type="number"
                               name="durasi"
                               required
                               value="{{ old('durasi') }}"
                               class="form-control text-white"
                               placeholder="Masukkan durasi kontrak"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Nilai Kontrak
                        </label>

                        <input type="number"
                               name="nilai_kontrak"
                               required
                               value="{{ old('nilai_kontrak') }}"
                               class="form-control text-white"
                               placeholder="Masukkan nilai kontrak"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Upload PO
                        </label>

                        <input type="file"
                               name="file_po"
                               accept=".pdf,.jpg,.jpeg,.png"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                        <small class="text-secondary">
                            Format: PDF, JPG, JPEG, PNG
                        </small>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Upload SPK
                        </label>

                        <input type="file"
                               name="file_spk"
                               accept=".pdf,.jpg,.jpeg,.png"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                        <small class="text-secondary">
                            Format: PDF, JPG, JPEG, PNG
                        </small>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  rows="5"
                                  class="form-control text-white"
                                  placeholder="Masukkan keterangan kontrak..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('keterangan') }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('kontrak.index') }}"
                       class="btn btn-outline-light px-4 py-2"
                       style="border-radius:12px;">

                        Kembali

                    </a>

                    <button type="submit"
                            class="btn px-5 py-2"
                            style="background:#2563eb;
                                   color:white;
                                   border:none;
                                   border-radius:12px;
                                   font-weight:600;">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection