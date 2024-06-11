<?php

namespace App\Http\Controllers;

class RequestController extends Controller
{
    public function index()
    {
        $pageTitle = 'Request Borrower';

        return view('Admin.request_borrower', ['pageTitle' => $pageTitle]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
