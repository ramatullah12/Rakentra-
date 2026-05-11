<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\MobilisasiController;
use App\Http\Controllers\OperasionalController;
use App\Http\Controllers\InspeksiController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MaterialRequestController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\HargaSewaController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {

    if (!auth()->check()) {

        return redirect()->route('login');

    }

    return match (auth()->user()->role) {

        'admin' => redirect()->route('dashboard.admin'),

        'mekanik' => redirect()->route('dashboard.mekanik'),

        'pemimpin' => redirect()->route('dashboard.pemimpin'),

        default => abort(403),

    };

})->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [DashboardController::class, 'admin'])
        ->name('dashboard.admin');

    Route::resource('alat', AlatController::class)
        ->except(['show']);

    Route::resource('pelanggan', PelangganController::class)
        ->except(['show', 'destroy']);

    Route::resource('vendor', VendorController::class)
        ->except(['show']);

    Route::resource('booking', BookingController::class)
        ->except(['show']);

    Route::resource('kontrak', KontrakController::class)
        ->except(['show']);

    Route::get('/kontrak/spk/{id}', [KontrakController::class, 'spk'])
        ->name('kontrak.spk');

    Route::resource('mobilisasi', MobilisasiController::class)
        ->except(['show']);

    Route::resource('mekanik', MekanikController::class)
        ->except(['show']);

    Route::resource('harga-sewa', HargaSewaController::class)
        ->except(['show']);

    Route::resource('operasional', OperasionalController::class)
        ->except(['show']);

    Route::resource('inspeksi', InspeksiController::class)
        ->except(['show']);

    Route::resource('maintenance', MaintenanceController::class)
        ->except(['show']);

    Route::resource('material', MaterialRequestController::class)
        ->except(['show']);

    Route::resource('tagihan', TagihanController::class)
        ->except(['show']);

    Route::get('/tagihan/faktur/{id}', [TagihanController::class, 'faktur'])
        ->name('tagihan.faktur');

    Route::get('/tagihan/cetak/{id}', [TagihanController::class, 'cetak'])
        ->name('tagihan.cetak');

    Route::get('/laporan-admin', [LaporanController::class, 'admin'])
        ->name('laporan.admin');

    Route::get('/laporan-maintenance-pdf', [LaporanController::class, 'maintenancePdf'])
        ->name('laporan.maintenance.pdf');

    Route::get('/laporan-material-pdf', [LaporanController::class, 'materialPdf'])
        ->name('laporan.material.pdf');

    Route::get('/laporan-operasional-pdf', [LaporanController::class, 'operasionalPdf'])
        ->name('laporan.operasional.pdf');

});

Route::middleware(['auth', 'role:mekanik'])
    ->prefix('mekanik')
    ->group(function () {

    Route::get('/', [DashboardController::class, 'mekanik'])
        ->name('dashboard.mekanik');

    Route::get('/alat', [AlatController::class, 'mekanik'])
        ->name('alat.mekanik');

    Route::get('/operasional', [OperasionalController::class, 'index'])
        ->name('operasional.mekanik');

    Route::put('/operasional/update/{id}', [OperasionalController::class, 'update'])
        ->name('operasional.mekanik.update');

    Route::resource('inspeksi', InspeksiController::class)
        ->names([
            'index' => 'inspeksi.mekanik',
            'create' => 'inspeksi.mekanik.create',
            'store' => 'inspeksi.mekanik.store',
            'edit' => 'inspeksi.mekanik.edit',
            'update' => 'inspeksi.mekanik.update',
        ])
        ->except(['show', 'destroy']);

    Route::resource('maintenance', MaintenanceController::class)
        ->names([
            'index' => 'maintenance.mekanik',
            'create' => 'maintenance.mekanik.create',
            'store' => 'maintenance.mekanik.store',
            'edit' => 'maintenance.mekanik.edit',
            'update' => 'maintenance.mekanik.update',
        ])
        ->except(['show', 'destroy']);

    Route::resource('material', MaterialRequestController::class)
        ->names([
            'index' => 'material.mekanik',
            'create' => 'material.mekanik.create',
            'store' => 'material.mekanik.store',
            'edit' => 'material.mekanik.edit',
            'update' => 'material.mekanik.update',
        ])
        ->except(['show', 'destroy']);

});

Route::middleware(['auth', 'role:pemimpin'])
    ->prefix('pemimpin')
    ->group(function () {

    Route::get('/', [DashboardController::class, 'pemimpin'])
        ->name('dashboard.pemimpin');
    
    Route::resource('user', UserController::class)
        ->except(['show']);

    Route::get('/alat', [AlatController::class, 'pemimpin'])
        ->name('alat.pemimpin');

    Route::get('/mekanik', [MekanikController::class, 'index'])
        ->name('mekanik.pemimpin');

    Route::get('/harga-sewa', [HargaSewaController::class, 'index'])
        ->name('harga-sewa.pemimpin');

    Route::get('/vendor', [VendorController::class, 'index'])
        ->name('vendor.pemimpin');

    Route::get('/booking', [BookingController::class, 'index'])
        ->name('booking.pemimpin');

    Route::get('/kontrak', [KontrakController::class, 'index'])
        ->name('kontrak.pemimpin');

    Route::get('/mobilisasi', [MobilisasiController::class, 'index'])
        ->name('mobilisasi.pemimpin');

    Route::get('/operasional', [OperasionalController::class, 'index'])
        ->name('operasional.pemimpin');

    Route::get('/inspeksi', [InspeksiController::class, 'pemimpin'])
        ->name('inspeksi.pemimpin');

    Route::get('/maintenance', [MaintenanceController::class, 'pemimpin'])
        ->name('maintenance.pemimpin');

    Route::get('/material', [MaterialRequestController::class, 'pemimpin'])
        ->name('material.pemimpin');

    Route::get('/tagihan', [TagihanController::class, 'pemimpin'])
        ->name('tagihan.pemimpin');

    Route::get('/tagihan/faktur/{id}', [TagihanController::class, 'faktur'])
        ->name('tagihan.faktur.pemimpin');

    Route::get('/laporan', [LaporanController::class, 'pemimpin'])
        ->name('laporan.pemimpin');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';