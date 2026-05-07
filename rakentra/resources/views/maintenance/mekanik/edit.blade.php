@extends('layout.mekanik')

@section('title', 'Edit Maintenance')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Edit Maintenance
        </h2>

        <p class="text-secondary mb-0">
            Update data maintenance dan perbaikan alat berat
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

            <form action="{{ route('maintenance.update', $maintenance->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

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
                                    {{ $maintenance->alat_id == $alat->id ? 'selected' : '' }}>

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
                                    {{ $maintenance->inspeksi_id == $inspeksi->id ? 'selected' : '' }}>

                                    {{ $inspeksi->alat->nama_alat }}
                                    -
                                    {{ $inspeksi->tanggal_inspeksi }}

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
                               value="{{ $maintenance->tanggal_maintenance }}"
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

                            <option value="Preventive Maintenance"
                                {{ $maintenance->jenis_maintenance == 'Preventive Maintenance' ? 'selected' : '' }}>

                                Preventive Maintenance

                            </option>

                            <option value="Corrective Maintenance"
                                {{ $maintenance->jenis_maintenance == 'Corrective Maintenance' ? 'selected' : '' }}>

                                Corrective Maintenance

                            </option>

                            <option value="Overhaul"
                                {{ $maintenance->jenis_maintenance == 'Overhaul' ? 'selected' : '' }}>

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
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ $maintenance->deskripsi_kerusakan }}</textarea>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tindakan Perbaikan
                        </label>

                        <textarea name="tindakan_perbaikan"
                                  rows="5"
                                  class="form-control text-white"
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ $maintenance->tindakan_perbaikan }}</textarea>

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Biaya
                        </label>

                        <input type="number"
                               name="biaya"
                               required
                               value="{{ $maintenance->biaya }}"
                               class="form-control text-white"
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

                            <option value="pending"
                                {{ $maintenance->status == 'pending' ? 'selected' : '' }}>

                                Pending

                            </option>

                            <option value="diproses"
                                {{ $maintenance->status == 'diproses' ? 'selected' : '' }}>

                                Diproses

                            </option>

                            <option value="selesai"
                                {{ $maintenance->status == 'selesai' ? 'selected' : '' }}>

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

                    @if($maintenance->foto_perbaikan)

                        <div class="col-md-12 mb-4">

                            <label class="form-label text-white fw-semibold mb-3">
                                Foto Saat Ini
                            </label>

                            <div>

                                <img src="{{ $maintenance->foto_perbaikan }}"
                                     width="180"
                                     style="border-radius:16px;
                                            object-fit:cover;">

                            </div>

                        </div>

                    @endif

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  rows="4"
                                  class="form-control text-white"
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ $maintenance->keterangan }}</textarea>

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

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection