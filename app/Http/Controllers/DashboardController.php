<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard Admin';

        return view('Admin.Dashboard_Admin', ['pageTitle' => $pageTitle]);
    }

    public function create()
    {
        $pageTitle = 'Add Items';
        $items = item::all();

        return view('Admin.create_item', compact('pageTitle', 'items'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
