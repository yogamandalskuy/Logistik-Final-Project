<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    public function index()
    {
        $pageTitle = 'List Items';
        // ELOQUENT
        confirmDelete();
        $items = item::all();

        return view('Admin.list_item', ['pageTitle' => $pageTitle, 'items' => $items]);
    }

    public function create()
    {
        $pageTitle = 'Add Items';
        $items = item::all();

        return view('Admin.create_item', compact('pageTitle', 'items'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka',
        ];

        $validator = Validator::make($request->all(), [
            'item_id' => 'required',
            'item_name' => 'required',
            'amount' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $item = new Item();
        $item->item_id = $request->item_id;
        $item->item_name = $request->item_name;
        $item->amount = $request->amount;
        $item->save();

        Alert::success('Added Successfully', 'item Data Added Successfully.');

        return redirect()->route('item.index');
    }

    public function show(string $id)
    {
        $pageTitle = 'List Items';
        // ELOQUENT
        $item = item::find($id);

        return view('Admin.list_item', compact('pageTitle', 'item'));
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit Item';
        // ELOQUENT
        $item = item::all();
        $item = item::find($id);

        return view('Admin.edit_item', compact('pageTitle', 'item'));
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka',
        ];

        $validator = Validator::make($request->all(), [
            'item_id' => 'required',
            'item_name' => 'required',
            'amount' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $item = item::find($id);
        $item->item_id = $request->item_id;
        $item->item_name = $request->item_name;
        $item->amount = $request->amount;
        $item->save();

        Alert::success('Changed Successfully', 'Item Data Changed Successfully.');

        return redirect()->route('item.index');
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if ($item) {
            $item->delete();
            Alert::success('Deleted Successfully', 'Item Data Deleted Successfully.');
        } else {
            Alert::error('Delete Failed', 'Item Not Found.');
        }

        return redirect()->route('item.index');
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
