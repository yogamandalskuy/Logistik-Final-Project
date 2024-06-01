<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Barang';

        // ELOQUENT
        $barangs = Barang::all();

        return view('barang.index', [
            'pageTitle' => $pageTitle,
            'barangs' => $barangs
    ]);

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Input Barang';
        return view('barang.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $messages = [
        'required' => ':Attribute harus diisi.',
        'numeric' => 'Isi :attribute dengan angka',
        'date' => 'Isi :attribute sesuai ketentuan tanggal'
    ];

    $validator = Validator::make($request->all(), [
        'borrowerName' => 'required',
        'Items' => 'required',
        'Amount' => 'required|numeric',
        'startDate' => 'required|date',
        'endDate' => 'required|date',
        'Guarantee' => 'required',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    return $request->all();
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
