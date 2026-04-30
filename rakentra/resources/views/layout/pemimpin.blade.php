<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pimpinan - Rakentra</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background:#f8fafc;
            font-family: 'Inter', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width:260px;
            height:100vh;
            position:fixed;
            background:#ffffff;
            border-right:1px solid #e5e7eb;
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
            background:#0f172a;
            border-radius:10px;
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

        /* MENU */
        .nav-link {
            display:flex;
            align-items:center;
            gap:12px;
            padding:10px 12px;
            border-radius:10px;
            color:#475569;
            font-size:14px;
            transition:0.2s;
        }

        .nav-link:hover {
            background:#f1f5f9;
        }

        .nav-link.active {
            background:#eef2ff;
            color:#4f46e5;
            font-weight:500;
        }

        .menu-icon {
            width:18px;
        }

        /* USER */
        .user-box {
            margin-top:auto;
            padding-top:15px;
            border-top:1px solid #e5e7eb;
        }

        .user-info {
            font-size:14px;
        }

        /* CONTENT */
        .content {
            margin-left:260px;
        }

        /* TOPBAR */
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

<!-- SIDEBAR -->
<div class="sidebar d-flex flex-column">

    <!-- LOGO -->
    <div class="logo-box">
        <div class="logo-icon">📦</div>
        <div class="logo-text">
            <strong>Rakentra</strong><br>
            <small>Asset & Rental Mgmt</small>
        </div>
    </div>

    <!-- MENU -->
    <div class="nav flex-column">

        <a href="{{ url('/pimpinan') }}" class="nav-link active">
            <span class="menu-icon">🏠</span> Dashboard Executive
        </a>

        <a href="#" class="nav-link">
            <span class="menu-icon">📍</span> Monitoring Armada
        </a>

        <a href="#" class="nav-link">
            <span class="menu-icon">🚛</span> Data Alat Berat
        </a>

        <a href="#" class="nav-link">
            <span class="menu-icon">👥</span> Data Pelanggan
        </a>

        <a href="#" class="nav-link">
            <span class="menu-icon">📅</span> Booking
        </a>

        <a href="#" class="nav-link">
            <span class="menu-icon">📄</span> Kontrak
        </a>

        <a href="#" class="nav-link">
            <span class="menu-icon">🛒</span> Data Vendor
        </a>

        <a href="#" class="nav-link">
            <span class="menu-icon">📊</span> Laporan
        </a>

    </div>

    <!-- USER -->
    <div class="user-box">
        <div class="d-flex align-items-center gap-2 mb-2">
            👤
            <div class="user-info">
                <strong>{{ Auth::user()->name }}</strong><br>
                <small class="text-muted">Pimpinan</small>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-link text-danger p-0">Logout</button>
        </form>
    </div>

</div>

<!-- CONTENT -->
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
                Pimpinan 
            </div>

            <div class="notif">
                🔔
                <div class="notif-dot"></div>
            </div>

        </div>

    </div>

    <!-- MAIN -->
    <div class="p-4">
        @yield('content')
    </div>

</div>

</body>
</html>