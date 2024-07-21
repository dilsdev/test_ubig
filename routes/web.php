<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKotaController;
use App\Http\Controllers\AdminSiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminAuthController::class, 'index'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login']);
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
Route::middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/siswa', [AdminSiswaController::class, 'index'])->name('siswa');
    Route::post('/siswa', [AdminSiswaController::class, 'store'])->name('tambahsiswa');
    Route::get('/kota', [AdminKotaController::class, 'index'])->name('kota');
    Route::post('/kota', [AdminKotaController::class, 'store'])->name('tambahkota');
});
