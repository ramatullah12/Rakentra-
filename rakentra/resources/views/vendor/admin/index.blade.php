@extends('layout.admin')

@section('title', 'Data Vendor')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold text-white mb-1">Data Vendor</h2>
            <p class="text-secondary mb-0">
                Kelola data vendor dan supplier alat
            </p>
        </div>

        <a href="{{ route('vendor.create') }}"
           class="btn px-4 py-2"
           style="background:#2563eb;
                  color:white;
                  border:none;
                  border-radius:12px;
                  font-weight:600;">

            <i class="bi bi-plus-lg"></i> Tambah

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm"
             style="border-radius:12px;">

            {{ session('success') }}

        </div>

    @endif

    <div class="card border-0 mb-4 shadow-sm"
         style="background:rgba(255,255,255,0.05);
                border-radius:20px;">

        <div class="card-body p-4">

            <form action="{{ route('vendor.index') }}" method="GET">

                <div class="row g-3">

                    <div class="col-md-5">

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control text-white"
                               placeholder="Cari nama vendor..."
                               style="background:#1e293b;
                                      border:none;
                                      border-radius:12px;
                                      height:52px;">

                    </div>

                    <div class="col-md-3">

                        <select name="status"
                                class="form-select text-white"
                                style="background:#1e293b;
                                       border:none;
                                       border-radius:12px;
                                       height:52px;">

                            <option value="">Semua Status</option>

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
                                class="btn px-4"
                                style="background:#2563eb;
                                       color:white;
                                       border:none;
                                       border-radius:12px;
                                       width:70px;">

                            <i class="bi bi-search"></i>

                        </button>

                        <a href="{{ route('vendor.index') }}"
                           class="btn btn-outline-light px-4"
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

                        <th class="text-secondary ps-4 py-4 border-0">
                            No
                        </th>

                        <th class="text-secondary py-4 border-0">
                            Nama Vendor
                        </th>

                        <th class="text-secondary py-4 border-0">
                            No HP
                        </th>

                        <th class="text-secondary py-4 border-0">
                            Alamat
                        </th>

                        <th class="text-secondary py-4 border-0">
                            Status
                        </th>

                        <th class="text-secondary py-4 border-0 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($vendors as $i => $vendor)

                        <tr style="background:rgba(255,255,255,0.03);
                                   border-bottom:1px solid rgba(255,255,255,0.05);">

                            <td class="text-white ps-4 fw-semibold py-4">
                                {{ $vendors->firstItem() + $i }}
                            </td>

                            <td class="text-white fw-semibold py-4">
                                {{ $vendor->nama_vendor }}
                            </td>

                            <td class="text-secondary py-4">
                                {{ $vendor->hp }}
                            </td>

                            <td class="text-secondary py-4">
                                {{ $vendor->alamat }}
                            </td>

                            <td class="py-4">

                                @if($vendor->status == 'aktif')

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

                            <td class="text-center py-4">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('vendor.edit', $vendor->id) }}"
                                       style="width:42px;
                                              height:42px;
                                              display:flex;
                                              align-items:center;
                                              justify-content:center;
                                              background:#2563eb;
                                              color:white;
                                              border-radius:10px;
                                              text-decoration:none;">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <form action="{{ route('vendor.delete', $vendor->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Yakin ingin menghapus vendor?')"
                                                style="width:42px;
                                                       height:42px;
                                                       border:none;
                                                       display:flex;
                                                       align-items:center;
                                                       justify-content:center;
                                                       background:#ef4444;
                                                       color:white;
                                                       border-radius:10px;">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-secondary py-5">

                                Data vendor tidak tersedia

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $vendors->withQueryString()->links() }}

    </div>

</div>

@endsection