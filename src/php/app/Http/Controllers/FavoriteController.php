<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * いいねをする
     *
     * @param  Item $item 商品
     * @return 商品一覧画面
     */
    public function store(Item $item)
    {
        $item->users()->attach(Auth::id());
        return redirect()->route('top');
    }

    /**
     * いいねを取り消す
     *
     * @param  Item $item 商品
     * @return 商品一覧画面
     */
    public function destroy(Item $item)
    {
        $item->users()->detach(Auth::id());
        return redirect()->route('top');
    }
}
