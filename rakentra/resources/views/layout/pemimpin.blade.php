<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pimpinan - Rakentra</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            border-radius:12px;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
        }

        .logo-icon img {
            width:100%;
            height:100%;
            object-fit:contain;
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

        /* ===== TAMBAHAN DARK UI ===== */

        body {
            background: linear-gradient(135deg, #0f172a, #1e293b) !important;
            color:#fff;
        }

        .sidebar {
            background: rgba(255,255,255,0.08) !important;
            backdrop-filter: blur(15px);
            border-right:1px solid rgba(255,255,255,0.1) !important;
            color:#fff !important;
        }

        .logo-text strong {
            color:#fff !important;
        }

        .logo-text small {
            color:#cbd5f5 !important;
        }

        .nav-link {
            color:#cbd5f5 !important;
        }

        .nav-link i {
            color:#cbd5f5 !important;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1) !important;
            color:#fff !important;
            transform: translateX(4px);
        }

        .nav-link.active {
            background: linear-gradient(135deg,#2563eb,#1d4ed8) !important;
            color:#fff !important;
            box-shadow: 0 6px 12px rgba(37,99,235,0.3);
        }

        .user-box {
            border-top:1px solid rgba(255,255,255,0.1) !important;
        }

        .user-box small {
            color:#cbd5f5 !important;
        }

        .topbar {
            background: rgba(255,255,255,0.08) !important;
            backdrop-filter: blur(15px);
            border-bottom:1px solid rgba(255,255,255,0.1) !important;
            color:#fff !important;
        }

        .title {
            color:#fff !important;
        }

        .subtitle {
            color:#cbd5f5 !important;
        }

        .search-box {
            background: rgba(255,255,255,0.1) !important;
            color:#fff !important;
        }

        .search-box::placeholder {
            color:#cbd5f5;
        }

        .role-btn {
            background:#2563eb !important;
            color:#fff !important;
            border:none !important;
        }

        .notif i {
            color:#fff !important;
        }

        .content {
            color:#fff !important;
        }

        .p-4 {
            color:#fff !important;
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

        <a href="{{ url('/pimpinan') }}" class="nav-link active">
            <i class="bi bi-house-door"></i> Dashboard Executive
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-geo-alt"></i> Monitoring Armada
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-truck"></i> Data Alat Berat
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-people"></i> Data Pelanggan
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-calendar"></i> Booking
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-file-earmark-text"></i> Kontrak
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-cart"></i> Data Vendor
        </a>

        <a href="#" class="nav-link">
            <i class="bi bi-bar-chart"></i> Laporan
        </a>

    </div>

    <div class="user-box">
        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="bi bi-person-circle fs-5"></i>
            <div>
                <strong>{{ Auth::user()->name }}</strong><br>
                <small class="text-muted">Pimpinan</small>
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