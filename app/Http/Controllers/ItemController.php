<?php

namespace App\Http\Controllers;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Item';

        return view('Admin.list_item', ['pageTitle' => $pageTitle]);
    }

    public function create()
    {
        $pageTitle = 'Add Items';

        return view('Admin.create_item', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $messages = [
        'required' => ':Attribute harus diisi.',
        'numeric' => 'Isi :attribute dengan angka',
        ];
        $validator = Validator::make($request->all(), [
        'Item_ID' => 'required',
        'Items_name' => 'required',
        'Amount' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return $request->all();
    }
}
