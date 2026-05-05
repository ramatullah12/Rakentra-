@extends('layout.admin')

@section('title','Data Alat')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 text-white fw-bold">Data Alat Berat</h4>
            <small class="text-secondary">Manajemen alat berat</small>
        </div>

        <a href="{{ route('alat.create') }}"
           class="btn px-4"
           style="background:linear-gradient(135deg,#2563eb,#1d4ed8); border-radius:12px; color:#fff;">
            <i class="bi bi-plus-lg"></i> Tambah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm"
         style="background: rgba(255,255,255,0.05); border-radius:20px;">

        <div class="card-body p-0 table-responsive">

            <table class="table mb-0 align-middle text-white">

                <thead>
                    <tr style="background:#1e293b;">
                        <th class="ps-4 text-secondary">Nama</th>
                        <th class="text-secondary">Kode</th>
                        <th class="text-secondary">Lokasi</th>
                        <th class="text-secondary">HM</th>
                        <th class="text-secondary">Status</th>
                        <th class="text-center text-secondary">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($alats as $alat)

                    <tr style="
                        border-bottom:1px solid rgba(255,255,255,0.05);
                        transition:0.2s;
                    "
                    onmouseover="this.style.background='#1e293b'"
                    onmouseout="this.style.background='transparent'">

                        <td class="ps-4 fw-semibold">{{ $alat->nama_alat }}</td>
                        <td>{{ $alat->kode_alat }}</td>
                        <td class="text-secondary">{{ $alat->lokasi }}</td>
                        <td class="text-secondary">{{ $alat->hour_meter }}</td>

                        <td>
                            @if($alat->status == 'tersedia')
                                <span style="
                                    background:#16a34a;
                                    padding:6px 14px;
                                    border-radius:10px;
                                    font-size:12px;
                                ">
                                    Tersedia
                                </span>
                            @elseif($alat->status == 'disewa')
                                <span style="
                                    background:#facc15;
                                    color:#000;
                                    padding:6px 14px;
                                    border-radius:10px;
                                    font-size:12px;
                                ">
                                    Disewa
                                </span>
                            @else
                                <span style="
                                    background:#ef4444;
                                    padding:6px 14px;
                                    border-radius:10px;
                                    font-size:12px;
                                ">
                                    Maintenance
                                </span>
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">

                                <a href="{{ route('alat.edit',$alat->id) }}"
                                   class="btn btn-sm"
                                   style="
                                    background:#2563eb;
                                    border-radius:10px;
                                    width:38px;
                                    height:38px;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                   ">
                                    <i class="bi bi-pencil text-white"></i>
                                </a>

                                <form action="{{ route('alat.delete',$alat->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm"
                                        style="
                                            background:#ef4444;
                                            border-radius:10px;
                                            width:38px;
                                            height:38px;
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                        "
                                        onclick="return confirm('Yakin hapus data?')">
                                        <i class="bi bi-trash text-white"></i>
                                    </button>

                                </form>

                            </div>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-secondary py-4">
                            Data belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection