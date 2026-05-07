<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Pimpinan - Rakentra')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            font-family: 'Inter', sans-serif;
            color:#fff;
        }

        .sidebar {
            width:260px;
            height:100vh;
            position:fixed;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            border-right:1px solid rgba(255,255,255,0.1);
            padding:20px 15px;
            overflow-y:auto;
        }

        .logo-box {
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:30px;
        }

        .logo-icon {
            width:42px;
            height:42px;
            border-radius:12px;
            overflow:hidden;
        }

        .logo-icon img {
            width:100%;
            height:100%;
            object-fit:contain;
        }

        .logo-text strong {
            color:#fff;
        }

        .logo-text small {
            color:#cbd5f5;
        }

        .nav-link {
            display:flex;
            align-items:center;
            gap:10px;
            padding:10px 12px;
            border-radius:12px;
            color:#cbd5f5;
            font-size:14px;
            transition:0.2s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color:#fff;
            transform: translateX(4px);
        }

        .nav-link.active {
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
            color:#fff;
        }

        .content {
            margin-left:260px;
        }

        .topbar {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            border-bottom:1px solid rgba(255,255,255,0.1);
            padding:15px 25px;
        }

        .title {
            font-weight:600;
        }

        .subtitle {
            font-size:13px;
            color:#cbd5f5;
        }

        .search-box {
            background: rgba(255,255,255,0.1);
            border:none;
            border-radius:10px;
            padding:8px 14px;
            color:#fff;
        }

        .search-box::placeholder {
            color:#cbd5f5;
        }

        .role-btn {
            background:#2563eb;
            color:#fff;
            border:none;
            border-radius:10px;
            padding:6px 12px;
        }

        .notif {
            position:relative;
        }

        .notif-dot {
            position:absolute;
            top:-2px;
            right:-2px;
            width:7px;
            height:7px;
            background:red;
            border-radius:50%;
        }

        .card {
            background: rgba(255,255,255,0.05);
            border:none;
            color:#fff;
        }

        .table {
            background: transparent !important;
            color:#e2e8f0;
        }

        .table > :not(caption) > * > * {
            background: transparent !important;
        }

        .table thead th {
            background:#1e293b !important;
            color:#94a3b8;
        }

        .table tbody tr {
            border-bottom:1px solid rgba(255,255,255,0.05);
            transition:0.2s;
        }

        .table tbody tr:hover {
            background: rgba(255,255,255,0.04) !important;
        }

        .table td {
            color:#e2e8f0 !important;
        }

        .table td.fw-semibold {
            color:#ffffff !important;
        }

        .table td,
        .table th {
            border-color: rgba(255,255,255,0.05) !important;
        }

        .badge {
            font-size:12px;
            background:#475569;
            color:#fff;
        }

        .form-control,
        .form-select {
            background:#1e293b !important;
            border:1px solid rgba(255,255,255,0.08) !important;
            color:#fff !important;
            border-radius:12px;
        }

        .form-control:focus,
        .form-select:focus {
            background:#1e293b !important;
            border-color:#2563eb !important;
            box-shadow:none !important;
            color:#fff !important;
        }

        .form-control::placeholder {
            color:#94a3b8;
        }

        label {
            color:#cbd5f5;
        }
    </style>
</head>

<body>

<div class="sidebar d-flex flex-column">

    <div class="logo-box">

        <div class="logo-icon">

            <img src="{{ asset('images/logo.png') }}">

        </div>

        <div class="logo-text">

            <strong>Rakentra</strong><br>

            <small>Asset & Rental Mgmt</small>

        </div>

    </div>

    <div class="nav flex-column gap-1">

        <a href="{{ route('dashboard.pemimpin') }}"
           class="nav-link {{ request()->routeIs('dashboard.pemimpin') ? 'active' : '' }}">

            <i class="bi bi-house-door"></i> Dashboard

        </a>

        <a href="{{ route('user.index') }}"
           class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">

            <i class="bi bi-person-gear"></i> Manajemen User

        </a>

        <a href="{{ route('alat.pemimpin') }}"
           class="nav-link {{ request()->routeIs('alat.pemimpin') ? 'active' : '' }}">

            <i class="bi bi-truck"></i> Alat Berat

        </a>

        <a href="{{ route('booking.pemimpin') }}"
           class="nav-link {{ request()->routeIs('booking.*') ? 'active' : '' }}">

            <i class="bi bi-calendar"></i> Booking

        </a>

        <a href="{{ route('vendor.pemimpin') }}"
           class="nav-link {{ request()->routeIs('vendor.*') ? 'active' : '' }}">

            <i class="bi bi-cart"></i> Vendor

        </a>

        <a href="{{ route('kontrak.pemimpin') }}"
           class="nav-link {{ request()->routeIs('kontrak.*') ? 'active' : '' }}">

            <i class="bi bi-file-earmark-text"></i> Kontrak

        </a>

        <a href="{{ route('mobilisasi.pemimpin') }}"
           class="nav-link {{ request()->routeIs('mobilisasi.*') ? 'active' : '' }}">

            <i class="bi bi-box"></i> Mobilisasi

        </a>

        <a href="{{ route('operasional.pemimpin') }}"
           class="nav-link {{ request()->routeIs('operasional.*') ? 'active' : '' }}">

            <i class="bi bi-clock-history"></i> Operasional

        </a>

        <a href="{{ route('inspeksi.pemimpin') }}"
           class="nav-link {{ request()->routeIs('inspeksi.*') ? 'active' : '' }}">

            <i class="bi bi-clipboard-check"></i> Inspeksi

        </a>

        <a href="{{ route('maintenance.pemimpin') }}"
            class="nav-link {{ request()->routeIs('maintenance.*') ? 'active' : '' }}">
            <i class="bi bi-tools"></i> Maintenance
        </a>

        <a href="{{ route('tagihan.pemimpin') }}"
            class="nav-link {{ request()->routeIs('tagihan.*') ? 'active' : '' }}">
            <i class="bi bi-receipt"></i> Tagihan & Faktur
        </a>

        <a href="{{ route('material.pemimpin') }}"
            class="nav-link {{ request()->routeIs('material.*') ? 'active' : '' }}">
            <i class="bi bi-box-seam"></i> Material Request
        </a>

        <a href="#"
           class="nav-link">

            <i class="bi bi-bar-chart"></i> Laporan

        </a>

    </div>

    <div class="mt-auto pt-3 border-top border-secondary">

        <div class="d-flex align-items-center gap-2 mb-2">

            <i class="bi bi-person-circle fs-5"></i>

            <div>

                <strong>{{ Auth::user()->name }}</strong><br>

                <small class="text-light">
                    {{ auth()->user()->role }}
                </small>

            </div>

        </div>

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button class="btn btn-sm btn-danger w-100">

                Logout

            </button>

        </form>

    </div>

</div>

<div class="content">

    <div class="topbar d-flex justify-content-between align-items-center">

        <div>

            <div class="title">

                @yield('title')

            </div>

            <div class="subtitle">

                Dashboard sistem Rakentra

            </div>

        </div>

        <div class="d-flex gap-3 align-items-center">

            <input type="text"
                   class="search-box"
                   placeholder="Search...">

            <div class="role-btn">

                {{ auth()->user()->role }}

            </div>

            <div class="notif">

                <i class="bi bi-bell"></i>

                <div class="notif-dot"></div>

            </div>

        </div>

    </div>

    <div class="p-4">

        @yield('content')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>