<?php

use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('User.LandingPage');
});

Route::get('/admin', function () {
    return view('Admin.Dashboard_Admin');
});

Route::get('Dashboard', [DashboardController::class, 'index'])->name('Dashboard');
Route::get('list_item', [ItemController::class, 'index'])->name('list_item');
Route::get('create_item', [ItemController::class, 'create'])->name('Add Items');
Route::get('list_borrower', [BorrowerController::class, 'index'])->name('list_borrower');
Route::get('add_borrower', [BorrowerController::class, 'create'])->name('add_borrower');

Route::resource('borrower', BorrowerController::class);
