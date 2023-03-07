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
        $items = CartItem::where('id', 11)->get();
        $toppings = CartTopping::where('cart_item_id', 11)->get();

        $total_price = 0;
        $tax = 0;
        foreach($items as $item) {
            if($item->item->price_m) {
                $total_price += $item->item->price_m * $item->quantity;
            } else {
                $total_price += $item->item->price_l * $items->quantity;
            }
            $tax += $total_price * 0.1;
        }

        // 商品の情報をビューに渡す
        return view('cart.cart_list', [
            'items' => $items,
            'toppings' => $toppings,
            'total_price' => $total_price,
            'tax' => $tax,
        ]);
    }

    /**
     * ショッピングカートに商品を追加
     * @param AddRequest $request リクエスト
     * @return void
     */
    public function addCartItems(AddRequest $request)
    {

        // dd($request->input('size'));

        // カート情報をセッションから取得する
        $cart_id = Session::get('cart');
        
        $items = CartItem::where('cart_id', $cart_id)
        ->where('item_id', $request->input('id'))
        ->first();

        // $topping = CartTopping::where('cart_item_id', $item->id)
        //     ->where('topping_id', $request->topping)
        //     ->first();


        if($items) {
            $items->quantity += $request->input('quantity');
            if($request->input('price_m')) {
                $items->order_price += $request->input('price_m');
            } else {
                $items->order_price += $request->input('price_l');
            }
            $items->save();
        } else {
            $cart_item = new CartItem();
            $cart_item->cart_id = $cart_id;
            $cart_item->item_id = $request->input('id');
            $cart_item->size = $request->input('size');
            $cart_item->quantity = $request->input('quantity');
            if($request->input('size_m')) {
                $cart_item->order_price = $request->input('size_m');
            } else {
                $cart_item->order_price = $request->input('size_l');
            }
            $cart_item->save();
        }

        return view('cart.cart_list', [
            'items' => $items
        ]);

        // // fillableに設定する
        // if($topping) {
        //     CartTopping::create([
        //         'cart_item_id',
        //         ''
        //     ]);
        // }
    }

    /**
     * ショッピングカートの商品を削除
     * @param DeleteRequest $request リクエスト
     * @return void
     */
    public function deleteCartItems(DeleteRequest $request)
    {

        $item_id = $request['id'];

        // 関連するCartToppingsテーブルのレコードを削除する
        CartTopping::where('cart_item_id', $item_id)->delete();

        // CartItemsテーブルのレコードを削除する
        CartItem::where('id', $item_id)->delete();

        return redirect(route('cart'));
    }
}
