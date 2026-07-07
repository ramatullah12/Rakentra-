<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin - Rakentra')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:linear-gradient(135deg,#0f172a,#1e293b);
            font-family:'Inter',sans-serif;
            color:#fff;
            overflow-x:hidden;
        }

        .sidebar{
            width:270px;
            height:100vh;
            position:fixed;
            top:0;
            left:0;
            background:rgba(255,255,255,0.05);
            backdrop-filter:blur(20px);
            border-right:1px solid rgba(255,255,255,0.08);
            padding:20px 15px;
            overflow-y:auto;
            z-index:999;
        }

        .sidebar::-webkit-scrollbar{
            width:5px;
        }

        .sidebar::-webkit-scrollbar-thumb{
            background:#334155;
            border-radius:10px;
        }

        .logo-box{
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:30px;
            padding:10px;
        }

        .logo-icon{
            width:50px;
            height:50px;
            border-radius:14px;
            overflow:hidden;
            background:rgba(255,255,255,0.08);
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .logo-icon img{
            width:100%;
            height:100%;
            object-fit:contain;
        }

        .logo-text strong{
            color:#fff;
            font-size:18px;
        }

        .logo-text small{
            color:#94a3b8;
            font-size:12px;
        }

        .nav-link{
            display:flex;
            align-items:center;
            gap:12px;
            padding:13px 14px;
            border-radius:14px;
            color:#cbd5e1;
            transition:0.25s;
            font-size:15px;
            margin-bottom:4px;
        }

        .nav-link i{
            font-size:18px;
        }

        .nav-link:hover{
            background:rgba(255,255,255,0.08);
            color:#fff;
            transform:translateX(4px);
        }

        .nav-link.active{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            color:#fff;
            box-shadow:0 8px 20px rgba(37,99,235,0.35);
        }

        .content{
            margin-left:270px;
            min-height:100vh;
        }

        .topbar{
            background:rgba(255,255,255,0.05);
            backdrop-filter:blur(20px);
            border-bottom:1px solid rgba(255,255,255,0.08);
            padding:18px 30px;
            position:sticky;
            top:0;
            z-index:99;
        }

        .title{
            color:#fff;
            font-size:22px;
            font-weight:700;
        }

        .subtitle{
            color:#94a3b8;
            font-size:13px;
            margin-top:2px;
        }

        .search-box{
            background:rgba(255,255,255,0.08);
            border:none;
            border-radius:12px;
            padding:10px 15px;
            color:#fff;
            outline:none;
            width:220px;
        }

        .search-box::placeholder{
            color:#94a3b8;
        }

        .role-btn{
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            color:#fff;
            border:none;
            border-radius:12px;
            padding:8px 15px;
            font-size:14px;
            font-weight:600;
        }

        .notif{
            width:42px;
            height:42px;
            border-radius:12px;
            background:rgba(255,255,255,0.08);
            display:flex;
            align-items:center;
            justify-content:center;
            position:relative;
            cursor:pointer;
        }

        .notif i{
            font-size:18px;
        }

        .notif-dot{
            position:absolute;
            top:10px;
            right:10px;
            width:8px;
            height:8px;
            background:#ef4444;
            border-radius:50%;
        }

        .user-box{
            margin-top:auto;
            padding-top:20px;
            border-top:1px solid rgba(255,255,255,0.08);
        }

        .user-profile{
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:15px;
        }

        .user-avatar{
            width:45px;
            height:45px;
            border-radius:50%;
            background:linear-gradient(135deg,#2563eb,#1d4ed8);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:20px;
        }

        .user-name{
            font-weight:600;
            color:#fff;
        }

        .user-role{
            font-size:13px;
            color:#94a3b8;
        }

        .logout-btn{
            width:100%;
            border:none;
            border-radius:12px;
            padding:10px;
            background:#ef4444;
            color:#fff;
            font-weight:600;
            transition:0.2s;
        }

        .logout-btn:hover{
            background:#dc2626;
        }

        .card{
            background:rgba(255,255,255,0.05);
            border:none;
            border-radius:20px;
            color:#fff;
            backdrop-filter:blur(20px);
        }

        .form-control,
        .form-select{
            background:#1e293b !important;
            border:1px solid rgba(255,255,255,0.08) !important;
            color:#e2e8f0 !important;
            border-radius:12px;
        }

        .form-control:focus,
        .form-select:focus{
            background:#1e293b !important;
            border-color:#2563eb !important;
            color:#fff !important;
            box-shadow:0 0 0 1px #2563eb !important;
        }

        .form-control::placeholder{
            color:#94a3b8 !important;
        }

        label{
            color:#cbd5f5;
        }

        .table{
            --bs-table-bg:transparent !important;
            color:#e2e8f0 !important;
        }

        .table thead{
            background:#1e293b !important;
        }

        .table thead th{
            color:#94a3b8 !important;
            border:none !important;
        }

        .table tbody tr{
            border-bottom:1px solid rgba(255,255,255,0.05);
            transition:0.2s;
        }

        .table tbody tr:hover{
            background:#1e293b !important;
        }

        .table tbody td{
            color:#e2e8f0 !important;
            border-color:rgba(255,255,255,0.05) !important;
        }

        @media(max-width:992px){

            .sidebar{
                width:100%;
                height:auto;
                position:relative;
            }

            .content{
                margin-left:0;
            }

            .topbar{
                padding:15px;
            }

            .search-box{
                width:150px;
            }

        }

    </style>

</head>

<body>

<div class="sidebar d-flex flex-column">

    <div class="logo-box">

        <div class="logo-icon">
            <img src="{{ asset('images/logo.png') }}" alt="Rakentra Logo">
        </div>

        <div class="logo-text">

            <strong>Rakentra</strong><br>

            <small>Asset & Rental Management</small>

        </div>

    </div>

    <div class="nav flex-column gap-1">

        <a href="{{ route('dashboard.admin') }}"
           class="nav-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">

            <i class="bi bi-house-door"></i>
            Dashboard

        </a>

        <a href="{{ route('alat.index') }}"
           class="nav-link {{ request()->routeIs('alat.*') ? 'active' : '' }}">

            <i class="bi bi-truck"></i>
            Data Alat Berat

        </a>

        <a href="{{ route('harga-sewa.index') }}"
           class="nav-link {{ request()->routeIs('harga-sewa.*') ? 'active' : '' }}">

            <i class="bi bi-cash-stack"></i>
            Harga Sewa

        </a>

        <a href="{{ route('pelanggan.index') }}"
           class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">

            <i class="bi bi-people"></i>
            Data Pelanggan

        </a>

        <a href="{{ route('booking.index') }}"
           class="nav-link {{ request()->routeIs('booking.*') ? 'active' : '' }}">

            <i class="bi bi-calendar-check"></i>
            Booking

        </a>

        <a href="{{ route('kontrak.index') }}"
           class="nav-link {{ request()->routeIs('kontrak.*') ? 'active' : '' }}">

            <i class="bi bi-file-earmark-text"></i>
            Kontrak

        </a>

        <a href="{{ route('mobilisasi.index') }}"
           class="nav-link {{ request()->routeIs('mobilisasi.*') ? 'active' : '' }}">

            <i class="bi bi-box-seam"></i>
            Mobilisasi

        </a>

        <a href="{{ route('vendor.index') }}"
           class="nav-link {{ request()->routeIs('vendor.*') ? 'active' : '' }}">

            <i class="bi bi-shop"></i>
            Vendor

        </a>

        <a href="{{ route('mekanik.index') }}"
           class="nav-link {{ request()->routeIs('mekanik.*') ? 'active' : '' }}">

            <i class="bi bi-person-gear"></i>
            Data Mekanik

        </a>

        <a href="{{ route('operasional.index') }}"
           class="nav-link {{ request()->routeIs('operasional.*') ? 'active' : '' }}">

            <i class="bi bi-clock-history"></i>
            Operasional

        </a>

        <a href="{{ route('inspeksi.index') }}"
           class="nav-link {{ request()->routeIs('inspeksi.*') ? 'active' : '' }}">

            <i class="bi bi-clipboard-check"></i>
            Inspeksi

        </a>

        <a href="{{ route('maintenance.index') }}"
           class="nav-link {{ request()->routeIs('maintenance.*') ? 'active' : '' }}">

            <i class="bi bi-wrench-adjustable"></i>
            Maintenance

        </a>

        <a href="{{ route('material.index') }}"
           class="nav-link {{ request()->routeIs('material.*') ? 'active' : '' }}">

            <i class="bi bi-box"></i>
            Material Request

        </a>

        <a href="{{ route('tagihan.index') }}"
           class="nav-link {{ request()->routeIs('tagihan.*') ? 'active' : '' }}">

            <i class="bi bi-receipt"></i>
            Tagihan & Faktur

        </a>

        <a href="{{ route('laporan.admin') }}"
           class="nav-link {{ request()->routeIs('laporan.admin') ? 'active' : '' }}">

            <i class="bi bi-bar-chart-line"></i>
            Executive Dashboard

        </a>

    </div>

    <div class="user-box">

        <div class="user-profile">

            <div class="user-avatar">

                <i class="bi bi-person"></i>

            </div>

            <div>

                <div class="user-name">

                    {{ Auth::user()->name }}

                </div>

                <div class="user-role">

                    Administrator

                </div>

            </div>

        </div>

        <form method="POST"
              action="{{ route('logout') }}">

            @csrf

            <button class="logout-btn">

                <i class="bi bi-box-arrow-right"></i>
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

                Selamat datang di sistem Rakentra

            </div>

        </div>

        <div class="d-flex align-items-center gap-3">

            <input type="text"
                   class="search-box"
                   placeholder="Search...">

            <div class="role-btn">

                Admin

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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>