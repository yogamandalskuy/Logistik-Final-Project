@extends('Admin.layouts.app')

@section('content')

    <body class="sb-nav-fixed">

        <div id="layoutSidenav">

            <div id="layoutSidenav_content">
                <main>
                    <nav nav class="container-fluid px-4">
                        <h1 class="mt-4">List Borrower</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Borrower</li>
                        </ol>
                    </nav>
                    <div class="card mb-4" style="width: 95%; margin-left:2%">

                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Guarantee</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Items Name</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>

    </body>
@endsection
