<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/siswa', function () {
    return view('siswa');
});
Route::get('/kota', function () {
    return view('kota');
});
