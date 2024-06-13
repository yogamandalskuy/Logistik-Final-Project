<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tel-U Logistic - Telkom University Surabaya</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="User/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>0812345678910</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>telkomuniversity@logistic.telkomuniversity.ac.id</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
            <a href="{{ route('landingpage') }}" class="navbar-brand ml-lg-3">
                <div style="display: flex; align-items: center;">
                    <img src="User/img/logo.jpg" alt="logo" style="width: 50px; margin-right: 10px;">
                    <h4>Tel-U Logistic</h4>
                </div>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                    <div class="navbar-nav m-auto py-0">
                        <a href="{{ route('landingpage') }}" class="nav-item nav-link">Beranda</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">Tentang</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Layanan</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('pengajuan') }}" class="dropdown-item">Pengajuan Peminjaman</a>
                                <a href="{{ route('jadwal') }}" class="dropdown-item">Jadwal Peminjaman</a>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Form -->
    <br>
    <br>
    <div class="mb-3 text-center">
        <i class="bi-person-circle fs-1"></i>
        <h4>Buat Peminjaman</h4>
    </div>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-6">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="user" class="form-label">User</label>
                        <select name="user" id="user" class="form-select">
                            <option value="Dosen">Dosen</option>
                            <option value="Staff">Staff</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}" placeholder="Masukkan Nama">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="items_name" class="form-label">Items Name</label>
                        <input class="form-control @error('items_name') is-invalid @enderror" type="text"
                            name="items_name" id="items_name" value="{{ old('items_name') }}"
                            placeholder="Masukkan Nama Barang">
                        @error('items_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="quantity" class="form-label">quantity</label>
                        <input class="form-control @error('quantity') is-invalid @enderror" type="text"
                            name="quantity" id="quantity" value="{{ old('quantity') }}"
                            placeholder="Masukkan Jumlah">
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="startdate" class="form-label">Start Date</label>
                        <input class="form-control @error('startdate') is-invalid @enderror" type="date"
                            name="startdate" id="startdate" value="{{ old('startdate') }}">
                        @error('startdate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="enddate" class="form-label">End Date</label>
                        <input class="form-control @error('enddate') is-invalid @enderror" type="date"
                            name="enddate" id="enddate" value="{{ old('enddate') }}">
                        @error('enddate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('index') }}" class="btn btn-outline-dark btn-lg mt-3">
                                <i class="bi-arrow-left-circle me-2"></i> Cancel
                            </a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3">
                                <i class="bi-check-circle me-2"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
