<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin - Rakentra')</title>

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
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(20px);
            border-right:1px solid rgba(255,255,255,0.08);
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

        .logo-text strong { color:#fff; }
        .logo-text small { color:#94a3b8; }

        .nav-link {
            display:flex;
            align-items:center;
            gap:10px;
            padding:10px 12px;
            border-radius:10px;
            color:#cbd5f5;
            transition:0.2s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.08);
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
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border-bottom:1px solid rgba(255,255,255,0.08);
            padding:15px 25px;
        }

        .title { color:#fff; font-weight:600; }
        .subtitle { color:#94a3b8; font-size:13px; }

        .search-box {
            background: rgba(255,255,255,0.08);
            border:none;
            border-radius:10px;
            padding:8px 14px;
            color:#fff;
        }

        .search-box::placeholder {
            color:#94a3b8;
        }

        .role-btn {
            background: linear-gradient(135deg,#2563eb,#1d4ed8);
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
            background:#ef4444;
            border-radius:50%;
        }

        .user-box {
            margin-top:auto;
            padding-top:15px;
            border-top:1px solid rgba(255,255,255,0.08);
        }

        .card {
            background: rgba(255,255,255,0.05);
            border:none;
            border-radius:15px;
            color:#fff;
        }

        .form-control,
        .form-select {
            background:#1e293b !important;
            border:1px solid rgba(255,255,255,0.08) !important;
            color:#e2e8f0 !important;
            border-radius:10px;
        }

        .form-control:focus,
        .form-select:focus {
            background:#1e293b !important;
            border-color:#2563eb !important;
            color:#fff !important;
            box-shadow:0 0 0 1px #2563eb !important;
        }

        .form-control::placeholder {
            color:#94a3b8 !important;
        }

        label {
            color:#cbd5f5;
        }

        .table {
            --bs-table-bg: transparent !important;
            --bs-table-striped-bg: transparent !important;
            --bs-table-hover-bg: transparent !important;
            background: transparent !important;
            color:#e2e8f0 !important;
        }

        .table thead {
            background:#1e293b !important;
        }

        .table thead th {
            background:#1e293b !important;
            color:#94a3b8 !important;
            border:none !important;
        }

        .table tbody tr {
            background: transparent !important;
            border-bottom:1px solid rgba(255,255,255,0.05);
            transition:0.2s;
        }

        .table tbody tr:hover {
            background:#1e293b !important;
        }

        .table tbody td {
            background: transparent !important;
            color:#e2e8f0 !important;
            border-color: rgba(255,255,255,0.05) !important;
        }

        .table * {
            background-color: transparent !important;
        }

        .badge-status {
            background:#16a34a;
            padding:5px 12px;
            border-radius:8px;
            font-size:12px;
        }

        .btn-warning {
            background:#facc15;
            border:none;
        }

        .btn-danger {
            border:none;
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

        <a href="{{ url('/admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> Dashboard
        </a>
        <a href="{{ route('alat.admin') }}" class="nav-link {{ request()->is('alat-admin*') ? 'active' : '' }}">
            <i class="bi bi-truck"></i> Data Alat Berat
        </a>

        <a href="{{ route('pelanggan.index') }}" class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
            <i class="bi bi-person"></i> Data Pelanggan
        </a>

        <a href="{{ route('booking.index') }}"
            class="nav-link {{ request()->routeIs('booking.*') ? 'active' : '' }}">
            <i class="bi bi-calendar"></i> Booking
        </a>
        <a href="{{ route('kontrak.index') }}"
            class="nav-link {{ request()->routeIs('kontrak.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i> Kontrak
        </a>
        <a href="{{ route('mobilisasi.index') }}"
            class="nav-link {{ request()->routeIs('mobilisasi.*') ? 'active' : '' }}">
            <i class="bi bi-box"></i> Mobilisasi
        </a>
        <a href="{{ route('vendor.index') }}"
            class="nav-link {{ request()->routeIs('vendor.*') ? 'active' : '' }}">
            <i class="bi bi-cart"></i> Vendor
        </a>
        <a href="{{ route('operasional.index') }}"
            class="nav-link {{ request()->routeIs('operasional.*') ? 'active' : '' }}">
            <i class="bi bi-clock"></i> Operasional
        </a>
        <a href="#" class="nav-link"><i class="bi bi-currency-dollar"></i> Biaya</a>
        <a href="#" class="nav-link"><i class="bi bi-wrench"></i> Maintenance</a>
        <a href="#" class="nav-link"><i class="bi bi-receipt"></i> Tagihan & Faktur</a>
        <a href="#" class="nav-link"><i class="bi bi-bar-chart"></i> Laporan</a>

    </div>

    <div class="user-box">

        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="bi bi-person-circle fs-5"></i>
            <div>
                <strong>{{ Auth::user()->name }}</strong><br>
                <small class="text-secondary">Admin</small>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
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
            <div class="title">@yield('title')</div>
            <div class="subtitle">Selamat datang di sistem Rakentra</div>
        </div>

        <div class="d-flex align-items-center gap-3">

            <input type="text" class="search-box" placeholder="Search...">

            <div class="role-btn">Admin</div>

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

</body>
</html>