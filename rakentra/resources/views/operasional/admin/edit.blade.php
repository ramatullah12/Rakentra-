@extends('layout.admin')

@section('title', 'Edit Operasional')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Edit Operasional
        </h2>

        <p class="text-secondary mb-0">
            Update data operasional alat berat
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

            <form action="{{ route('operasional.update', $operasional->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Mobilisasi
                        </label>

                        <select name="mobilisasi_id"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Mobilisasi
                            </option>

                            @foreach($mobilisasis as $mobilisasi)

                                <option value="{{ $mobilisasi->id }}"
                                    {{ old('mobilisasi_id', $operasional->mobilisasi_id) == $mobilisasi->id ? 'selected' : '' }}>

                                    {{ $mobilisasi->kontrak->nomor_kontrak }}
                                    -
                                    {{ $mobilisasi->kontrak->booking->pelanggan->nama }}
                                    -
                                    {{ $mobilisasi->kontrak->booking->alat->nama_alat }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal
                        </label>

                        <input type="date"
                               name="tanggal"
                               required
                               value="{{ old('tanggal', $operasional->tanggal) }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Hour Meter
                        </label>

                        <input type="number"
                               name="hour_meter"
                               required
                               value="{{ old('hour_meter', $operasional->hour_meter) }}"
                               class="form-control text-white"
                               placeholder="Masukkan hour meter"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Lokasi
                        </label>

                        <input type="text"
                               name="lokasi"
                               required
                               value="{{ old('lokasi', $operasional->lokasi) }}"
                               class="form-control text-white"
                               placeholder="Masukkan lokasi alat"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Jam Operasional
                        </label>

                        <input type="number"
                               name="jam_operasional"
                               required
                               value="{{ old('jam_operasional', $operasional->jam_operasional) }}"
                               class="form-control text-white"
                               placeholder="Masukkan jam operasional"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Penggunaan Alat
                        </label>

                        <input type="text"
                               name="penggunaan_alat"
                               required
                               value="{{ old('penggunaan_alat', $operasional->penggunaan_alat) }}"
                               class="form-control text-white"
                               placeholder="Masukkan penggunaan alat"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Biaya Operasional
                        </label>

                        <input type="number"
                               name="biaya_operasional"
                               required
                               value="{{ old('biaya_operasional', $operasional->biaya_operasional) }}"
                               class="form-control text-white"
                               placeholder="Masukkan biaya operasional"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Status Unit
                        </label>

                        <select name="status_unit"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="standby"
                                {{ old('status_unit', $operasional->status_unit) == 'standby' ? 'selected' : '' }}>

                                Standby

                            </option>

                            <option value="operasional"
                                {{ old('status_unit', $operasional->status_unit) == 'operasional' ? 'selected' : '' }}>

                                Operasional

                            </option>

                            <option value="maintenance"
                                {{ old('status_unit', $operasional->status_unit) == 'maintenance' ? 'selected' : '' }}>

                                Maintenance

                            </option>

                            <option value="rusak"
                                {{ old('status_unit', $operasional->status_unit) == 'rusak' ? 'selected' : '' }}>

                                Rusak

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
                                  placeholder="Masukkan keterangan operasional..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('keterangan', $operasional->keterangan) }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('operasional.index') }}"
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