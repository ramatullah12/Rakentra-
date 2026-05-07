<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Booking;
use App\Models\Inspeksi;
use App\Models\Maintenance;
use App\Models\MaterialRequest;
use App\Models\Operasional;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\User;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalAlat = Alat::count();

        $alatTersedia = Alat::where('status', 'tersedia')->count();

        $alatDisewa = Alat::where('status', 'disewa')->count();

        $alatMaintenance = Alat::where('status', 'maintenance')->count();

        $totalPelanggan = Pelanggan::count();

        $totalBooking = Booking::count();

        $totalMaintenance = Maintenance::count();

        $totalInspeksi = Inspeksi::count();

        $totalMaterial = MaterialRequest::count();

        $totalOperasional = Operasional::count();

        $totalTagihan = Tagihan::count();

        $bookingTerbaru = Booking::latest()
            ->take(5)
            ->get();

        return view(
            'dashboard.admin.admin',
            compact(
                'totalAlat',
                'alatTersedia',
                'alatDisewa',
                'alatMaintenance',
                'totalPelanggan',
                'totalBooking',
                'totalMaintenance',
                'totalInspeksi',
                'totalMaterial',
                'totalOperasional',
                'totalTagihan',
                'bookingTerbaru'
            )
        );
    }

    public function mekanik()
    {
        $totalAlat = Alat::count();

        $alatMaintenance = Alat::where('status', 'maintenance')->count();

        $totalMaintenance = Maintenance::count();

        $totalInspeksi = Inspeksi::count();

        $totalMaterial = MaterialRequest::count();

        $totalOperasional = Operasional::count();

        $maintenanceTerbaru = Maintenance::latest()
            ->take(5)
            ->get();

        return view(
            'dashboard.mekanik.mekanik',
            compact(
                'totalAlat',
                'alatMaintenance',
                'totalMaintenance',
                'totalInspeksi',
                'totalMaterial',
                'totalOperasional',
                'maintenanceTerbaru'
            )
        );
    }

    public function pemimpin()
    {
        $totalAlat = Alat::count();

        $alatDisewa = Alat::where('status', 'disewa')->count();

        $alatTersedia = Alat::where('status', 'tersedia')->count();

        $alatMaintenance = Alat::where('status', 'maintenance')->count();

        $totalPelanggan = Pelanggan::count();

        $totalUser = User::count();

        $totalBooking = Booking::count();

        $totalMaintenance = Maintenance::count();

        $totalOperasional = Operasional::count();

        $totalTagihan = Tagihan::count();

        $totalMaterial = MaterialRequest::count();

        $revenue = 67000000;

        $bookingTerbaru = Booking::latest()
            ->take(5)
            ->get();

        return view(
            'dashboard.pemimpin.pemimpin',
            compact(
                'totalAlat',
                'alatDisewa',
                'alatTersedia',
                'alatMaintenance',
                'totalPelanggan',
                'totalUser',
                'totalBooking',
                'totalMaintenance',
                'totalOperasional',
                'totalTagihan',
                'totalMaterial',
                'revenue',
                'bookingTerbaru'
            )
        );
    }
}