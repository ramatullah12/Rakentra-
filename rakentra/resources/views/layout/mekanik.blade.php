<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mekanik - Rakentra')</title>

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

        <a href="{{ route('dashboard.mekanik') }}"
           class="nav-link {{ request()->routeIs('dashboard.mekanik') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i> Dashboard
        </a>

        <a href="{{ url('/mekanik/alat') }}"
           class="nav-link {{ request()->is('mekanik/alat*') ? 'active' : '' }}">
            <i class="bi bi-truck"></i> Alat Berat
        </a>

        <a href="{{ url('/mekanik/operasional') }}"
           class="nav-link {{ request()->is('mekanik/operasional*') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i> Operasional
        </a>

        <a href="{{ url('/mekanik/maintenance') }}"
           class="nav-link {{ request()->is('mekanik/maintenance*') ? 'active' : '' }}">
            <i class="bi bi-tools"></i> Maintenance
        </a>

        <a href="{{ url('/mekanik/inspeksi') }}"
           class="nav-link {{ request()->is('mekanik/inspeksi*') ? 'active' : '' }}">
            <i class="bi bi-clipboard-check"></i> Inspeksi
        </a>

    </div>

    <div class="mt-auto pt-3 border-top border-secondary">

        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="bi bi-person-circle fs-5"></i>
            <div>
                <strong>{{ Auth::user()->name }}</strong><br>
                <small class="text-light">Mekanik</small>
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
            <h5 class="mb-0 text-white">@yield('header', 'Dashboard Mekanik')</h5>
            <small class="text-secondary">Selamat datang di sistem Rakentra</small>
        </div>

        <div class="d-flex gap-3 align-items-center">

            <input type="text" class="search-box" placeholder="Search...">

            <div class="role-btn">
                Mekanik
            </div>

            <i class="bi bi-bell"></i>

        </div>

    </div>

    <div class="p-4">
        @yield('content')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>