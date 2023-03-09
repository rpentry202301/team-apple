<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Topping;
use App\Models\CartItem;
use App\Models\CartTopping;
use Illuminate\Http\Request;
use App\Http\Requests\Cart\AddRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Cart\DeleteRequest;

class CartController extends Controller
{
    /**
     * ショッピングカートの中身を表示
     *
     * @return view ショッピングカートの一覧
     */
    public function showCartItems()
    {
        // セッションからカート情報を取得する
        $cart_id = Session::get('cart');

        // 商品の情報を元に、カートの中身を構築する
        $items = CartItem::find(1);
        $toppings = CartTopping::where('cart_id', $cart_id);

        // 商品の情報をビューに渡す
        return view('cart.cart_list', [
            'items' => $items,
            'toppings' => $toppings
        ]);
    }


    /**
     * ショッピングカートに商品を追加
     * @param AddRequest $request リクエスト
     * @return void
     */
    public function addCartItems(AddRequest $request)
    {
        // カート情報をセッションから取得する
        $cart = session()->get('cart', []);

        // カート情報をセッションに保存する
        session()->put('cart', $cart);
    }

    /**
     * ショッピングカートの商品を削除
     * @param DeleteRequest $request リクエスト
     * @return void
     */
    public function deleteCartItems(DeleteRequest $request)
    {
        // カート情報をセッションから取得する
        $cart = session()->get('cart', []);

        // 削除する商品のidを取得する
        $item_id = $request->input('item_id');

        // カートから指定された商品を削除する
        if(isset($cart[$item_id])) {
            unset($cart[$item_id]);
        }

        // カート情報をセッションに保存する
        session()->put('cart', $cart);
    }
}
