@extends('Admin.layouts.app')
@section('content')

    <body class="sb-nav-fixed">

        <div id="layoutSidenav">

            <div id="layoutSidenav_content">
                <main>
                    <nav nav class="container-fluid px-4">
                        <h1 class="mt-4">ADD ITEMS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">ADD ITEMS</li>
                        </ol>
                    </nav>
                    <div class="card mb-4" style="width: 45%; margin-left:30%; padding:20px">
                        <div class="mb-3 text-center">
                            <h4>ADD ITEMS</h4>
                            <hr>
                        </div>
                        <form action="{{ route('item.store') }}" method="POST" style="text-align: center">
                            @csrf
                            <div class="row justify-content-center">
                                {{-- <hr> --}}
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="item_name" class="form-label">Name Of Items</label>

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
                                        <label for="amount" class="form-label">amount</label>

                                        <input class="form-control @error('amount') is-invalid @enderror" type="text"
                                            name="amount" id="amount" value="{{ old('amount') }}"
                                            placeholder="Enter amount">
                                        @error('amount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 d-grid">
                                        <a href="{{ route('item.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                                class="bi-arrow-left-circle
                        me-2"></i>
                                            Cancel</a>
                                    </div>
                                    <div class="col-md-6 d-grid">
                                        <button type="submit" class="btn btn-dark
                        btn-lg mt-3"><i
                                                class="bi-check-circle me-2"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
            </div>
            </main>
        </div>
    </body>
@endsection
