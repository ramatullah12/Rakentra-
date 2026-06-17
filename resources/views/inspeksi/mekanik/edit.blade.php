@extends('layout.mekanik')

@section('title', 'Edit Inspeksi')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Edit Inspeksi
        </h2>

        <p class="text-secondary mb-0">
            Update data inspeksi alat berat
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

            <form action="{{ route('inspeksi.mekanik.update', $inspeksi->id) }}"
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
                                    {{ old('alat_id', $inspeksi->alat_id) == $alat->id ? 'selected' : '' }}>

                                    {{ $alat->nama_alat }}
                                    -
                                    {{ $alat->kode_alat }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Mekanik yang Menginspeksi
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
                                    {{ old('mekanik_id', $inspeksi->mekanik_id) == $mekanik->id ? 'selected' : '' }}>

                                    {{ $mekanik->nama_mekanik }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal Inspeksi
                        </label>

                        <input type="date"
                               name="tanggal_inspeksi"
                               required
                               value="{{ old('tanggal_inspeksi', $inspeksi->tanggal_inspeksi) }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Kondisi Alat
                        </label>

                        <select name="kondisi_alat"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="baik"
                                {{ old('kondisi_alat', $inspeksi->kondisi_alat) == 'baik' ? 'selected' : '' }}>

                                Baik

                            </option>

                            <option value="rusak_ringan"
                                {{ old('kondisi_alat', $inspeksi->kondisi_alat) == 'rusak_ringan' ? 'selected' : '' }}>

                                Rusak Ringan

                            </option>

                            <option value="rusak_berat"
                                {{ old('kondisi_alat', $inspeksi->kondisi_alat) == 'rusak_berat' ? 'selected' : '' }}>

                                Rusak Berat

                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Hasil Inspeksi
                        </label>

                        <textarea name="hasil_inspeksi"
                                  rows="5"
                                  required
                                  class="form-control text-white"
                                  placeholder="Masukkan hasil inspeksi..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('hasil_inspeksi', $inspeksi->hasil_inspeksi) }}</textarea>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Foto Kerusakan
                        </label>

                        <input type="file"
                               name="foto_kerusakan[]"
                               multiple
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4 d-flex flex-wrap gap-2 align-items-end">

                        @if($inspeksi->foto_kerusakan && count($inspeksi->foto_kerusakan) > 0)

                            @foreach($inspeksi->foto_kerusakan as $foto)
                                <img src="{{ $foto }}"
                                     width="80"
                                     height="80"
                                     style="border-radius:12px;
                                            object-fit:cover;
                                            border: 1px solid rgba(255,255,255,0.1);">
                            @endforeach

                        @else

                            <span class="text-secondary">
                                Tidak ada foto
                            </span>

                        @endif

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

                            <option value="pending"
                                {{ old('status', $inspeksi->status) == 'pending' ? 'selected' : '' }}>

                                Pending

                            </option>

                            <option value="proses"
                                {{ old('status', $inspeksi->status) == 'proses' ? 'selected' : '' }}>

                                Proses

                            </option>

                            <option value="selesai"
                                {{ old('status', $inspeksi->status) == 'selesai' ? 'selected' : '' }}>

                                Selesai

                            </option>

                        </select>

                    </div>


                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('inspeksi.mekanik') }}"
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