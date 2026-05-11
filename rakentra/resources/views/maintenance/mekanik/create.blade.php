@extends('layout.mekanik')

@section('title', 'Tambah Maintenance')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Tambah Maintenance
        </h2>

        <p class="text-secondary mb-0">
            Input data maintenance dan perbaikan alat berat
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

            <form action="{{ route('maintenance.mekanik.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Alat
                        </label>

                        <select name="alat_id"
                                required
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
                                    -
                                    {{ $alat->kode_alat }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Inspeksi
                        </label>

                        <select name="inspeksi_id"
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Inspeksi
                            </option>

                            @foreach($inspeksis as $inspeksi)

                                <option value="{{ $inspeksi->id }}"
                                    {{ old('inspeksi_id') == $inspeksi->id ? 'selected' : '' }}>

                                    {{ $inspeksi->alat->nama_alat }}
                                    -
                                    {{ $inspeksi->tanggal_inspeksi }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Mekanik yang Menangani
                        </label>

                        <select name="mekanik_id"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Mekanik
                            </option>

                            @foreach($mekaniks as $mekanik)

                                <option value="{{ $mekanik->id }}"
                                    {{ old('mekanik_id') == $mekanik->id ? 'selected' : '' }}>

                                    {{ $mekanik->nama_mekanik }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal Maintenance
                        </label>

                        <input type="date"
                               name="tanggal_maintenance"
                               required
                               value="{{ old('tanggal_maintenance') }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Jenis Maintenance
                        </label>

                        <select name="jenis_maintenance"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Jenis Maintenance
                            </option>

                            <option value="Preventive Maintenance">
                                Preventive Maintenance
                            </option>

                            <option value="Corrective Maintenance">
                                Corrective Maintenance
                            </option>

                            <option value="Overhaul">
                                Overhaul
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Deskripsi Kerusakan
                        </label>

                        <textarea name="deskripsi_kerusakan"
                                  required
                                  rows="5"
                                  class="form-control text-white"
                                  placeholder="Masukkan deskripsi kerusakan..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('deskripsi_kerusakan') }}</textarea>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tindakan Perbaikan
                        </label>

                        <textarea name="tindakan_perbaikan"
                                  rows="5"
                                  class="form-control text-white"
                                  placeholder="Masukkan tindakan perbaikan..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('tindakan_perbaikan') }}</textarea>

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Biaya
                        </label>

                        <input type="number"
                               name="biaya"
                               required
                               value="{{ old('biaya') }}"
                               class="form-control text-white"
                               placeholder="Masukkan biaya"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-4 mb-4">

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

                            <option value="pending">
                                Pending
                            </option>

                            <option value="diproses">
                                Diproses
                            </option>

                            <option value="selesai">
                                Selesai
                            </option>

                        </select>

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Foto Perbaikan
                        </label>

                        <input type="file"
                               name="foto_perbaikan"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('maintenance.mekanik') }}"
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