@if($item->users()->where('user_id', Auth::id())->exists())
<form action="{{route('unfavorites', $item)}}" method="POST">
    @csrf
    <button type="submit" wire:click="destroy" class="btn-link" style="background:none; border:none; color: red;">
        <i class="fas fa-heart"></i>
    </button>
</form>
@else
<form action="{{route('favorites', $item)}}" method="POST">
    @csrf
    <button type="submit" wire:click="store" class="btn-link" style="background:none; border:none; color: blue;">
        <i class="fas fa-heart"></i>
    </button>
</form>
@endif