@extends('layout.pemimpin')

@section('title', 'Detail Faktur')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Detail Faktur
            </h2>

            <p class="text-secondary mb-0">
                Monitoring detail faktur pembayaran rental alat berat
            </p>

        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('tagihan.cetak', $tagihan->id) }}"
               class="btn px-4 py-2"
               style="background:#16a34a;
                      color:white;
                      border:none;
                      border-radius:12px;
                      font-weight:600;">

                <i class="bi bi-printer me-2"></i>
                Cetak PDF

            </a>

            <a href="{{ route('tagihan.pemimpin') }}"
               class="btn btn-outline-light px-4 py-2"
               style="border-radius:12px;">

                Kembali

            </a>

        </div>

    </div>

    <div class="card border-0 shadow-sm"
         style="background:rgba(255,255,255,0.05);
                border-radius:24px;">

        <div class="card-body p-5">

            <div class="d-flex justify-content-between align-items-start mb-5">

                <div>

                    <h1 class="fw-bold text-white mb-2">
                        FAKTUR
                    </h1>

                    <p class="text-secondary mb-1">
                        Rakentra Rental Alat Berat
                    </p>

                    <p class="text-secondary mb-0">
                        Monitoring pembayaran rental alat berat
                    </p>

                </div>

                <div class="text-end">

                    <div class="mb-3">

                        @if($tagihan->status_tagihan == 'dibayar')

                            <span style="background:#16a34a;
                                         color:white;
                                         padding:10px 18px;
                                         border-radius:12px;
                                         font-size:14px;
                                         font-weight:600;">

                                DIBAYAR

                            </span>

                        @elseif($tagihan->status_tagihan == 'pending')

                            <span style="background:#f59e0b;
                                         color:white;
                                         padding:10px 18px;
                                         border-radius:12px;
                                         font-size:14px;
                                         font-weight:600;">

                                PENDING

                            </span>

                        @else

                            <span style="background:#dc2626;
                                         color:white;
                                         padding:10px 18px;
                                         border-radius:12px;
                                         font-size:14px;
                                         font-weight:600;">

                                JATUH TEMPO

                            </span>

                        @endif

                    </div>

                    <h5 class="text-white fw-bold">

                        {{ $tagihan->nomor_tagihan }}

                    </h5>

                </div>

            </div>

            <div class="row mb-5">

                <div class="col-md-6 mb-4">

                    <div class="card border-0 h-100"
                         style="background:rgba(255,255,255,0.03);
                                border-radius:18px;">

                        <div class="card-body">

                            <h5 class="text-white fw-bold mb-4">
                                Data Pelanggan
                            </h5>

                            <table class="table table-borderless mb-0">

                                <tr>

                                    <td class="text-secondary">
                                        Nama
                                    </td>

                                    <td class="text-white fw-semibold">

                                        {{ $tagihan->kontrak->booking->pelanggan->nama }}

                                    </td>

                                </tr>

                                <tr>

                                    <td class="text-secondary">
                                        No HP
                                    </td>

                                    <td class="text-white fw-semibold">

                                        {{ $tagihan->kontrak->booking->pelanggan->hp }}

                                    </td>

                                </tr>

                                <tr>

                                    <td class="text-secondary">
                                        Alamat
                                    </td>

                                    <td class="text-white fw-semibold">

                                        {{ $tagihan->kontrak->booking->pelanggan->alamat }}

                                    </td>

                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="card border-0 h-100"
                         style="background:rgba(255,255,255,0.03);
                                border-radius:18px;">

                        <div class="card-body">

                            <h5 class="text-white fw-bold mb-4">
                                Data Kontrak
                            </h5>

                            <table class="table table-borderless mb-0">

                                <tr>

                                    <td class="text-secondary">
                                        Nomor Kontrak
                                    </td>

                                    <td class="text-white fw-semibold">

                                        {{ $tagihan->kontrak->nomor_kontrak }}

                                    </td>

                                </tr>

                                <tr>

                                    <td class="text-secondary">
                                        Tanggal Tagihan
                                    </td>

                                    <td class="text-white fw-semibold">

                                        {{ $tagihan->tanggal_tagihan }}

                                    </td>

                                </tr>

                                <tr>

                                    <td class="text-secondary">
                                        Jatuh Tempo
                                    </td>

                                    <td class="text-white fw-semibold">

                                        {{ $tagihan->jatuh_tempo }}

                                    </td>

                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card border-0 mb-5"
                 style="background:rgba(255,255,255,0.03);
                        border-radius:18px;">

                <div class="card-body p-0 table-responsive">

                    <table class="table align-middle mb-0">

                        <thead>

                            <tr style="background:#1e293b;">

                                <th class="text-secondary border-0 py-4 ps-4">
                                    Nama Alat
                                </th>

                                <th class="text-secondary border-0 py-4">
                                    Kode Alat
                                </th>

                                <th class="text-secondary border-0 py-4">
                                    Durasi
                                </th>

                                <th class="text-secondary border-0 py-4 text-end pe-4">
                                    Harga
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr style="background:rgba(255,255,255,0.02);">

                                <td class="text-white fw-semibold py-4 ps-4">

                                    {{ $tagihan->kontrak->booking->alat->nama_alat }}

                                </td>

                                <td class="text-secondary py-4">

                                    {{ $tagihan->kontrak->booking->alat->kode_alat }}

                                </td>

                                <td class="text-secondary py-4">

                                    {{ $tagihan->kontrak->durasi }} Hari

                                </td>

                                <td class="text-success fw-bold py-4 text-end pe-4">

                                    Rp {{ number_format($tagihan->subtotal,0,',','.') }}

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="row justify-content-end">

                <div class="col-md-5">

                    <div class="card border-0"
                         style="background:rgba(255,255,255,0.03);
                                border-radius:18px;">

                        <div class="card-body">

                            <div class="d-flex justify-content-between mb-3">

                                <span class="text-secondary">
                                    Subtotal
                                </span>

                                <span class="text-white fw-semibold">

                                    Rp {{ number_format($tagihan->subtotal,0,',','.') }}

                                </span>

                            </div>

                            <div class="d-flex justify-content-between mb-3">

                                <span class="text-secondary">
                                    PPN
                                </span>

                                <span class="text-white fw-semibold">

                                    Rp {{ number_format($tagihan->ppn,0,',','.') }}

                                </span>

                            </div>

                            <hr style="border-color:rgba(255,255,255,0.08);">

                            <div class="d-flex justify-content-between">

                                <span class="text-white fw-bold fs-5">
                                    Total
                                </span>

                                <span class="text-success fw-bold fs-4">

                                    Rp {{ number_format($tagihan->total,0,',','.') }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @if($tagihan->keterangan)

                <div class="card border-0 mt-5"
                     style="background:rgba(255,255,255,0.03);
                            border-radius:18px;">

                    <div class="card-body">

                        <h5 class="text-white fw-bold mb-3">
                            Keterangan
                        </h5>

                        <p class="text-secondary mb-0">

                            {{ $tagihan->keterangan }}

                        </p>

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection