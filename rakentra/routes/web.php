<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('dashboard.admin'),
        'mekanik' => redirect()->route('dashboard.mekanik'),
        'pimpinan' => redirect()->route('dashboard.pimpinan'),
        default => abort(403),
    };
})->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'admin'])
        ->name('dashboard.admin');
});

Route::middleware(['auth', 'role:mekanik'])->group(function () {
    Route::get('/mekanik', [DashboardController::class, 'mekanik'])
        ->name('dashboard.mekanik');
});

Route::middleware(['auth', 'role:pimpinan'])->group(function () {
    Route::get('/pimpinan', [DashboardController::class, 'pimpinan'])
        ->name('dashboard.pimpinan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
});

require __DIR__.'/auth.php';