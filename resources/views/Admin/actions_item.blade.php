<button class="btn btn-outline-success btn-sm me-2 btn-edit" data-id="{{ $item->id }}"
    data-item_id="{{ $item->item_id }}" data-item_name="{{ $item->item_name }}" data-amount="{{ $item->amount }}">
    <i class="bi-pencil-square"></i>
</button>
<form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger btn-sm me-2 btn-delete" data-name="{{ $item->item_name }}"><i
            class="bi-trash"></i></button>
</form>
