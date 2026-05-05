@extends('layout.admin')

@section('title','Edit Pelanggan')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h4 class="fw-bold text-white">Edit Pelanggan</h4>
        <small class="text-secondary">Perbarui data pelanggan</small>
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

            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label text-light">Nama</label>
                    <input type="text" name="nama"
                           class="form-control text-white"
                           style="background:#1e293b; border:none; border-radius:10px;"
                           value="{{ old('nama', $pelanggan->nama) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label text-light">No HP</label>
                    <input type="text" name="hp"
                           class="form-control text-white"
                           style="background:#1e293b; border:none; border-radius:10px;"
                           value="{{ old('hp', $pelanggan->hp) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label text-light">Alamat</label>
                    <textarea name="alamat"
                              class="form-control text-white"
                              style="background:#1e293b; border:none; border-radius:10px;"
                              rows="4">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label text-light">Status</label>
                    <select name="status"
                            class="form-select text-white"
                            style="background:#1e293b; border:none; border-radius:10px;">
                        <option value="aktif" {{ old('status', $pelanggan->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status', $pelanggan->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pelanggan.index') }}"
                       class="btn btn-outline-light"
                       style="border-radius:10px;">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn"
                            style="background:#2563eb; color:#fff; border-radius:10px;">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection