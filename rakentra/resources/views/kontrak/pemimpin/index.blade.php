@extends('layout.pemimpin')

@section('title', 'Data Kontrak')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Data Kontrak
            </h2>

            <p class="text-secondary mb-0">
                Monitoring kontrak penyewaan alat berat
            </p>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('kontrak.pemimpin') }}"
                  method="GET">

                <div class="row g-3">

                    <div class="col-md-5">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari nomor kontrak..."
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:12px;
                                      height:55px;">

                    </div>

                    <div class="col-md-3">

                        <select name="status"
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:12px;
                                       height:55px;">

                            <option value="">
                                Semua Status
                            </option>

                            <option value="aktif"
                                {{ request('status') == 'aktif' ? 'selected' : '' }}>

                                Aktif

                            </option>

                            <option value="selesai"
                                {{ request('status') == 'selesai' ? 'selected' : '' }}>

                                Selesai

                            </option>

                            <option value="dibatalkan"
                                {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>

                                Dibatalkan

                            </option>

                        </select>

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

                        <a href="{{ route('kontrak.pemimpin') }}"
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
                            Nomor Kontrak
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
                            Durasi
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Nilai
                        </th>

                        <th class="text-secondary border-0 py-4">
                            PO
                        </th>

                        <th class="text-secondary border-0 py-4">
                            SPK
                        </th>

                        <th class="text-secondary border-0 py-4">
                            PDF
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($kontraks as $i => $kontrak)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">

                                {{ $kontraks->firstItem() + $i }}

                            </td>

                            <td class="text-white fw-semibold py-4">

                                {{ $kontrak->nomor_kontrak }}

                            </td>

                            <td class="text-white py-4">

                                {{ $kontrak->booking->pelanggan->nama }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $kontrak->booking->alat->nama_alat }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $kontrak->tanggal_kontrak }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $kontrak->durasi }} Hari

                            </td>

                            <td class="text-secondary py-4">

                                Rp {{ number_format($kontrak->nilai_kontrak,0,',','.') }}

                            </td>

                            <td class="py-4">

                                @if($kontrak->file_po)

                                    <a href="{{ $kontrak->file_po }}"
                                       target="_blank"
                                       class="btn btn-sm"
                                       style="background:#2563eb;
                                              color:white;
                                              border:none;
                                              border-radius:10px;">

                                        <i class="bi bi-file-earmark"></i>
                                        Lihat

                                    </a>

                                @else

                                    <span class="text-secondary">
                                        Tidak Ada
                                    </span>

                                @endif

                            </td>

                            <td class="py-4">

                                @if($kontrak->file_spk)

                                    <a href="{{ $kontrak->file_spk }}"
                                       target="_blank"
                                       class="btn btn-sm"
                                       style="background:#16a34a;
                                              color:white;
                                              border:none;
                                              border-radius:10px;">

                                        <i class="bi bi-file-earmark"></i>
                                        Lihat

                                    </a>

                                @else

                                    <span class="text-secondary">
                                        Tidak Ada
                                    </span>

                                @endif

                            </td>

                            <td class="py-4">

                                <a href="{{ route('kontrak.spk',$kontrak->id) }}"
                                   target="_blank"
                                   class="btn"
                                   style="background:#dc2626;
                                          color:white;
                                          border:none;
                                          border-radius:10px;
                                          width:42px;
                                          height:42px;
                                          display:flex;
                                          align-items:center;
                                          justify-content:center;">

                                    <i class="bi bi-file-earmark-pdf"></i>

                                </a>

                            </td>

                            <td class="py-4">

                                @if($kontrak->status == 'aktif')

                                    <span style="background:#16a34a;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Aktif

                                    </span>

                                @elseif($kontrak->status == 'selesai')

                                    <span style="background:#2563eb;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Selesai

                                    </span>

                                @else

                                    <span style="background:#dc2626;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Dibatalkan

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="11"
                                class="text-center text-secondary py-5">

                                Data kontrak tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $kontraks->withQueryString()->links() }}

    </div>

</div>

@endsection