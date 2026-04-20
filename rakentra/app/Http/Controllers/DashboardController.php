<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Booking;
use App\Models\Pelanggan;

class DashboardController extends Controller
{
    public function pimpinan()
    {
        $totalAlat = Alat::count();
        $alatDisewa = Alat::where('status','disewa')->count();
        $totalPelanggan = Pelanggan::count();

        $revenue = 67000000;

        $tersedia = Alat::where('status','tersedia')->count();
        $disewa = Alat::where('status','disewa')->count();
        $maintenance = Alat::where('status','maintenance')->count();

        $booking = Booking::latest()->take(5)->get();

        return view('dashboard.pimpinan', compact(
            'totalAlat',
            'alatDisewa',
            'totalPelanggan',
            'revenue',
            'tersedia',
            'disewa',
            'maintenance',
            'booking'
        ));
    }
}