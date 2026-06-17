@extends('layout.pemimpin')

@section('title', 'Monitoring Tagihan')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Monitoring Tagihan
            </h2>

            <p class="text-secondary mb-0">
                Monitoring data tagihan dan faktur rental alat berat
            </p>

        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <h6 class="text-secondary">
                        Total Tagihan
                    </h6>

                    <h2 class="fw-bold text-white">

                        {{ $tagihans->count() }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <h6 class="text-secondary">
                        Tagihan Dibayar
                    </h6>

                    <h2 class="fw-bold text-success">

                        {{ $tagihans->where('status_tagihan','dibayar')->count() }}

                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card border-0 shadow-sm"
                 style="background:rgba(255,255,255,0.05);
                        border-radius:20px;">

                <div class="card-body">

                    <h6 class="text-secondary">
                        Pending / Jatuh Tempo
                    </h6>

                    <h2 class="fw-bold text-warning">

                        {{ $tagihans->where('status_tagihan','!=','dibayar')->count() }}

                    </h2>

                </div>

            </div>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('tagihan.pemimpin') }}"
                  method="GET">

                <div class="row g-3">

                    <div class="col-md-8">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari nomor tagihan..."
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:12px;
                                      height:55px;">

                    </div>

                    <div class="col-md-4 d-flex gap-2">

                        <button type="submit"
                                class="btn"
                                style="background:#2563eb;
                                       color:white;
                                       border:none;
                                       border-radius:12px;
                                       width:70px;">

                            <i class="bi bi-search"></i>

                        </button>

                        <a href="{{ route('tagihan.pemimpin') }}"
                           class="btn btn-outline-light"
                           style="border-radius:12px;">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="card border-0 shadow-sm"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-0 table-responsive">

            <table class="table align-middle mb-0">

                <thead>

                    <tr style="background:#1e293b;">

                        <th class="text-secondary border-0 py-4 ps-4">
                            No
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Nomor Tagihan
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Pelanggan
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Alat
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Tanggal
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Jatuh Tempo
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Total
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Status
                        </th>

                        <th class="text-secondary border-0 py-4 text-center">
                            Faktur
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($tagihans as $i => $tagihan)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">

                                {{ $tagihans->firstItem() + $i }}

                            </td>

                            <td class="text-white fw-semibold py-4">

                                {{ $tagihan->nomor_tagihan }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $tagihan->kontrak->booking->pelanggan->nama }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $tagihan->kontrak->booking->alat->nama_alat }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $tagihan->tanggal_tagihan }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $tagihan->jatuh_tempo }}

                            </td>

                            <td class="text-success fw-bold py-4">

                                Rp {{ number_format($tagihan->total,0,',','.') }}

                            </td>

                            <td class="py-4">

                                @if($tagihan->status_tagihan == 'dibayar')

                                    <span style="background:#16a34a;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Dibayar

                                    </span>

                                @elseif($tagihan->status_tagihan == 'pending')

                                    <span style="background:#f59e0b;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Pending

                                    </span>

                                @else

                                    <span style="background:#dc2626;
                                                 color:white;
                                                 padding:8px 14px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Jatuh Tempo

                                    </span>

                                @endif

                            </td>

                            <td class="py-4 text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('tagihan.faktur.pemimpin', $tagihan->id) }}"
                                       class="btn btn-sm"
                                       style="background:#0ea5e9;
                                              color:white;
                                              border:none;
                                              border-radius:10px;">

                                        <i class="bi bi-receipt"></i>

                                    </a>

                                    <a href="{{ route('tagihan.cetak', $tagihan->id) }}"
                                       class="btn btn-sm"
                                       style="background:#16a34a;
                                              color:white;
                                              border:none;
                                              border-radius:10px;">

                                        <i class="bi bi-printer"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                class="text-center text-secondary py-5">

                                Data tagihan tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $tagihans->withQueryString()->links() }}

    </div>

</div>

@endsection