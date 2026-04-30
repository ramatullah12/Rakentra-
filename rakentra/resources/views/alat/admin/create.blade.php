@extends('layout.admin')

@section('title','Tambah Alat')

@section('content')

<div class="container">

    <h4 class="mb-3">Tambah Alat Berat</h4>

    <form method="POST" action="{{ route('alat.store') }}">
        @csrf

        <div class="mb-2">
            <label>Nama Alat</label>
            <input type="text" name="nama_alat" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Kode Alat</label>
            <input type="text" name="kode_alat" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>

        <div class="mb-2">
            <label>Hour Meter</label>
            <input type="number" name="hour_meter" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="tersedia">Tersedia</option>
                <option value="disewa">Disewa</option>
                <option value="maintenance">Maintenance</option>
            </select>
        </div>

        <button class="btn btn-dark">Simpan</button>
        <a href="{{ route('alat.admin') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection