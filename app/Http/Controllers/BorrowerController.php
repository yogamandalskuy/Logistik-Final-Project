<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
            'borrower' => $borrower,
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
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
        ];

        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'name' => 'required',
            'itemsname' => 'required',
            'qty' => 'required|numeric',
            'startdate' => 'required',
            'enddate' => 'required',
            'guarantee' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $borrower = new Borrower();
        $borrower->user = $request->user;
        $borrower->name = $request->name;
        $borrower->itemsname = $request->itemsname;
        $borrower->qty = $request->qty;
        $borrower->startdate = $request->startdate;
        $borrower->enddate = $request->enddate;
        $borrower->guarantee = $request->guarantee;
        $borrower->status_id = $request->status_id;
        $borrower->save();

        Alert::success('Added Successfully', 'Borrower Data Added Successfully.');

        return redirect()->route('borrower.index');
    }

    public function show(string $id)
    {
        $pageTitle = 'Detail Borrower';

        // ELOQUENT
        $borrower = Borrower::find($id);

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
        ];

        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'name' => 'required',
            'itemsname' => 'required',
            'qty' => 'required|numeric',
            'startdate' => 'required',
            'enddate' => 'required',
            'guarantee' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $borrower = Borrower::find($id);
        $borrower->user = $request->user;
        $borrower->name = $request->name;
        $borrower->itemsname = $request->itemsname;
        $borrower->qty = $request->qty;
        $borrower->startdate = $request->startdate;
        $borrower->enddate = $request->enddate;
        $borrower->guarantee = $request->guarantee;
        $borrower->status_id = $request->status;
        $borrower->save();

        Alert::success('Changed Successfully', 'Borrower Data Changed Successfully.');

        return redirect()->route('borrower.index');
    }

    public function destroy(string $id)
    {
        $borrower = Borrower::find($id);

        if ($borrower) {
            $borrower->delete();
            Alert::success('Deleted Successfully', 'borrower Data Deleted Successfully.');
        } else {
            Alert::error('Delete Failed', 'borrower Not Found.');
        }

        return redirect()->route('borrower.index');
    }

    public function getData(Request $request)
    {
        $item = item;
        if ($request->ajax()) {
            return datatables()->of($item)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return view('Admin.actions_item', compact('item'));
            })
            ->toJson();
        }
    }
}
