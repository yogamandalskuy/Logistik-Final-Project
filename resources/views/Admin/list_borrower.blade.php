@extends('Admin.layouts.app')

@section('content')

    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">List Borrower</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Borrower</li>
                        </ol>
                    </div>
                    <div class="card mb-4" style="width: 95%; margin-left:2%">
                        <div class="card-body">
                            <div class="d-flex justify-content-end mb-3">
                                {{-- Button Add Items --}}
                                <a class="btn btn-outline-primary me-2" href="{{ route('add_borrower') }}"><i
                                        class="bi bi-plus-lg" style="margin: 2px"></i>Add Borrower</a>

                                {{-- Button Export Table --}}
                                <a class="btn btn-outline-success" href="#"><i class="bi bi-filetype-xls"
                                        style="margin: 2px"></i>Import
                                    Excel</a>
                            </div>
                            <table id="borrowerTable" class="table table-bordered table-hover table-striped mb-0 bg-white">
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
                                        <th>Actions</th>
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
                                                @include('Admin.actions_borrower')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        {{-- POPUP EDIT --}}
        <div class="modal fade" id="editBorrowerModal" tabindex="-1" aria-labelledby="editBorrowerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editBorrowerForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editBorrowerModalLabel">Edit Borrower</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_user" class="form-label">User</label>
                                {{-- <select name="user" id="edit_user" class="form-select">
                                    <option value="Dosen" {{ old('User', $borrower->user) == 'Dosen' ? 'selected' : '' }}>
                                        Dosen </option>
                                    <option value="Staff" {{ old('User', $borrower->user) == 'Staff' ? 'selected' : '' }}>
                                        Staff </option>
                                    <option value="Mahasiswa"
                                        {{ old('User', $borrower->user) == 'Mahasiswa' ? 'selected' : '' }}>
                                        Mahasiswa </option>
                                </select> --}}
                            </div>
                            <div class="form-group">
                                <label for="edit_name" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" id="edit_name"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="edit_itemsname" class="form-label">Items Name</label>
                                <input class="form-control" type="text" name="itemsname" id="edit_itemsname"
                                    placeholder="Enter Items Name">
                            </div>
                            <div class="form-group">
                                <label for="edit_qty" class="form-label">Quantity</label>
                                <input class="form-control" type="number" name="qty" id="edit_qty"
                                    placeholder="Enter Quantity">
                            </div>
                            <div class="form-group">
                                <label for="edit_startdate" class="form-label">Start Date</label>
                                <input class="form-control" type="date" name="startdate" id="edit_startdate">
                            </div>
                            <div class="form-group">
                                <label for="edit_enddate" class="form-label">End Date</label>
                                <input class="form-control" type="date" name="enddate" id="edit_enddate">
                            </div>
                            <div class="form-group">
                                <label for="edit_guarantee" class="form-label">Guarantee</label>
                                <input class="form-control" type="text" name="guarantee" id="edit_guarantee"
                                    placeholder="Enter Guarantee">
                            </div>
                            <div class="form-group">
                                <label for="edit_status" class="form-label">Status</label>
                                <select name="status" id="edit_status" class="form-control">
                                    <option value="Pending"
                                        {{ old('status', $borrower->status) == '1 - Pending' ? 'selected' : '' }}>
                                        Pending </option>
                                    <option value="Approve"
                                        {{ old('status', $borrower->status) == '2 - Approve' ? 'selected' : '' }}>
                                        Approve </option>
                                    <option value="Reject"
                                        {{ old('status', $borrower->status) == '3 - Reject' ? 'selected' : '' }}>
                                        Reject </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module">
        $(document).ready(function() {
            console.log('DataTable script running');
            $("#borrowerTable").DataTable();
            ({
                columns: [{
                        data: "user",
                        name: "user"
                    },
                    {
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "itemsname",
                        name: "itemsname"
                    },
                    {
                        data: "qty",
                        name: "qty"
                    },
                    {
                        data: "startdate",
                        name: "startdate"
                    },
                    {
                        data: "enddate ",
                        name: "enddate "
                    },
                    {
                        data: "guarantee",
                        name: "guarantee"
                    },
                    {
                        data: "namastatus",
                        name: "namastatus"
                    },
                    {
                        data: "actions",
                        name: "actions",
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [0, "desc"]
                ],
                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
            })

            // SHOW
            $(".btn-show").on("click", function(e) {
                e.preventDefault();
                var user = $(this).data('user');
                var name = $(this).data('name');
                var itemsname = $(this).data('itemsname');
                var qty = $(this).data('qty');
                var startdate = $(this).data('startdate');
                var enddate = $(this).data('enddate');
                var guarantee = $(this).data('guarantee');
                var status = $(this).data('status');

                Swal.fire({
                    title: 'Borrower Detail',
                    html: '<table class="table">' +
                        '<tr><td style="text-align: left;"><b>User:</b></td><td style="text-align: left;">' +
                        user + '</td></tr>' +
                        '<tr><td style="text-align: left;"><b>Name:</b></td><td style="text-align: left;">' +
                        name + '</td></tr>' +
                        '<tr><td style="text-align: left;"><b>Items Name:</b></td><td style="text-align: left;">' +
                        itemsname + '</td></tr>' +
                        '<tr><td style="text-align: left;"><b>Quantity:</b></td><td style="text-align: left;">' +
                        qty + '</td></tr>' +
                        '<tr><td style="text-align: left;"><b>Start Date:</b></td><td style="text-align: left;">' +
                        startdate + '</td></tr>' +
                        '<tr><td style="text-align: left;"><b>End Date:</b></td><td style="text-align: left;">' +
                        enddate + '</td></tr>' +
                        '<tr><td style="text-align: left;"><b>Guarantee:</b></td><td style="text-align: left;">' +
                        guarantee + '</td></tr>' +
                        '<tr><td style="text-align: left;"><b>Status:</b></td><td style="text-align: left;">' +
                        status + '</td></tr>' +
                        '</table>',
                    icon: 'info',
                    confirmButtonClass: 'bg-primary',
                    confirmButtonText: 'OK'
                });
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

                $('#editBorrowerForm').attr('action', '/borrower/' + id);
                $('#edit_user').val(user);
                $('#edit_name').val(name);
                $('#edit_itemsname').val(itemsname);
                $('#edit_qty').val(qty);
                $('#edit_startdate').val(startdate);
                $('#edit_enddate').val(enddate);
                $('#edit_guarantee').val(guarantee);
                $('#edit_status').val(status);

                $('#editBorrowerModal').modal('show');

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
