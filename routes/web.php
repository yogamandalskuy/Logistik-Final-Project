<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPage');
});

Route::get('/admin', function () {
    return view('Dashboard_Admin');
});
