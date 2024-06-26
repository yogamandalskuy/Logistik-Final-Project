<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RequestBorrowerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('User.LandingPage');
});

Route::get('/admin', function () {
    return view('Auth.login');
})->name('admin');

// ITEM
Route::get('list_item', [ItemController::class, 'index'])->name('list_item');
Route::get('create_item', [ItemController::class, 'create'])->name('create_item');
// Route::get('edit_item', [ItemController::class, 'edit'])->name('edit_item');
Route::resource('item', ItemController::class);
// BORROWER
Route::get('list_borrower', [BorrowerController::class, 'index'])->name('list_borrower');
Route::get('add_borrower', [BorrowerController::class, 'create'])->name('add_borrower');
Route::get('edit_borrower', [ItemController::class, 'edit'])->name('edit_borrower');
Route::resource('borrower', BorrowerController::class);

// Halaman Peminjam
Route::get('landingpage', [LandingPageController::class, 'about'])->name('landingpage');
Route::get('about', [AboutController::class, 'landingpage'])->name('about');
Route::get('pengajuan', [PengajuanController::class, 'pengajuan'])->name('pengajuan');
Route::get('pengajuan', [PengajuanController::class, 'pengajuan'])->name('pengajuan');
Route::get('jadwal', [JadwalController::class, 'jadwal'])->name('jadwal');
// Route::resource('create', CreateController::class);

// REQUEST
Route::get('request_borrower', [RequestBorrowerController::class, 'index'])->name('request_borrower');

// GET DATA LIST ITEM
Route::get('getitem', [ItemController::class, 'getData'])->name('item.getData');

// LOGIN
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('Login');

// CREATE USER
Route::get('list_user', [UserController::class, 'index'])->name('index');
Route::get('create_user', [UserController::class, 'create'])->name('create_user');
Route::resource('user', UserController::class);
Route::post('store', [UserController::class, 'store'])->name('store');
// Route::post('/User', [UserController::class, 'store'])->name('User.store');
