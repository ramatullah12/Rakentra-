@extends('layout.pemimpin')

@section('title', 'Data Booking')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold text-white mb-1">
                Data Booking
            </h2>

            <p class="text-secondary mb-0">
                Monitoring booking alat berat
            </p>
        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('booking.pemimpin') }}" method="GET">

                <div class="row g-3">

                    <div class="col-md-5">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari pelanggan..."
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

                            <option value="">Semua Status</option>

                            <option value="pending"
                                {{ request('status') == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="disetujui"
                                {{ request('status') == 'disetujui' ? 'selected' : '' }}>
                                Disetujui
                            </option>

                            <option value="berjalan"
                                {{ request('status') == 'berjalan' ? 'selected' : '' }}>
                                Berjalan
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

                        <a href="{{ route('booking.pemimpin') }}"
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
                            Pelanggan
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Alat
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Tgl Booking
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Mulai
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Selesai
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($bookings as $i => $booking)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">
                                {{ $bookings->firstItem() + $i }}
                            </td>

                            <td class="text-white fw-semibold py-4">
                                {{ $booking->pelanggan->nama }}
                            </td>

                            <td class="text-secondary py-4">
                                {{ $booking->alat->nama_alat }}
                            </td>

                            <td class="text-secondary py-4">
                                {{ $booking->tanggal_booking }}
                            </td>

                            <td class="text-secondary py-4">
                                {{ $booking->tanggal_mulai }}
                            </td>

                            <td class="text-secondary py-4">
                                {{ $booking->tanggal_selesai }}
                            </td>

                            <td class="py-4">

                                @if($booking->status == 'pending')

                                    <span style="background:#f59e0b;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Pending

                                    </span>

                                @elseif($booking->status == 'disetujui')

                                    <span style="background:#2563eb;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Disetujui

                                    </span>

                                @elseif($booking->status == 'berjalan')

                                    <span style="background:#16a34a;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Berjalan

                                    </span>

                                @elseif($booking->status == 'selesai')

                                    <span style="background:#0f766e;
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

                            <td colspan="7"
                                class="text-center text-secondary py-5">

                                Data booking tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $bookings->withQueryString()->links() }}

    </div>

</div>

@endsection