<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Pastikan ini ada untuk Auth::check()
use App\Http\Controllers\Karyawan\DashboardController as KaryawanDashboardController;
use App\Http\Controllers\Karyawan\PresensiController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\PresensiController as AdminPresensiController;

// Rute Publik (Landing Page, dll)
Route::get('/', function () {
    return redirect()->route('login');
});

// Rute setelah login, akan diarahkan sesuai role
// --- BAGIAN INI DIPERBAIKI (1) ---
// Menggunakan Auth::check() untuk keamanan dan menghilangkan error editor
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    }
    if (Auth::check() && Auth::user()->role == 'karyawan') {
        return redirect()->route('karyawan.dashboard');
    }
    // Fallback jika terjadi kasus aneh atau user tidak punya role
    return redirect('/login');
})->middleware(['auth', 'verified'])->name('dashboard');


// Rute untuk Admin (Sudah Benar)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('karyawan', KaryawanController::class);
    Route::get('presensi', [AdminPresensiController::class, 'index'])->name('presensi.index');
    // Rute untuk export excel nanti
});


// Rute untuk Karyawan
// --- BAGIAN INI DIPERBAIKI (2) ---
// Struktur grup yang tumpang tindih dan duplikat sudah dibersihkan
Route::middleware(['auth', 'karyawan'])->prefix('karyawan')->name('karyawan.')->group(function () {
    Route::get('/dashboard', [KaryawanDashboardController::class, 'index'])->name('dashboard');
    Route::post('/presensi/masuk', [PresensiController::class, 'absenMasuk'])->name('presensi.masuk');
    Route::post('/presensi/pulang', [PresensiController::class, 'absenPulang'])->name('presensi.pulang');
});


// Rute Profile bawaan Breeze (Sudah Benar)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';