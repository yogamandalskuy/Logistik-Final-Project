@extends('Admin.layouts.app')

@section('content')

    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <nav class="container-fluid px-4">
                        <h1 class="mt-4">List Item</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Item</li>
                        </ol>
                    </nav>
                    <div class="card mb-4" style="width: 95%; margin-left:2%">
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="itemTable">
                                <thead>
                                    <tr>
                                        <th>Code Items</th>
                                        <th>Items Name</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->item_id }}</td>
                                            <td>{{ $item->item_name }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>
                                                <button class="btn btn-outline-success btn-sm me-2 btn-edit"
                                                    data-id="{{ $item->id }}" data-item_id="{{ $item->item_id }}"
                                                    data-item_name="{{ $item->item_name }}"
                                                    data-amount="{{ $item->amount }}">
                                                    <i class="bi-pencil-square"></i>
                                                </button>
                                                <form action="{{ route('item.destroy', $item->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-sm me-2 btn-delete"
                                                        data-name="{{ $item->item_name }}"><i class="bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>

        {{-- POP UP EDIT --}}
        <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="editItemForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_item_id" class="form-label">Item ID</label>
                                <input class="form-control" type="text" name="item_id" id="edit_item_id"
                                    placeholder="Enter Items ID">
                            </div>
                            <div class="form-group">
                                <label for="edit_item_name" class="form-label">Item Name</label>
                                <input class="form-control" type="text" name="item_name" id="edit_item_name"
                                    placeholder="Enter Item Name">
                            </div>
                            <div class="form-group">
                                <label for="edit_amount" class="form-label">Amount</label>
                                <input class="form-control" type="text" name="amount" id="edit_amount"
                                    placeholder="Enter Amount">
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script type="module">
        $(document).ready(function() {
            console.log('DataTable script running');
            $("#itemTable").DataTable({
                columns: [{
                        data: "item_id",
                        name: "item_id"
                    },
                    {
                        data: "item_name",
                        name: "item_name"
                    },
                    {
                        data: "amount",
                        name: "amount"
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
            });

            // Handle edit button click event
            $("#itemTable").on("click", ".btn-edit", function() {
                var id = $(this).data('id');
                var item_id = $(this).data('item_id');
                var item_name = $(this).data('item_name');
                var amount = $(this).data('amount');

                $('#editItemForm').attr('action', '/item/' + id);
                $('#edit_item_id').val(item_id);
                $('#edit_item_name').val(item_name);
                $('#edit_amount').val(amount);

                $('#editItemModal').modal('show');
            });

            // Handle delete button click event
            $("#itemTable").on("click", ".btn-delete", function(e) {
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
