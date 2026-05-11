@extends('layout.mekanik')

@section('title', 'Edit Material Request')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Edit Material Request
        </h2>

        <p class="text-secondary mb-0">
            Update kebutuhan sparepart dan material maintenance
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

            <form action="{{ route('material.mekanik.update', $material->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Maintenance
                        </label>

                        <select name="maintenance_id"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Maintenance
                            </option>

                            @foreach($maintenances as $maintenance)

                                <option value="{{ $maintenance->id }}"
                                    {{ $material->maintenance_id == $maintenance->id ? 'selected' : '' }}>

                                    {{ $maintenance->alat->nama_alat ?? '-' }}
                                    -
                                    {{ $maintenance->jenis_maintenance }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Nama Mekanik
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
                                    {{ $material->mekanik_id == $mekanik->id ? 'selected' : '' }}>

                                    {{ $mekanik->nama_mekanik }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Nama Material
                        </label>

                        <input type="text"
                               name="nama_material"
                               required
                               value="{{ $material->nama_material }}"
                               class="form-control text-white"
                               placeholder="Masukkan nama material"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-3 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Jumlah
                        </label>

                        <input type="number"
                               name="jumlah"
                               id="jumlah"
                               required
                               min="1"
                               value="{{ $material->jumlah }}"
                               class="form-control text-white"
                               placeholder="Jumlah"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-3 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Satuan
                        </label>

                        <input type="text"
                               name="satuan"
                               required
                               value="{{ $material->satuan }}"
                               class="form-control text-white"
                               placeholder="PCS / Unit"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Harga Satuan
                        </label>

                        <input type="number"
                               name="harga"
                               id="harga"
                               required
                               min="0"
                               value="{{ $material->harga }}"
                               class="form-control text-white"
                               placeholder="Masukkan harga"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Total Harga
                        </label>

                        <input type="text"
                               id="total"
                               readonly
                               class="form-control text-warning fw-bold"
                               value="Rp {{ number_format($material->jumlah * $material->harga,0,',','.') }}"
                               style="background:#0f172a;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Supplier
                        </label>

                        <input type="text"
                               name="supplier"
                               value="{{ $material->supplier }}"
                               class="form-control text-white"
                               placeholder="Masukkan supplier"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

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
                                {{ $material->status == 'pending' ? 'selected' : '' }}>

                                Pending

                            </option>

                            <option value="disetujui"
                                {{ $material->status == 'disetujui' ? 'selected' : '' }}>

                                Disetujui

                            </option>

                            <option value="ditolak"
                                {{ $material->status == 'ditolak' ? 'selected' : '' }}>

                                Ditolak

                            </option>

                            <option value="selesai"
                                {{ $material->status == 'selesai' ? 'selected' : '' }}>

                                Selesai

                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  rows="5"
                                  class="form-control text-white"
                                  placeholder="Masukkan keterangan tambahan..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ $material->keterangan }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('material.mekanik') }}"
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

                        <i class="bi bi-save me-2"></i>
                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

    const jumlah = document.getElementById('jumlah');
    const harga = document.getElementById('harga');
    const total = document.getElementById('total');

    function hitungTotal()
    {
        let jml = parseInt(jumlah.value) || 0;
        let hrg = parseInt(harga.value) || 0;

        let hasil = jml * hrg;

        total.value = 'Rp ' + hasil.toLocaleString('id-ID');
    }

    jumlah.addEventListener('keyup', hitungTotal);
    harga.addEventListener('keyup', hitungTotal);

</script>

@endsection