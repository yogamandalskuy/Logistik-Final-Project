<?php

namespace App\Http\Controllers;

use App\Models\Borrowers;
use App\Models\Statuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BorrowerController extends Controller
{
    public function index()
    {
        $pageTitle = 'List Borrower';
        // ELOQUENT
        $borrower = Borrowers::all();

        return view('Admin.list_borrower', [
            'pageTitle' => $pageTitle,
            'borrower' => $borrower
        ]);
        // return view('Admin.list_borrower', ['pageTitle' => $pageTitle]);
    }

    public function create()
    {
        $pageTitle = 'Add Borrower';

        // ELOQUENT
        $status = Statuses::all();

        return view('Admin.add_borrower', compact('pageTitle', 'status'));

        // $pageTitle = 'Add Borrower';

        // return view('Admin.add_borrower', compact('pageTitle'));
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
            'ItemsName' => 'required',
            'Qty' => 'required|numeric',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date',
            'Guarantee' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ELOQUENT
        $borrower = new Borrowers;
        $borrower->user = $request->User;
        $borrower->name = $request->Name;
        $borrower->itemsname = $request->ItemsName;
        $borrower->qty = $request->Qty;
        $borrower->startdate = $request->StartDate;
        $borrower->enddate = $request->EndDate;
        $borrower->guarantee = $request->Guarantee;
        $borrower->status_id = $request->status;
        $borrower->save();

        return redirect()->route('Admin.list_borrower');
    }
    public function show(string $id)
    {
        $pageTitle = 'Detail Borrower';

        // ELOQUENT
        $borrower = Borrowers::find($id);
        return view('borrower.show', compact('pageTitle', 'borrower'));
    }
    public function destroy(string $id)
    {
        // ELOQUENT
        Borrowers::find($id)->delete();

        return redirect()->route('Admin.list_borrower');
    }
}


