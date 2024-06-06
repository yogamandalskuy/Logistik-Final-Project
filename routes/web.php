<?php

use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('Admin.Dashboard_admin');
})->name('login');

Route::get('/', function () {
    return view('User.LandingPage');
});

Route::get('Dashboard', [DashboardController::class, 'index'])->name('Dashboard');
// ITEM
Route::get('list_item', [ItemController::class, 'index'])->name('list_item');
Route::get('create_item', [ItemController::class, 'create'])->name('add_item');
// Route::get('edit_item', [ItemController::class, 'edit'])->name('edit_item');
Route::resource('item', ItemController::class);
// BORROWER
Route::get('list_borrower', [BorrowerController::class, 'index'])->name('list_borrower');
Route::get('add_borrower', [BorrowerController::class, 'create'])->name('add_borrower');
Route::resource('borrower', BorrowerController::class);
// GET DATA LIST ITEM
Route::get('getitem', [ItemController::class, 'getData'])->name('item.getData');
// EKSPORT EXCEL
Route::get('exportExcel', [ItemController::class, 'exportExcel'])->name('item.exportExcel');
