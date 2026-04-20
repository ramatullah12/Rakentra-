<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {

    $role = auth()->user()->role;

    if ($role == 'admin') {
        return redirect('/dashboard/admin');
    } elseif ($role == 'mekanik') {
        return redirect('/dashboard/mekanik');
    } else {
        return redirect('/dashboard/pimpinan');
    }

})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
    ->middleware(['auth','role:admin']);

Route::get('/dashboard/mekanik', [DashboardController::class, 'mekanik'])
    ->middleware(['auth','role:mekanik']);

Route::get('/dashboard/pimpinan', [DashboardController::class, 'pimpinan'])
    ->middleware(['auth','role:pimpinan']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';