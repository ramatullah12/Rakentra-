<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;

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

    Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

    Route::get('/alat-admin', [AlatController::class, 'index'])->name('alat.admin');
    Route::get('/alat-admin/create', [AlatController::class, 'create'])->name('alat.create');
    Route::get('/alat-admin/edit/{id}', [AlatController::class, 'edit'])->name('alat.edit');
    Route::post('/alat-admin/store', [AlatController::class, 'store'])->name('alat.store');
    Route::put('/alat-admin/update/{id}', [AlatController::class, 'update'])->name('alat.update');
    Route::delete('/alat-admin/delete/{id}', [AlatController::class, 'destroy'])->name('alat.delete');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/edit/{pelanggan}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/pelanggan/update/{pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update');

});

Route::middleware(['auth', 'role:mekanik'])->group(function () {
    Route::get('/mekanik', [DashboardController::class, 'mekanik'])->name('dashboard.mekanik');
});

Route::middleware(['auth', 'role:pemimpin'])->group(function () {

    Route::get('/pemimpin', [DashboardController::class, 'pemimpin'])->name('dashboard.pemimpin');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

require __DIR__.'/auth.php';