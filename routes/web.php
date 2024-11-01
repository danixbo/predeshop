<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RiwayatTransaksiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LaporanHarianController;
use Illuminate\Support\Facades\Auth;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get('/laporan-harian', [LaporanHarianController::class, 'index'])->name('laporan-harian.index');
    });
    
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::resource('barang', BarangController::class);

        Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
        Route::resource('pelanggan', PelangganController::class);
        
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/riwayat-transaksi', [RiwayatTransaksiController::class, 'index'])->name('riwayat-transaksi.index');
    });
    
    // Mengecek role user yang login
    Route::get('/test-role', function() {
        dd(Auth::guard('admin')->user()->role);
    });
});
