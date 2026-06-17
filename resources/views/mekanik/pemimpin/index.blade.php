@extends('layout.pemimpin')

@section('title', 'Data Mekanik')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Data Mekanik
            </h2>

            <p class="text-secondary mb-0">
                Monitoring data mekanik perusahaan
            </p>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('mekanik.pemimpin') }}"
                  method="GET">

                <div class="row g-3">

                    <div class="col-md-5">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari nama mekanik..."
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

                            <option value="nonaktif"
                                {{ request('status') == 'nonaktif' ? 'selected' : '' }}>

                                Nonaktif

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

                        <a href="{{ route('mekanik.pemimpin') }}"
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
                            Nama Mekanik
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Email
                        </th>

                        <th class="text-secondary border-0 py-4">
                            No HP
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Spesialisasi
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($mekaniks as $i => $mekanik)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">

                                {{ $mekaniks->firstItem() + $i }}

                            </td>

                            <td class="text-white fw-semibold py-4">

                                {{ $mekanik->nama_mekanik }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $mekanik->email }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $mekanik->no_hp }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $mekanik->spesialisasi }}

                            </td>

                            <td class="py-4">

                                @if($mekanik->status == 'aktif')

                                    <span style="background:#16a34a;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Aktif

                                    </span>

                                @else

                                    <span style="background:#ef4444;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Nonaktif

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-secondary py-5">

                                Data mekanik tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $mekaniks->withQueryString()->links() }}

    </div>

</div>

@endsection