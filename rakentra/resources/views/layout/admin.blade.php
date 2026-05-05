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

        .logo-text strong { color:#fff; }
        .logo-text small { color:#cbd5f5; }

        .nav-link {
            display:flex;
            align-items:center;
            gap:10px;
            padding:10px 12px;
            border-radius:12px;
            color:#cbd5f5;
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

        .title { color:#fff; font-weight:600; }
        .subtitle { color:#cbd5f5; font-size:13px; }

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

        .user-box {
            margin-top:auto;
            padding-top:15px;
            border-top:1px solid rgba(255,255,255,0.1);
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

        .table thead th {
            background:#1e293b !important;
            color:#94a3b8;
        }

        .table td {
            color:#e2e8f0;
        }

        .table tbody tr:hover {
            background: rgba(255,255,255,0.04);
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

        <a href="{{ url('/admin') }}"
           class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> Dashboard
        </a>

        <a href="{{ route('user.index') }}"
           class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> User Management
        </a>

        <a href="{{ route('alat.admin') }}"
           class="nav-link {{ request()->is('alat-admin*') ? 'active' : '' }}">
            <i class="bi bi-truck"></i> Data Alat Berat
        </a>

        <a href="{{ route('pelanggan.index') }}"
           class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
            <i class="bi bi-person"></i> Data Pelanggan
        </a>

        <a href="#" class="nav-link"><i class="bi bi-calendar"></i> Booking</a>
        <a href="#" class="nav-link"><i class="bi bi-file-earmark-text"></i> Kontrak</a>
        <a href="#" class="nav-link"><i class="bi bi-box"></i> Mobilisasi</a>
        <a href="#" class="nav-link"><i class="bi bi-cart"></i> Vendor</a>
        <a href="#" class="nav-link"><i class="bi bi-clock"></i> Operasional</a>
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
                <small class="text-light">Admin</small>
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