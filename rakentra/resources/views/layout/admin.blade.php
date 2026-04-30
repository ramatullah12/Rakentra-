<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Rakentra</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#f5f6fa; }

        .sidebar {
            width:250px;
            height:100vh;
            position:fixed;
            background:#fff;
            border-right:1px solid #eee;
        }

        .content {
            margin-left:250px;
            padding:20px;
        }

        .nav-link {
            color:#555;
        }

        .nav-link.active {
            background:#f1f1f1;
            border-radius:10px;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar p-3 d-flex flex-column">
        <h5>Rakentra</h5>

        <ul class="nav flex-column mt-3">
            <li><a href="{{ url('/admin') }}" class="nav-link active">Dashboard</a></li>
            <li><a href="#" class="nav-link">User Management</a></li>
            <li><a href="#" class="nav-link">Data Alat Berat</a></li>
            <li><a href="#" class="nav-link">Data Pelanggan</a></li>
            <li><a href="#" class="nav-link">Booking</a></li>
            <li><a href="#" class="nav-link">Kontrak</a></li>
            <li><a href="#" class="nav-link">Mobilisasi</a></li>
            <li><a href="#" class="nav-link">Vendor</a></li>
            <li><a href="#" class="nav-link">Operasional</a></li>
            <li><a href="#" class="nav-link">Biaya</a></li>
            <li><a href="#" class="nav-link">Maintenance</a></li>
            <li><a href="#" class="nav-link">Tagihan & Faktur</a></li>
            <li><a href="#" class="nav-link">Laporan</a></li>
            <li><a href="#" class="nav-link">Monitoring</a></li>
        </ul>

        <div class="mt-auto">
            <hr>
            <strong>Admin</strong><br>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- Navbar -->
        <div class="d-flex justify-content-between mb-4">
            <h4>@yield('title')</h4>
            <div>Admin</div>
        </div>

        @yield('content')

    </div>

</body>
</html>