<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Rakentra</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background:#f8fafc;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            width:260px;
            height:100vh;
            position:fixed;
            background:#ffffff;
            border-right:1px solid #e5e7eb;
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
            background:#111827;
            border-radius:12px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#fff;
            font-size:18px;
        }

        .logo-text strong {
            font-size:16px;
        }

        .logo-text small {
            font-size:12px;
            color:#64748b;
        }

        .nav-link {
            display:flex;
            align-items:center;
            gap:10px;
            padding:10px 12px;
            border-radius:12px;
            color:#374151;
            font-size:14px;
            transition:0.2s;
        }

        .nav-link i {
            font-size:16px;
        }

        .nav-link:hover {
            background:#f3f4f6;
        }

        .nav-link.active {
            background:#e5e7eb;
            font-weight:500;
        }

        .user-box {
            margin-top:auto;
            padding-top:15px;
            border-top:1px solid #e5e7eb;
        }

        .content {
            margin-left:260px;
        }

        .topbar {
            background:#fff;
            border-bottom:1px solid #e5e7eb;
            padding:15px 25px;
        }

        .title {
            font-weight:600;
            font-size:18px;
        }

        .subtitle {
            font-size:13px;
            color:#64748b;
        }

        .search-box {
            background:#f1f5f9;
            border:none;
            border-radius:10px;
            padding:8px 14px;
            font-size:14px;
            width:220px;
        }

        .role-btn {
            border:1px solid #e5e7eb;
            border-radius:10px;
            padding:6px 12px;
            font-size:14px;
            background:#fff;
        }

        .notif {
            position:relative;
            font-size:18px;
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
    </style>
</head>

<body>

<div class="sidebar d-flex flex-column">

    <!-- LOGO -->
    <div class="logo-box">
        <div class="logo-icon">
            <i class="bi bi-box-seam"></i>
        </div>
        <div class="logo-text">
            <strong>Rakentra</strong><br>
            <small>Asset & Rental Mgmt</small>
        </div>
    </div>

    <!-- MENU -->
    <div class="nav flex-column gap-1">

        <a href="{{ url('/admin') }}" class="nav-link active">
            <i class="bi bi-house-door"></i> Dashboard
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-people"></i> User Management
        </a>

        <a href="{{ route('alat.admin') }}"
            class="nav-link {{ request()->is('alat-admin*') ? 'active' : '' }}">
            <i class="bi bi-truck"></i> Data Alat Berat
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-person"></i> Data Pelanggan
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-calendar"></i> Booking
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-file-earmark-text"></i> Kontrak
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-box"></i> Mobilisasi
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-cart"></i> Vendor
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-clock"></i> Operasional
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-currency-dollar"></i> Biaya
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-wrench"></i> Maintenance
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-receipt"></i> Tagihan & Faktur
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-bar-chart"></i> Laporan
        </a>

        <a href="#" class="nav-link d-flex justify-content-between align-items-center">
            <span><i class="bi bi-geo-alt"></i> Monitoring</span>
            <i class="bi bi-chevron-down"></i>
        </a>

    </div>

    <!-- USER -->
    <div class="user-box">
        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="bi bi-person-circle fs-5"></i>
            <div>
                <strong>{{ Auth::user()->name }}</strong><br>
                <small class="text-muted">Admin</small>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-link text-danger p-0 d-flex align-items-center gap-1">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

</div>

<div class="content">

    <!-- NAVBAR -->
    <div class="topbar d-flex justify-content-between align-items-center">

        <div>
            <div class="title">@yield('title')</div>
            <div class="subtitle">Selamat datang di sistem Rakentra</div>
        </div>

        <div class="d-flex align-items-center gap-3">

            <input type="text" class="search-box" placeholder="Search...">

            <div class="role-btn">
                Admin
            </div>

            <div class="notif">
                <i class="bi bi-bell"></i>
                <div class="notif-dot"></div>
            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="p-4">
        @yield('content')
    </div>

</div>

</body>
</html>