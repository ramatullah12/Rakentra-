@extends('layout.admin')

@section('title', 'Tambah Vendor')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2 class="fw-bold text-white mb-1">Tambah Vendor</h2>
        <p class="text-secondary mb-0">
            Tambahkan data vendor baru
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

            <form action="{{ route('vendor.store') }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label text-white fw-semibold mb-2">
                        Nama Vendor
                    </label>

                    <input type="text"
                           name="nama_vendor"
                           value="{{ old('nama_vendor') }}"
                           class="form-control text-white"
                           placeholder="Masukkan nama vendor"
                           style="background:#1e293b;
                                  border:none;
                                  border-radius:14px;
                                  height:55px;">

                </div>

                <div class="mb-4">

                    <label class="form-label text-white fw-semibold mb-2">
                        Nomor HP
                    </label>

                    <input type="text"
                           name="hp"
                           value="{{ old('hp') }}"
                           class="form-control text-white"
                           placeholder="Masukkan nomor HP"
                           style="background:#1e293b;
                                  border:none;
                                  border-radius:14px;
                                  height:55px;">

                </div>

                <div class="mb-4">

                    <label class="form-label text-white fw-semibold mb-2">
                        Alamat
                    </label>

                    <textarea name="alamat"
                              rows="5"
                              class="form-control text-white"
                              placeholder="Masukkan alamat vendor"
                              style="background:#1e293b;
                                     border:none;
                                     border-radius:14px;">{{ old('alamat') }}</textarea>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('vendor.index') }}"
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