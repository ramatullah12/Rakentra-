<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Booking;
use App\Models\Maintenance;
use App\Models\MaterialRequest;
use App\Models\Operasional;
use App\Models\Tagihan;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function admin()
    {
        $totalAlat = Alat::count();

        $totalBooking = Booking::count();

        $totalMaintenance = Maintenance::count();

        $totalMaterial = MaterialRequest::count();

        $totalTagihan = Tagihan::count();

        $biayaMaintenance = Maintenance::sum('biaya');

        $biayaMaterial = MaterialRequest::sum('harga');

        $biayaOperasional = Operasional::sum('biaya_operasional');

        $maintenanceBulanan = Maintenance::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total');

        return view(
            'laporan.admin.dashboard',
            compact(
                'totalAlat',
                'totalBooking',
                'totalMaintenance',
                'totalMaterial',
                'totalTagihan',
                'biayaMaintenance',
                'biayaMaterial',
                'biayaOperasional',
                'maintenanceBulanan'
            )
        );
    }

    public function pemimpin()
    {
        $totalAlat = Alat::count();

        $totalBooking = Booking::count();

        $totalMaintenance = Maintenance::count();

        $totalMaterial = MaterialRequest::count();

        $totalTagihan = Tagihan::count();

        $biayaMaintenance = Maintenance::sum('biaya');

        $biayaMaterial = MaterialRequest::sum('harga');

        $biayaOperasional = Operasional::sum('biaya_operasional');

        $operasionalBulanan = Operasional::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total');

        return view(
            'laporan.pemimpin.dashboard',
            compact(
                'totalAlat',
                'totalBooking',
                'totalMaintenance',
                'totalMaterial',
                'totalTagihan',
                'biayaMaintenance',
                'biayaMaterial',
                'biayaOperasional',
                'operasionalBulanan'
            )
        );
    }

    public function maintenancePdf()
    {
        $maintenances = Maintenance::with('alat')
            ->latest()
            ->get();

        $pdf = Pdf::loadView(
            'laporan.pdf.maintenance',
            compact('maintenances')
        );

        return $pdf->download('laporan-maintenance.pdf');
    }

    public function materialPdf()
    {
        $materials = MaterialRequest::with([
            'maintenance.alat'
        ])->latest()->get();

        $pdf = Pdf::loadView(
            'laporan.pdf.material',
            compact('materials')
        );

        return $pdf->download('laporan-material.pdf');
    }

    public function operasionalPdf()
    {
        $operasionals = Operasional::with('alat')
            ->latest()
            ->get();

        $pdf = Pdf::loadView(
            'laporan.pdf.operasional',
            compact('operasionals')
        );

        return $pdf->download('laporan-operasional.pdf');
    }
}