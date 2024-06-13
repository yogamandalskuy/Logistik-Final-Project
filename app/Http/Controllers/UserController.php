<?php

namespace App\Http\Controllers;

use App\Models\RequestBorrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $pageTitle = 'List Peminjaman';

        return view('User.pengajuan', ['pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create User';

        return view('User.create', ['pageTitle' => $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',
        ];

        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'name' => 'required',
            'items_name' => 'required',
            'quantity' => 'required|numeric',
            'startdate' => 'required',
            'enddate' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $requestBorrower = new RequestBorrower();
        $requestBorrower->user = $request->user;
        $requestBorrower->name = $request->name;
        $requestBorrower->items_name = $request->items_name;
        $requestBorrower->quantity = $request->quantity;
        $requestBorrower->startdate = $request->startdate;
        $requestBorrower->enddate = $request->enddate;
        $requestBorrower->save();

        return redirect()->route('User.index')->with('success', 'User created successfully.');
    }
}
