@if($item->users()->where('user_id', Auth::id())->exists())
<form action="{{route('unfavorites', $item)}}" method="POST">
    @csrf
    <input type="submit" wire:click="destroy" value="&#xf004;いいね取り消す" class="fas btn btn-danger">
</form>
@else
<form action="{{route('favorites', $item)}}" method="POST">
    @csrf
    <input type="submit" wire:click="store" value="&#xf004;いいね" class="fas btn btn-success">
</form>
@endif