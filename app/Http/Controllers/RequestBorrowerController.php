<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RequestBorrowerController extends Controller
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

        return view('User.create', compact('pageTitle'));
    }

    public function store()
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
        $request = new request();
        $request->user = $request->user;
        $request->name = $request->name;
        $request->items_name = $request->items_name;
        $request->quantity = $request->quantity;
        $request->startdate = $request->startdate;
        $request->enddate = $request->enddate;
        $request->save();

        Alert::success('Request Successfully', 'Request to Borrow Goods Successfully Sent');

        return redirect()->route('request_borrower.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
