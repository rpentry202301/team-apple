<?php

namespace App\Http\Livewire;

use App\Http\Controllers\FavoriteController;
use Livewire\Component;

class LikeButton extends Component
{

    public function like()
    {

    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
