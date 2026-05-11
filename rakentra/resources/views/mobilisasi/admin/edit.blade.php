@extends('layout.admin')

@section('title', 'Edit Mobilisasi')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Edit Mobilisasi
        </h2>

        <p class="text-secondary mb-0">
            Perbarui data mobilisasi alat berat
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

            <form action="{{ route('mobilisasi.update', $mobilisasi->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Kontrak
                        </label>

                        <select name="kontrak_id"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Kontrak
                            </option>

                            @foreach($kontraks as $kontrak)

                                <option value="{{ $kontrak->id }}"
                                    {{ old('kontrak_id', $mobilisasi->kontrak_id) == $kontrak->id ? 'selected' : '' }}>

                                    {{ $kontrak->nomor_kontrak }}
                                    -
                                    {{ $kontrak->booking->pelanggan->nama }}
                                    -
                                    {{ $kontrak->booking->alat->nama_alat }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal Kirim
                        </label>

                        <input type="date"
                               name="tanggal_kirim"
                               required
                               value="{{ old('tanggal_kirim', $mobilisasi->tanggal_kirim) }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal Kembali
                        </label>

                        <input type="date"
                               name="tanggal_kembali"
                               value="{{ old('tanggal_kembali', $mobilisasi->tanggal_kembali) }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Lokasi Proyek
                        </label>

                        <input type="text"
                               name="lokasi_proyek"
                               required
                               value="{{ old('lokasi_proyek', $mobilisasi->lokasi_proyek) }}"
                               class="form-control text-white"
                               placeholder="Masukkan lokasi proyek"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Status
                        </label>

                        <select name="status"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="dijadwalkan"
                                {{ old('status', $mobilisasi->status) == 'dijadwalkan' ? 'selected' : '' }}>

                                Dijadwalkan

                            </option>

                            <option value="dikirim"
                                {{ old('status', $mobilisasi->status) == 'dikirim' ? 'selected' : '' }}>

                                Dikirim

                            </option>

                            <option value="sampai"
                                {{ old('status', $mobilisasi->status) == 'sampai' ? 'selected' : '' }}>

                                Sampai

                            </option>

                            <option value="pengembalian"
                                {{ old('status', $mobilisasi->status) == 'pengembalian' ? 'selected' : '' }}>

                                Pengembalian

                            </option>

                            <option value="selesai"
                                {{ old('status', $mobilisasi->status) == 'selesai' ? 'selected' : '' }}>

                                Selesai

                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  rows="5"
                                  class="form-control text-white"
                                  placeholder="Masukkan keterangan mobilisasi..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('keterangan', $mobilisasi->keterangan) }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('mobilisasi.index') }}"
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

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection