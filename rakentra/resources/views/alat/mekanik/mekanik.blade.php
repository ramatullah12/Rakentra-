@extends('layout.mekanik')

@section('title', 'Data Alat')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Data Alat Berat
            </h2>

            <p class="text-secondary mb-0">
                Monitoring alat berat operasional
            </p>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form method="GET">

                <div class="row g-3">

                    <div class="col-md-8">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari alat..."
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

                        <a href=""
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
                            Nama Alat
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Kategori
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Merk
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Tahun
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($alats as $i => $alat)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">

                                {{ $alats->firstItem() + $i }}

                            </td>

                            <td class="text-white fw-semibold py-4">

                                {{ $alat->nama_alat }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $alat->kategori }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $alat->merk }}

                            </td>

                            <td class="text-secondary py-4">

                                {{ $alat->tahun }}

                            </td>

                            <td class="py-4">

                                @if($alat->status == 'tersedia')

                                    <span style="background:#16a34a;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Tersedia

                                    </span>

                                @elseif($alat->status == 'disewa')

                                    <span style="background:#2563eb;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Disewa

                                    </span>

                                @else

                                    <span style="background:#dc2626;
                                                 color:white;
                                                 padding:8px 16px;
                                                 border-radius:10px;
                                                 font-size:13px;
                                                 font-weight:600;">

                                        Maintenance

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-secondary py-5">

                                Data alat tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $alats->withQueryString()->links() }}

    </div>

</div>

@endsection