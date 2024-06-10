<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class BorrowerController extends Controller
{
    public function index()
    {
        $pageTitle = 'List Borrower';
        // ELOQUENT
        confirmDelete();
        $borrower = Borrower::all();

        return view('Admin.list_borrower', [
            'pageTitle' => $pageTitle,
            'borrower' => $borrower
        ]);
    }

    public function create()
    {
        $pageTitle = 'Add Borrower';

        // ELOQUENT
        $status = Status::all();

        return view('Admin.add_borrower', compact('pageTitle', 'status'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',
            'date' => 'Isi :attribute sesuai ketentuan tanggal.',
        ];

        $validator = Validator::make($request->all(), [
            'User' => 'required',
            'Name' => 'required',
            'Items_Name' => 'required',
            'Qty' => 'required|numeric',
            'Start_Date' => 'required|date',
            'End_Date' => 'required|date',
            'Guarantee' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $borrower = new Borrower;
        $borrower->user = $request->User;
        $borrower->name = $request->Name;
        $borrower->itemsname = $request->Items_Name;
        $borrower->qty = $request->Qty;
        $borrower->startdate = $request->Start_Date;
        $borrower->enddate = $request->End_Date;
        $borrower->guarantee = $request->Guarantee;
        $borrower->status_id = $request->status;
        $borrower->save();

        Alert::success('Added Successfully', 'Borrower Data Added Successfully.');

        return redirect()->route('list_borrower');
    }

    public function show(string $id)
    {
        $pageTitle = 'Detail Borrower';

        // ELOQUENT
        $borrower = Borrower::find($id);
        // if (!$borrower) {
        //     return redirect()->route('Dashboard')->with('error', 'Borrower not found');
        // }

        return view('Admin.borrower.show', compact('pageTitle', 'borrower'));
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit Barang';

        // ELOQUENT
        $status = Status::all();
        $borrower = Borrower::find($id);

        return view('Admin.borrower.edit', compact('pageTitle', 'status', 'borrower'));
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka.',
            'date' => 'Isi :attribute sesuai ketentuan tanggal.',
        ];

        $validator = Validator::make($request->all(), [
            'User' => 'required',
            'Name' => 'required',
            'Items_Name' => 'required',
            'Qty' => 'required|numeric',
            'Start_Date' => 'required|date',
            'End_Date' => 'required|date',
            'Guarantee' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $borrower = Borrower::findOrFail($id);
        $borrower->user = $request->User;
        $borrower->name = $request->Name;
        $borrower->itemsname = $request->Items_Name;
        $borrower->qty = $request->Qty;
        $borrower->startdate = $request->Start_Date;
        $borrower->enddate = $request->End_Date;
        $borrower->guarantee = $request->Guarantee;
        $borrower->status_id = $request->status;
        $borrower->save();

        Alert::success('Changed Successfully', 'Borrower Data Changed Successfully.');

        return redirect()->route('list_borrower');
    }

    public function destroy(string $id)
    {
        // ELOQUENT
        Borrower::find($id)->delete();

        Alert::success('Deleted Successfully', 'Borrower Data Deleted Successfully.');

        return redirect()->route('list_borrower');
    }
}


