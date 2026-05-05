@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Pelanggan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="hp" class="form-control" value="{{ old('hp') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="4">{{ old('alamat') }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection