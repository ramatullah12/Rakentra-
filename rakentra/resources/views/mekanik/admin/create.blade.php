@extends('layout.admin')

@section('title', 'Tambah Mekanik')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Tambah Mekanik
        </h2>

        <p class="text-secondary mb-0">
            Tambahkan data mekanik baru
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

            <form action="{{ route('mekanik.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Nama Mekanik
                        </label>

                        <input type="text"
                               name="nama_mekanik"
                               required
                               value="{{ old('nama_mekanik') }}"
                               class="form-control text-white"
                               placeholder="Masukkan nama mekanik"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               required
                               value="{{ old('email') }}"
                               class="form-control text-white"
                               placeholder="Masukkan email"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Nomor HP
                        </label>

                        <input type="text"
                               name="no_hp"
                               required
                               value="{{ old('no_hp') }}"
                               class="form-control text-white"
                               placeholder="Masukkan nomor HP"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Spesialisasi
                        </label>

                        <input type="text"
                               name="spesialisasi"
                               required
                               value="{{ old('spesialisasi') }}"
                               class="form-control text-white"
                               placeholder="Contoh: Excavator, Bulldozer"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Alamat
                        </label>

                        <textarea name="alamat"
                                  rows="4"
                                  required
                                  class="form-control text-white"
                                  placeholder="Masukkan alamat mekanik"
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('alamat') }}</textarea>

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

                            <option value="">
                                Pilih Status
                            </option>

                            <option value="aktif"
                                {{ old('status') == 'aktif' ? 'selected' : '' }}>

                                Aktif

                            </option>

                            <option value="nonaktif"
                                {{ old('status') == 'nonaktif' ? 'selected' : '' }}>

                                Nonaktif

                            </option>

                        </select>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('mekanik.index') }}"
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