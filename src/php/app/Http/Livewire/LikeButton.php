<?php

namespace Livewire;

use App\Http\Livewire;
use Livewire\Component;
use App\Models\ItemUser;

class LikeButton extends Component
{
    public $itemId;

    public function store()
    {
        $item_user = new ItemUser();
        $item_user->user_id = auth()->id;
        $item_user->item_id = $this->itemId;
        $item_user->save();
    }

    public function destroy()
    {
      $item_user = ItemUser::where('user_id', auth()->id())
        ->where('item_id', $this->itemId)->first();
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
