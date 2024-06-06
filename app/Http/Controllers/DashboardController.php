<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard Admin';

        return view('Admin.Dashboard_Admin', ['pageTitle' => $pageTitle]);
    }
}
