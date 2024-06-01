<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;


Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/admin', function () {
    return view('Dashboard_Admin');
});

Route::resource('barang', BarangController::class);

Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
