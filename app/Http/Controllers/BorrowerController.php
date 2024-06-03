<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka',
            'date' => 'Isi :attribute sesuai ketentuan tanggal'
        ];

        $validator = Validator::make($request->all(), [
            'User' => 'required',
            'Name' => 'required',
            'Qty' => 'required|numeric',
            'Guarantee' => 'required',
            'Start_Date' => 'required|date',
            'End_Date' => 'required|date',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return $request->all();
    }
    }

