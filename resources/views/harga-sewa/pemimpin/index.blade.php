@extends('layout.pemimpin')

@section('title', 'Harga Sewa')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold text-white mb-1">
                Data Harga Sewa
            </h2>

            <p class="text-secondary mb-0">
                Monitoring harga sewa alat berat
            </p>

        </div>

    </div>

    <div class="card border-0 shadow-sm mb-4"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('harga-sewa.index') }}"
                  method="GET">

                <div class="row g-3">

                    <div class="col-md-5">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari nama alat..."
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

                        <a href="{{ route('harga-sewa.index') }}"
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
                            Harga Harian
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Harga Mingguan
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Harga Bulanan
                        </th>

                        <th class="text-secondary border-0 py-4">
                            Keterangan
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($hargaSewas as $i => $harga)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white fw-semibold py-4 ps-4">

                                {{ $hargaSewas->firstItem() + $i }}

                            </td>

                            <td class="text-white fw-semibold py-4">

                                {{ $harga->alat->nama_alat }}

                            </td>

                            <td class="text-secondary py-4">

                                Rp {{ number_format($harga->harga_harian,0,',','.') }}

                            </td>

                            <td class="text-secondary py-4">

                                @if($harga->harga_mingguan)

                                    Rp {{ number_format($harga->harga_mingguan,0,',','.') }}

                                @else

                                    -

                                @endif

                            </td>

                            <td class="text-secondary py-4">

                                @if($harga->harga_bulanan)

                                    Rp {{ number_format($harga->harga_bulanan,0,',','.') }}

                                @else

                                    -

                                @endif

                            </td>

                            <td class="text-secondary py-4">

                                {{ $harga->keterangan ?? '-' }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-secondary py-5">

                                Data harga sewa tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $hargaSewas->withQueryString()->links() }}

    </div>

</div>

@endsection