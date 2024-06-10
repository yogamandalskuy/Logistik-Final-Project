@extends('Admin.layouts.app')

@section('content')

<body class="sb-nav-fixed">

    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <nav class="container-fluid px-4">
                    <h1 class="mt-4">List Borrower</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">List Borrower</li>
                    </ol>
                </nav>
                <div class="card mb-4" style="width: 97%; margin-left:1%">
                    <div class="container-sm my-5">
                        <div class="row justify-content-center">
                            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                                <div class="mb-3 text-center">
                                    <i class="bi-person-circle fs-1"></i>
                                    <h4>Edit Borrower</h4>
                                </div>
                                <hr>
                                <form action="{{ route('borrower.update', $borrower->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="User" class="form-label">User</label>
                                            <select name="User" id="User" class="form-select">
                                                <option value="Dosen"
                                                    {{ old('User', $borrower->user) == 'Dosen' ? 'selected' : '' }}>
                                                    Dosen </option>
                                                <option value="Staff"
                                                    {{ old('User', $borrower->user) == 'Staff' ? 'selected' : '' }}>
                                                    Staff </option>
                                                <option value="Mahasiswa"
                                                    {{ old('User', $borrower->user) == 'Mahasiswa' ? 'selected' : '' }}>
                                                    Mahasiswa </option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Name" class="form-label">Name</label>
                                            <input class="form-control @error('Name') is-invalid @enderror"
                                                type="text" name="Name" id="Name"
                                                value="{{ old('Name', $borrower->name) }}" placeholder="Enter Name">
                                            @error('Name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Items_Name" class="form-label">Items Name</label>
                                            <input class="form-control @error('Items_Name') is-invalid @enderror"
                                                type="text" name="Items_Name" id="Items_Name"
                                                value="{{ old('Items_Name', $borrower->itemsname) }}"
                                                placeholder="Enter Items_Name">
                                            @error('Items_Name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Qty" class="form-label">Qty</label>
                                            <input class="form-control @error('Qty') is-invalid @enderror"
                                                type="text" name="Qty" id="Qty"
                                                value="{{ old('Qty', $borrower->qty) }}" placeholder="Enter Qty">
                                            @error('Qty')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Start_Date" class="form-label">Start Date</label>
                                            <input class="form-control @error('Start_Date') is-invalid @enderror"
                                                type="text" name="Start_Date" id="Start_Date"
                                                value="{{ old('Start_Date', $borrower->startdate) }}"
                                                placeholder="Enter Start_Date">
                                            @error('Start_Date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="End_Date" class="form-label">End Date</label>
                                            <input class="form-control @error('End_Date') is-invalid @enderror"
                                                type="text" name="End_Date" id="End_Date"
                                                value="{{ old('End_Date', $borrower->enddate) }}"
                                                placeholder="Enter End_Date">
                                            @error('End_Date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="Guarantee" class="form-label">Guarantee</label>
                                            <input class="form-control @error('Guarantee') is-invalid @enderror"
                                                type="text" name="Guarantee" id="Guarantee"
                                                value="{{ old('Guarantee', $borrower->guarantee) }}"
                                                placeholder="Enter Guarantee">
                                            @error('Guarantee')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" id="status" class="form-select">
                                                @foreach ($status as $stat)
                                                    <option value="{{ $stat->id }}"
                                                        {{ old('status', $borrower->status_id) == $stat->id ? 'selected' : '' }}>
                                                        {{ $stat->kodestatus . ' - ' . $stat->namastatus }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 d-grid">
                                            <a href="{{ route('Dashboard') }}"
                                                class="btn btn-outline-dark btn-lg mt-3"><i
                                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                                        </div>
                                        <div class="col-md-6 d-grid">
                                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i
                                                    class="bi-check-circle me-2"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
