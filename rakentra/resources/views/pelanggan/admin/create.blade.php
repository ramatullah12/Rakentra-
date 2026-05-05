@extends('layout.admin')

@section('title','Tambah Pelanggan')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h4 class="fw-bold text-white">Tambah Pelanggan</h4>
        <small class="text-secondary">Input data pelanggan baru</small>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="background: rgba(255,255,255,0.05); border-radius:15px;">
        <div class="card-body">

            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-light">Nama</label>
                    <input type="text" name="nama"
                           class="form-control text-white"
                           style="background:#1e293b; border:none; border-radius:10px;"
                           value="{{ old('nama') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label text-light">No HP</label>
                    <input type="text" name="hp"
                           class="form-control text-white"
                           style="background:#1e293b; border:none; border-radius:10px;"
                           value="{{ old('hp') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label text-light">Alamat</label>
                    <textarea name="alamat"
                              class="form-control text-white"
                              style="background:#1e293b; border:none; border-radius:10px;"
                              rows="4">{{ old('alamat') }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pelanggan.index') }}"
                       class="btn btn-outline-light"
                       style="border-radius:10px;">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn"
                            style="background:#22c55e; color:#fff; border-radius:10px;">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection