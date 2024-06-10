@extends('Admin.layouts.app')

@section('content')

<body class="sb-nav-fixed">

    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <nav class="container-fluid px-4">
                    <h1 class="mt-4">Add Borrower</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Add Borrower</li>
                    </ol>
                </nav>
                <div class="card mb-4" style="width: 97%; margin-left:1%">
                    <div class="container-sm my-5">
                        <div class="row justify-content-center">
                            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                                <div class="mb-3 text-center">
                                    <i class="bi-person-circle fs-1"></i>
                                    <h4>Detail Borrower</h4>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="User" class="form-label">User</label>
                                        <h5>{{ $borrower->user }}</h5>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Name" class="form-label">Name</label>
                                        <h5>{{ $borrower->name }}</h5>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ItemsName" class="form-label">Items Name</label>
                                        <h5>{{ $borrower->itemsname }}</h5>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Qty" class="form-label">Qty</label>
                                        <h5>{{ $borrower->qty }}</h5>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="StartDate" class="form-label">Start Date</label>
                                        <h5>{{ $borrower->startdate }}</h5>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="EndDate" class="form-label">End Date</label>
                                        <h5>{{ $borrower->enddate }}</h5>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Guarantee" class="form-label">Guarantee</label>
                                        <h5>{{ $borrower->guarantee }}</h5>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="Status" class="form-label">Status</label>
                                        <h5>{{ $borrower->status->namastatus }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 d-grid">
                                        <a href="{{ route('Dashboard') }}" class="btn btn-outline-dark btn-lg mt-3">
                                            <i class="bi-arrow-left-circle me-2"></i> Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
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
