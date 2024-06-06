<div class="d-flex">
    {{-- <a href="{{ route('item.show', ['item' => $item->id]) }}" class="btn btn-outline-dark btn-sm me-2">
        <i class="bi-person-lines-fill"></i>
    </a> --}}
    {{-- <a href="{{ route('item.edit', ['item' => $item->id]) }}" class="btn btn-outline-success btn-sm me-2"><i
            class="bi-pencil-square"></i></a>
    <div> --}}

    <button class="btn btn-primary btn-edit" data-id="{{ $item->id }}" data-item_id="{{ $item->item_id }}"
        data-item_name="{{ $item->item_name }}" data-amount="{{ $item->amount }}">
        Edit
    </button>
    {{-- <button class="btn btn-outline-success btn-sm me-2 btn-edit" data-id="{{ $item->id }}"
        data-item_id="{{ $item->item_id }}" data-item_name="{{ $item->item_name }}" data-amount="{{ $item->amount }}">
        <i class="bi-pencil-square"></i>
    </button> --}}

    <form action="{{ route('item.destroy', ['item' => $item->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger btn-sm me-2 btn-delete"
            data-name="{{ $item->item_id . ' ' . $item->item_name }}">
            <i class="bi-trash"></i>
        </button>
    </form>
</div>
</div>
