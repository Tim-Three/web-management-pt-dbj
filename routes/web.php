<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Redirect root
Route::get('/', fn() => redirect('/login'));

// Auth routes (dari Breeze)
require __DIR__ . '/auth.php';

// ─── KARYAWAN ROUTES ───────────────────────────────
Route::middleware(['auth', 'karyawan'])->prefix('karyawan')->name('karyawan.')->group(function () {
    Route::get('/beranda', [App\Http\Controllers\Karyawan\BerandaController::class, 'index'])->name('beranda');
    Route::post('/absen/masuk', [App\Http\Controllers\Karyawan\AbsensiController::class, 'absenMasuk'])->name('absen.masuk');
    Route::post('/absen/pulang', [App\Http\Controllers\Karyawan\AbsensiController::class, 'absenPulang'])->name('absen.pulang');
    Route::get('/riwayat-absen', [App\Http\Controllers\Karyawan\AbsensiController::class, 'riwayat'])->name('riwayat.absen');
    Route::get('/riwayat-cuti', [App\Http\Controllers\Karyawan\CutiController::class, 'riwayat'])->name('riwayat.cuti');
    Route::post('/cuti/ajukan', [App\Http\Controllers\Karyawan\CutiController::class, 'ajukan'])->name('cuti.ajukan');
    Route::get('/rekap-absensi', [App\Http\Controllers\Karyawan\RekapAbsensiController::class, 'index'])->name('rekap.absensi'); // ← TAMBAH INI
});

// ─── ADMIN ROUTES ──────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/beranda', [App\Http\Controllers\Admin\BerandaController::class, 'index'])->name('beranda');
    Route::resource('karyawan', App\Http\Controllers\Admin\KaryawanController::class);
    Route::get('/absensi', [App\Http\Controllers\Admin\AbsensiController::class, 'index'])->name('absensi.index'); // ← TAMBAH INI
    Route::get('/cuti', [App\Http\Controllers\Admin\CutiController::class, 'index'])->name('cuti.index');
    Route::patch('/cuti/{cuti}/approve', [App\Http\Controllers\Admin\CutiController::class, 'approve'])->name('cuti.approve');
    Route::patch('/cuti/{cuti}/tolak', [App\Http\Controllers\Admin\CutiController::class, 'tolak'])->name('cuti.tolak');
    Route::get('/keuangan', [App\Http\Controllers\Admin\KeuanganController::class, 'index'])->name('keuangan.index');
    Route::post('/keuangan', [App\Http\Controllers\Admin\KeuanganController::class, 'store'])->name('keuangan.store');
    Route::get('/penggajian', [App\Http\Controllers\Admin\PenggajianController::class, 'index'])->name('penggajian.index');
    Route::post('/penggajian', [App\Http\Controllers\Admin\PenggajianController::class, 'store'])->name('penggajian.store');
    Route::patch('/penggajian/{penggajian}/bayar', [App\Http\Controllers\Admin\PenggajianController::class, 'bayar'])->name('penggajian.bayar');
});

// Redirect setelah login berdasarkan role
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.beranda');
    }
    return redirect()->route('karyawan.beranda');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/bantuan', fn() => view('bantuan'))->name('bantuan');
});
