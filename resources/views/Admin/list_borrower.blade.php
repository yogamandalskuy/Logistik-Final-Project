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
                                    <th>Items Name</th>
                                    <th>Qty</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Guarantee</th>
                                    <th>Status</th>
                                    <th>Fitur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrower as $borrower)
                                    <tr>
                                        <td>{{ $borrower->user }}</td>
                                        <td>{{ $borrower->name }}</td>
                                        <td>{{ $borrower->itemsname }}</td>
                                        <td>{{ $borrower->qty }}</td>
                                        <td>{{ $borrower->startdate }}</td>
                                        <td>{{ $borrower->enddate }}</td>
                                        <td>{{ $borrower->guarantee }}</td>
                                        <td>{{ $borrower->status->namastatus }}</td>
                                        <td>
                                            {{-- ACTIONS SECTION --}}
                                            <div class="d-flex">
                                                <a href="{{ route('borrower.show', ['borrower' => $borrower->id]) }}"
                                                    class="btn btn-outline-info btn-sm me-2"><i
                                                        class="bi-person-lines-fill"></i></a>
                                                <a href="{{ route('borrower.edit', ['borrower' => $borrower->id]) }}"
                                                    class="btn btn-outline-secondary btn-sm me-2"><i
                                                        class="bi-pencil-square"></i></a>
                                                <div>
                                                    <form
                                                        action="{{ route('borrower.destroy', ['borrower' => $borrower->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm me-2"><i
                                                                class="bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
