@extends('layout.admin')

@section('title', 'Tambah Tagihan')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold text-white mb-1">
            Tambah Tagihan
        </h2>

        <p class="text-secondary mb-0">
            Input data tagihan rental alat berat
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

            <form action="{{ route('tagihan.store') }}"
                  method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Kontrak
                        </label>

                        <select name="kontrak_id"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="">
                                Pilih Kontrak
                            </option>

                            @foreach($kontraks as $kontrak)

                                <option value="{{ $kontrak->id }}"
                                    {{ old('kontrak_id') == $kontrak->id ? 'selected' : '' }}>

                                    {{ $kontrak->nomor_kontrak }}
                                    -
                                    {{ $kontrak->booking->pelanggan->nama }}
                                    -
                                    {{ $kontrak->booking->alat->nama_alat }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Tanggal Tagihan
                        </label>

                        <input type="date"
                               name="tanggal_tagihan"
                               required
                               value="{{ old('tanggal_tagihan') }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Jatuh Tempo
                        </label>

                        <input type="date"
                               name="jatuh_tempo"
                               required
                               value="{{ old('jatuh_tempo') }}"
                               class="form-control text-white"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Status Tagihan
                        </label>

                        <select name="status_tagihan"
                                required
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:14px;
                                       height:55px;">

                            <option value="pending"
                                {{ old('status_tagihan') == 'pending' ? 'selected' : '' }}>

                                Pending

                            </option>

                            <option value="dibayar"
                                {{ old('status_tagihan') == 'dibayar' ? 'selected' : '' }}>

                                Dibayar

                            </option>

                            <option value="jatuh_tempo"
                                {{ old('status_tagihan') == 'jatuh_tempo' ? 'selected' : '' }}>

                                Jatuh Tempo

                            </option>

                        </select>

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Subtotal
                        </label>

                        <input type="number"
                               id="subtotal"
                               name="subtotal"
                               required
                               value="{{ old('subtotal') }}"
                               class="form-control text-white"
                               placeholder="Masukkan subtotal"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            PPN
                        </label>

                        <input type="number"
                               id="ppn"
                               name="ppn"
                               required
                               value="{{ old('ppn',0) }}"
                               class="form-control text-white"
                               placeholder="Masukkan PPN"
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:14px;
                                      height:55px;">

                    </div>

                    <div class="col-md-4 mb-4">

                        <label class="form-label text-white fw-semibold mb-2">
                            Total
                        </label>

                        <input type="number"
                               id="total"
                               readonly
                               class="form-control text-white fw-bold"
                               placeholder="Total otomatis"
                               style="background:#0f172a;
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
                                  placeholder="Masukkan keterangan..."
                                  style="background:#1e293b;
                                         border:none;
                                         border-radius:14px;">{{ old('keterangan') }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center">

                    <a href="{{ route('tagihan.index') }}"
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

<script>

    const subtotal = document.getElementById('subtotal');
    const ppn = document.getElementById('ppn');
    const total = document.getElementById('total');

    function hitungTotal() {

        let subtotalValue = parseFloat(subtotal.value) || 0;
        let ppnValue = parseFloat(ppn.value) || 0;

        total.value = subtotalValue + ppnValue;
    }

    subtotal.addEventListener('keyup', hitungTotal);
    ppn.addEventListener('keyup', hitungTotal);

    hitungTotal();

</script>

@endsection