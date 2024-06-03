@extends('Admin.layouts.top_bar')
@extends('Admin.layouts.side_bar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>List Borrower</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

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
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <div style="width:90%; margin-left:5%; padding: 20px 50px 50px 50px">
                        <div class="mb-3 text-center">
                            <h4>ADD BORROWER</h4>
                        </div>
                        <hr>
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
                            <hr>
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
                    </div>
                </div>
                </form>
        </div>
    </div>
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
