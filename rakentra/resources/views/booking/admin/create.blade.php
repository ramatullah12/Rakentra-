@extends('layout.admin')

@section('title', 'Tambah Booking')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Tambah Booking
        </h2>

        <p class="text-secondary mb-0">
            Tambahkan data booking alat berat
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

            <form action="{{ route('booking.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Pelanggan
                        </label>

                        <select name="pelanggan_id"
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Pelanggan
                            </option>

                            @foreach($pelanggans as $pelanggan)

                                <option value="{{ $pelanggan->id }}"
                                    {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>

                                    {{ $pelanggan->nama }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Alat Berat
                        </label>

                        <select name="alat_id"
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Alat
                            </option>

                            @foreach($alats as $alat)

                                <option value="{{ $alat->id }}"
                                    {{ old('alat_id') == $alat->id ? 'selected' : '' }}>

                                    {{ $alat->nama_alat }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal Booking
                        </label>

                        <input type="date"
                               name="tanggal_booking"
                               value="{{ old('tanggal_booking') }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal Mulai
                        </label>

                        <input type="date"
                               name="tanggal_mulai"
                               value="{{ old('tanggal_mulai') }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal Selesai
                        </label>

                        <input type="date"
                               name="tanggal_selesai"
                               value="{{ old('tanggal_selesai') }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  rows="5"
                                  class="form-control text-white"
                                  placeholder="Masukkan keterangan booking..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('keterangan') }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('booking.index') }}"
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