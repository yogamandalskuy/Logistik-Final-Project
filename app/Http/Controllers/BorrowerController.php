<?php

namespace App\Http\Controllers;

class BorrowerController extends Controller
{
    public function index()
    {
        $pageTitle = 'List Borrower';

        return view('Admin.list_borrower', ['pageTitle' => $pageTitle]);
    }

    public function create()
    {
        $pageTitle = 'Add Borrower';

        return view('Admin.add_borrower', compact('pageTitle'));
    }

    public function store(Request $request)
    {
    }
}
