<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" href="/resources/images/logo.ico" type="image/x-icon">
    <link rel="icon" href="/resources/images/logo.png" type="image/png">
    <link rel="stylesheet" href="../css/styles.css" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Your Image"
            style="width: 20px; margin-left:10px">
        <h4 class="navbar-brand ps-3" style="width:170px">Tel-U Logistic</h4>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                {{-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-danger" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button> --}}
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="container-sm mt-5">
        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    {{-- Penempatan validation kurang tepat --}}
                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif --}}
                    <div class="mb-3 me-0 me-md-5 my-2 my-md-6 text-center dark">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Input Barang</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="borrowerName" class="form-label">Borrower Name</label>
                            <input class="form-control @error('borrowerName') is-invalid @enderror" type="text"
                                name="borrowerName" id="borrowerName" value="{{ old('borrowerName') }}"
                                placeholder="Enter Borrower Name">
                            @error('borrowerName')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Items" class="form-label">Items</label>
                            <input class="form-control @error('Items') is-invalid @enderror" type="text"
                                name="Items" id="Items" value="{{ old('Items') }}"
                                placeholder="Enter Items">
                            @error('Items')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Amount" class="form-label">Amount</label>
                            <input class="form-control @error('Amount') is-invalid @enderror" type="text"
                                name="Amount" id="Amount" value="{{ old('Amount') }}"
                                placeholder="Enter Amount">
                            @error('Amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input class="form-control @error('startDate') is-invalid @enderror" type="text"
                                name="startDate" id="startDate" value="{{ old('startDate') }}"
                                placeholder="Enter Start Date">
                            @error('startDate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input class="form-control @error('endDate') is-invalid @enderror" type="text"
                                name="endDate" id="deskripsiBarang" value="{{ old('endDate') }}"
                                placeholder="Enter End Date">
                            @error('endDate')
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
                        {{-- <div class="col-md-12 mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select name="satuan" id="satuan" class="form-select">
                                @foreach ($satuans as $satuan)
                                    <option value="{{ $satuan->id }}"
                                        {{ old('satuan') == $satuan->id ? 'selected' : '' }}>
                                        {{ $satuan->kodesatuan . ' - ' . $satuan->kodename }}</option>
                                @endforeach
                            </select>
                            @error('satuan')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div> --}}

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
