<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BookingController;

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

    Route::get('/alat-admin', [AlatController::class, 'index'])
        ->name('alat.admin');

    Route::get('/alat-admin/create', [AlatController::class, 'create'])
        ->name('alat.create');

    Route::post('/alat-admin/store', [AlatController::class, 'store'])
        ->name('alat.store');

    Route::get('/alat-admin/edit/{id}', [AlatController::class, 'edit'])
        ->name('alat.edit');

    Route::put('/alat-admin/update/{id}', [AlatController::class, 'update'])
        ->name('alat.update');

    Route::delete('/alat-admin/delete/{id}', [AlatController::class, 'destroy'])
        ->name('alat.delete');

    Route::get('/pelanggan', [PelangganController::class, 'index'])
        ->name('pelanggan.index');

    Route::get('/pelanggan/create', [PelangganController::class, 'create'])
        ->name('pelanggan.create');

    Route::post('/pelanggan/store', [PelangganController::class, 'store'])
        ->name('pelanggan.store');

    Route::get('/pelanggan/edit/{pelanggan}', [PelangganController::class, 'edit'])
        ->name('pelanggan.edit');

    Route::put('/pelanggan/update/{pelanggan}', [PelangganController::class, 'update'])
        ->name('pelanggan.update');

    Route::get('/vendor', [VendorController::class, 'index'])
        ->name('vendor.index');

    Route::get('/vendor/create', [VendorController::class, 'create'])
        ->name('vendor.create');

    Route::post('/vendor/store', [VendorController::class, 'store'])
        ->name('vendor.store');

    Route::get('/vendor/edit/{id}', [VendorController::class, 'edit'])
        ->name('vendor.edit');

    Route::put('/vendor/update/{id}', [VendorController::class, 'update'])
        ->name('vendor.update');

    Route::delete('/vendor/delete/{id}', [VendorController::class, 'destroy'])
        ->name('vendor.delete');

    Route::get('/booking', [BookingController::class, 'index'])
        ->name('booking.index');

    Route::get('/booking/create', [BookingController::class, 'create'])
        ->name('booking.create');

    Route::post('/booking/store', [BookingController::class, 'store'])
        ->name('booking.store');

    Route::get('/booking/edit/{id}', [BookingController::class, 'edit'])
        ->name('booking.edit');

    Route::put('/booking/update/{id}', [BookingController::class, 'update'])
        ->name('booking.update');

    Route::delete('/booking/delete/{id}', [BookingController::class, 'destroy'])
        ->name('booking.delete');

});

Route::middleware(['auth', 'role:mekanik'])->group(function () {

    Route::get('/mekanik', [DashboardController::class, 'mekanik'])
        ->name('dashboard.mekanik');

});

Route::middleware(['auth', 'role:pemimpin'])->group(function () {

    Route::get('/pemimpin', [DashboardController::class, 'pemimpin'])
        ->name('dashboard.pemimpin');

    Route::get('/user', [UserController::class, 'index'])
        ->name('user.index');

    Route::get('/user/edit/{user}', [UserController::class, 'edit'])
        ->name('user.edit');

    Route::put('/user/update/{user}', [UserController::class, 'update'])
        ->name('user.update');

    Route::get('/vendor-pemimpin', [VendorController::class, 'index'])
        ->name('vendor.pemimpin');

    Route::get('/booking-pemimpin', [BookingController::class, 'index'])
        ->name('booking.pemimpin');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

});

require __DIR__.'/auth.php';