@extends('layout.admin')

@section('title','Edit Alat')

@section('content')

<div class="container">

    <h4 class="mb-3">Edit Alat Berat</h4>

    <form method="POST" action="{{ route('alat.update',$alat->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Nama Alat</label>
            <input type="text" name="nama_alat" value="{{ $alat->nama_alat }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Kode Alat</label>
            <input type="text" name="kode_alat" value="{{ $alat->kode_alat }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Lokasi</label>
            <input type="text" name="lokasi" value="{{ $alat->lokasi }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Hour Meter</label>
            <input type="number" name="hour_meter" value="{{ $alat->hour_meter }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="tersedia" {{ $alat->status=='tersedia'?'selected':'' }}>Tersedia</option>
                <option value="disewa" {{ $alat->status=='disewa'?'selected':'' }}>Disewa</option>
                <option value="maintenance" {{ $alat->status=='maintenance'?'selected':'' }}>Maintenance</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('alat.admin') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection