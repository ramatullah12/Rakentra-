@extends('layout.admin')

@section('title', 'Tambah Harga Sewa')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Tambah Harga Sewa
        </h2>

        <p class="text-secondary mb-0">
            Tambahkan data harga sewa alat berat
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

            <form action="{{ route('harga-sewa.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Alat Berat
                        </label>

                        <select name="alat_id"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Alat Berat
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
                            Harga Harian
                        </label>

                        <input type="number"
                               name="harga_harian"
                               required
                               value="{{ old('harga_harian') }}"
                               class="form-control text-white"
                               placeholder="Masukkan harga harian"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Harga Mingguan
                        </label>

                        <input type="number"
                               name="harga_mingguan"
                               value="{{ old('harga_mingguan') }}"
                               class="form-control text-white"
                               placeholder="Masukkan harga mingguan"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Harga Bulanan
                        </label>

                        <input type="number"
                               name="harga_bulanan"
                               value="{{ old('harga_bulanan') }}"
                               class="form-control text-white"
                               placeholder="Masukkan harga bulanan"
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
                                  placeholder="Masukkan keterangan harga sewa..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('keterangan') }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('harga-sewa.index') }}"
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