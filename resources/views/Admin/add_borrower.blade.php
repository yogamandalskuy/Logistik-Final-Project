@extends('Admin.layouts.app')

@section('content')

    <body class="sb-nav-fixed">

        <div id="layoutSidenav">

            <div id="layoutSidenav_content">
                <main>
                    <nav nav class="container-fluid px-4">
                        <h1 class="mt-4">Add Borrower</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Add Borrower</li>
                        </ol>
                    </nav>
                    <div class="card mb-4" style="width: 97%; margin-left:1%">
                        <div style="width:90%; margin-left:5%; padding: 20px 50px 50px 50px">
                            <div class="mb-3 text-center">
                                <h4>ADD BORROWER</h4>
                            </div>
                            <hr>
                            <form action="{{ route('borrower.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="User" class="form-label">User</label>
                                        <select name="User" id="User" class="form-select">
                                            <option value="Dosen"> Dosen </option>
                                            <option value="Staff"> Staff </option>
                                            <option value="Mahasiswa"> Mahasiswa </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Name" class="form-label">Name</label>
                                        <input class="form-control @error('Name') is-invalid @enderror" type="text"
                                            name="Name" id="Name" value="{{ old('Name') }}"
                                            placeholder="Masukkan Nama">
                                        @error('Name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Items_Name" class="form-label">Items Name</label>
                                        <input class="form-control @error('Items_Name') is-invalid @enderror" type="text"
                                            name="Items_Name" id="Items_Name" value="{{ old('Items_Name') }}"
                                            placeholder="Masukkan Nama Barang">
                                        @error('Items_Name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Qty" class="form-label">Qty</label>
                                        <input class="form-control @error('Qty') is-invalid @enderror" type="text"
                                            name="Qty" id="Qty" value="{{ old('Qty') }}"
                                            placeholder="Masukkan Jumlah">
                                        @error('Qty')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Start_Date" class="form-label">Start Date</label>
                                        <input class="form-control @error('Start_Date') is-invalid @enderror" type="date"
                                            name="Start_Date" id="Start_Date" value="{{ old('Start_Date') }}"
                                            placeholder="Masukkan Tanggal Mulai">
                                        @error('Start_Date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="End_Date" class="form-label">End Date</label>
                                        <input class="form-control @error('End_Date') is-invalid @enderror" type="date"
                                            name="End_Date" id="End_Date" value="{{ old('End_Date') }}"
                                            placeholder="Masukkan Tanggal Selesai">
                                        @error('End_Date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Guarantee" class="form-label">Guarantee</label>
                                        <input class="form-control @error('Guarantee') is-invalid @enderror" type="text"
                                            name="Guarantee" id="Guarantee" value="{{ old('Guarantee') }}"
                                            placeholder="Masukkan Jaminan">
                                        @error('Guarantee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select">
                                            @foreach ($status as $status)
                                                <option value="{{ $status->id }}"
                                                    {{ old('status') == $status->id ? 'selected' : '' }}>
                                                    {{ $status->kodestatus . ' - ' . $status->namastatus }}
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
                                        <a href="{{ route('Dashboard') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                                class="bi-arrow-left-circle me-2"></i> Cancel </a>
                                    </div>
                                    <div class="col-md-6 d-grid">
                                        <button type="submit" class="btn btn-dark btn-lg mt-3"><i
                                                class="bi-check-circle me-2"></i> Save </button>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04" class="form-label">User</label>
                                        <select class="form-select" id="validationCustom04" required>
                                            <option>Dosen</option>
                                            <option>Staff</option>
                                            <option>Mahasiswa</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Select a valid user.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Name" class="form-label">Name</label>
                                        <input class="form-control @error('Name') is-invalid @enderror" type="text"
                                            name="Name" id="Name" value="{{ old('Name') }}"
                                            placeholder="Enter Name">
                                        @error('Name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Qty" class="form-label">Qty</label>
                                        <input class="form-control @error('Qty') is-invalid @enderror" type="text"
                                            name="Qty" id="Qty" value="{{ old('Qty') }}"
                                            placeholder="Enter Qty">
                                        @error('Qty')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Guarantee" class="form-label">Guarantee</label>
                                        <input class="form-control @error('Guarantee') is-invalid @enderror" type="text"
                                            name="Guarantee" id="Guarantee" value="{{ old('Guarantee') }}"
                                            placeholder="Enter Guarantee">
                                        @error('Guarantee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Start_Date" class="form-label">Start Date</label>
                                        <input class="form-control @error('Start_Date') is-invalid @enderror" type="text"
                                            name="Start_Date" id="Start_Date" value="{{ old('Start_Date') }}"
                                            placeholder="Enter Start_Date">
                                        @error('Start_Date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="End_Date" class="form-label">Start Date</label>
                                        <input class="form-control @error('End_Date') is-invalid @enderror" type="text"
                                            name="End_Date" id="End_Date" value="{{ old('End_Date') }}"
                                            placeholder="Enter End_Date">
                                        @error('End_Date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div style="text-align: center">
                                        <label for="Items_Name" class="form-label">Items Name</label>
                                        <input class="form-control @error('Items_Name') is-invalid @enderror" type="text"
                                            name="Items_Name" id="Items_Name" value="{{ old('Items_Name') }}"
                                            placeholder="Enter Items_Name">
                                        @error('Items_Name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <hr> --}}
                                    <div class="row">
                                        <div class="col-md-6 d-grid">
                                            <a href="{{ route('Dashboard') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                                        </div>
                                        <div class="col-md-6 d-grid">
                                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i
                                                    class="bi-check-circle me-2"></i> Save</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
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

    </body>
@endsection

