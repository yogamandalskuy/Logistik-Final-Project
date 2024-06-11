@extends('Admin.layouts.app')
@section('content')

    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Items</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Items</li>
                        </ol>
                    </div>
                    <div class="card mb-4" style="width: 45%; margin-left: 27.5%; padding: 20px;">
                        <div class="mb-3 text-center">
                            <h4>Add Items</h4>
                            <hr>
                        </div>
                        <form action="{{ route('item.store') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-12 mb-3">
                                    <label for="item_name" class="form-label">Name of Items</label>
                                    <input class="form-control @error('item_name') is-invalid @enderror" type="text"
                                        name="item_name" id="item_name" value="{{ old('item_name') }}"
                                        placeholder="Enter Name of Items">
                                    @error('item_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="item_id" class="form-label">Code Items</label>
                                    <input class="form-control @error('item_id') is-invalid @enderror" type="text"
                                        name="item_id" id="item_id" value="{{ old('item_id') }}"
                                        placeholder="Enter Item ID">
                                    @error('item_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input class="form-control @error('amount') is-invalid @enderror" type="text"
                                        name="amount" id="amount" value="{{ old('amount') }}"
                                        placeholder="Enter Amount">
                                    @error('amount')
                                        <div class="invalid-feedbaWck">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 d-grid">
                                    <a href="{{ route('item.index') }}" class="btn btn-outline-dark btn-lg mt-3">
                                        <i class="bi-arrow-left-circle me-2"></i> Cancel
                                    </a>
                                </div>
                                <div class="col-md-6 d-grid">
                                    <button type="submit" class="btn btn-dark btn-lg mt-3">
                                        <i class="bi-check-circle me-2"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </body>
@endsection
