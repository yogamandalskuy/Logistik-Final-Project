<a href="{{ route('borrower.show', ['borrower' => $borrower->id]) }}" class="btn btn-outline-info btn-sm me-2">
        <i class="bi bi-person-lines-fill"></i>
    </a>
<button class="btn btn-outline-secondary btn-sm me-2 btn-edit" data-id="{{ $borrower->id }}"
    data-user="{{ $borrower->user }}" data-name="{{ $borrower->name }}" data-itemsname="{{ $borrower->itemsname }}"
    data-qty="{{ $borrower->qty }}" data-startdate="{{ $borrower->startdate }}" data-enddate="{{ $borrower->enddate }}"
    data-guarantee="{{ $borrower->guarantee }}" data-status="{{ $borrower->status->namastatus }}">
    <i class="bi bi-pencil-square"></i>
</button>
<form action="{{ route('borrower.destroy', ['borrower' => $borrower->id]) }}" method="POST" class="d-inline-block">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger btn-sm me-2 btn-delete" data-name="{{ $borrower->user }}">
        <i class="bi bi-trash"></i>
    </button>
</form>
