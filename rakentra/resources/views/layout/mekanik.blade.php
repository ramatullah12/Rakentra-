<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mekanik - Rakentra')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 20px 15px;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background: #111827;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 12px;
            color: #374151;
            transition: 0.2s;
            text-decoration: none;
        }

        .nav-link:hover {
            background: #f3f4f6;
        }

        .nav-link.active {
            background: #e5e7eb;
            font-weight: 500;
        }

        .content {
            margin-left: 260px;
        }

        .topbar {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 15px 25px;
        }

        .search-box {
            background: #f1f5f9;
            border: none;
            border-radius: 10px;
            padding: 8px 14px;
            outline: none;
        }

        .role-btn {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 6px 14px;
            background: #fff;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="sidebar d-flex flex-column">

    <div class="logo-box">
        <div class="logo-icon">
            <i class="bi bi-box-seam"></i>
        </div>
        <div>
            <strong>Rakentra</strong><br>
            <small class="text-muted">Asset & Rental Mgmt</small>
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

    <div class="mt-auto pt-3 border-top">
        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="bi bi-person-circle fs-4"></i>
            <div>
                <strong>{{ Auth::user()->name }}</strong><br>
                <small class="text-muted">Mekanik</small>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-link text-danger p-0">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

</div>

<div class="content">

    <div class="topbar d-flex justify-content-between align-items-center">

        <div>
            <h5 class="mb-0">@yield('header', 'Dashboard Mekanik')</h5>
            <small class="text-muted">Selamat datang di sistem Rakentra</small>
        </div>

        <div class="d-flex gap-3 align-items-center">
            <input type="text" class="search-box" placeholder="Search...">
            <div class="role-btn">Mekanik</div>
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