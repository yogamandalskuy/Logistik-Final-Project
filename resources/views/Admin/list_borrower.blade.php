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
                                                        class="btn btn-outline-info btn-sm me-2">
                                                        <i class="bi bi-person-lines-fill"></i>
                                                    </a>
                                                    <a href="{{ route('borrower.edit', ['borrower' => $borrower->id]) }}"
                                                        class="btn btn-outline-secondary btn-sm me-2"
                                                        data-id="{{ $borrower->id }}">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <div>
                                                        <form
                                                            action="{{ route('borrower.destroy', ['borrower' => $borrower->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm me-2 btn-delete"
                                                                data-name="{{ $borrower->user }}"><i
                                                                    class="bi-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
                </main>
            </div>
        </div>

        @push('scripts')
            <script type="module">
                $(document).ready(function() {
                    console.log('DataTable script running');
                    $("#borrowerTable").DataTable({
                        columns: [
                            { data: "user", name: "user" },
                            { data: "name", name: "name" },
                            { data: "itemsname", name: "itemsname" },
                            { data: "qty", name: "qty" },
                            { data: "startdate", name: "startdate" },
                            { data: "enddate", name: "enddate" },
                            { data: "guarantee", name: "guarantee" },
                            { data: "status", name: "status" },
                            { data: "fitur", name: "fitur", orderable: false, searchable: false }
                        ],
                        order: [[0, "desc"]],
                        lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
                    });

                    // Handle edit button click event
                    $("#borrowerTable").on("click", ".btn-edit", function() {
                        var id = $(this).data('id');
                        var user = $(this).data('user');
                        var name = $(this).data('name');
                        var itemsname = $(this).data('itemsname');
                        var qty = $(this).data('qty');
                        var startdate = $(this).data('startdate');
                        var enddate = $(this).data('enddate');
                        var guarantee = $(this).data('guarantee');
                        var status = $(this).data('status');

                        $('#editItemForm').attr('action', '/borrower/' + id);
                        $('#edit_user').val(user);
                        $('#edit_name').val(name);
                        $('#edit_itemsname').val(itemsname);
                        $('#edit_qty').val(qty);
                        $('#edit_startdate').val(startdate);
                        $('#edit_enddate').val(enddate);
                        $('#edit_guarantee').val(guarantee);
                        $('#edit_status').val(status);

                        $('#editItemModal').modal('show');
                    });

                    // Handle delete button click event
                    $("#borrowerTable").on("click", ".btn-delete", function(e) {
                        e.preventDefault();
                        var form = $(this).closest("form");
                        var name = $(this).data("name");
                        Swal.fire({
                            title: "Are you sure want to delete\n" + name + "?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "bg-primary",
                            confirmButtonText: "Yes, delete it!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    });
                });
            </script>
        @endpush

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
            </div>
        </div>
    </body>
@endsection
