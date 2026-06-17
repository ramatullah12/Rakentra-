@extends('layout.admin')

@section('title', 'Data Mobilisasi')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Data Mobilisasi
            </h2>

            <p class="text-secondary mb-0">
                Manajemen pengiriman alat berat
            </p>

        </div>

        <a href="{{ route('mobilisasi.create') }}"
           class="btn"
           style="background:#2563eb;
                  color:white;
                  border:none;
                  border-radius:14px;
                  padding:12px 25px;
                  font-weight:600;">

            <i class="bi bi-plus-lg"></i> Tambah

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm"
             style="border-radius:14px;">

            {{ session('success') }}

        </div>

    @endif

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('mobilisasi.index') }}"
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

                            <option value="dijadwalkan"
                                {{ request('status') == 'dijadwalkan' ? 'selected' : '' }}>

                                Dijadwalkan

                            </option>

                            <option value="dikirim"
                                {{ request('status') == 'dikirim' ? 'selected' : '' }}>

                                Dikirim

                            </option>

                            <option value="sampai"
                                {{ request('status') == 'sampai' ? 'selected' : '' }}>

                                Sampai

                            </option>

                            <option value="pengembalian"
                                {{ request('status') == 'pengembalian' ? 'selected' : '' }}>

                                Pengembalian

                            </option>

                            <option value="selesai"
                                {{ request('status') == 'selesai' ? 'selected' : '' }}>

                                Selesai

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

                        <a href="{{ route('mobilisasi.index') }}"
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
                            Tanggal Kirim
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Tanggal Kembali
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Lokasi
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Status
                        </th>

                        <th class="text-secondary border-0 py-4 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($mobilisasis as $i => $mobilisasi)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">

                                {{ $mobilisasis->firstItem() + $i }}

                            </td>

                            <td class="text-white fw-semibold py-4">

                                {{ $mobilisasi->kontrak->nomor_kontrak }}

                            </td>

                            <td class="text-white py-4">

                                {{ $mobilisasi->kontrak->booking->pelanggan->nama }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $mobilisasi->kontrak->booking->alat->nama_alat }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $mobilisasi->tanggal_kirim }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $mobilisasi->tanggal_kembali ?? '-' }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $mobilisasi->lokasi_proyek }}

                            </td>

                            <td class="py-4">

                                @if($mobilisasi->status == 'dijadwalkan')

                                    <span style="background:#f59e0b;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Dijadwalkan

                                    </span>

                                @elseif($mobilisasi->status == 'dikirim')

                                    <span style="background:#2563eb;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Dikirim

                                    </span>

                                @elseif($mobilisasi->status == 'sampai')

                                    <span style="background:#16a34a;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Sampai

                                    </span>

                                @elseif($mobilisasi->status == 'pengembalian')

                                    <span style="background:#8b5cf6;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Pengembalian

                                    </span>

                                @else

                                    <span style="background:#64748b;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Selesai

                                    </span>

                                @endif

                            </td>

                            <td class="py-4">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('mobilisasi.edit',$mobilisasi->id) }}"
                                       class="btn"
                                       style="background:#2563eb;
                                              color:white;
                                              border:none;
                                              border-radius:10px;
                                              width:42px;
                                              height:42px;
                                              display:flex;
                                              align-items:center;
                                              justify-content:center;">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <form action="{{ route('mobilisasi.destroy',$mobilisasi->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin hapus data?')"
                                                class="btn"
                                                style="background:#ef4444;
                                                       color:white;
                                                       border:none;
                                                       border-radius:10px;
                                                       width:42px;
                                                       height:42px;
                                                       display:flex;
                                                       align-items:center;
                                                       justify-content:center;">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                class="text-center text-secondary py-5">

                                Data mobilisasi tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $mobilisasis->withQueryString()->links() }}

    </div>

</div>

@endsection