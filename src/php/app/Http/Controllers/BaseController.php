<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\CartTopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Cart\DeleteRequest;
// use Illuminate\Support\Facades\Auth;



class BaseController extends Controller
{
    /**
     * ショッピングカートの中身を表示
     * @return view ショッピングカートの一覧
     */
    public function getCartItems()
    {
        // セッションからカート情報を取得する
        $cart_id = Session::get('cart');
        $toppings = null;

        // カートの中からセッションの情報に入っているcart_idを持つCartItemテーブルを取得
        $items = CartItem::where('cart_id', $cart_id)->get();
        if (count($items) > 0) {
            $toppings = CartTopping::where('cart_item_id', $items->first()->id)->get();
        }

        $total_price = (int)Cart::calculateTotalPrice($items, $toppings); // 合計金額を計算
        $tax = (int)Cart::calculateTax($total_price); // 消費税を計算
        $total_price += $tax; // 消費税を合計金額に上乗せ

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cart->total_price = $total_price;
        $cart->save();

        return [
            'items' => $items,
            'toppings' => $toppings,
            'total_price' => $total_price,
            'tax' => $tax,
        ];
    }

     public function onlyCouponAdaptionGetCartItems(){

        // セッションからカート情報を取得する
        $cart_id = Session::get('cart');
        $toppings = null;

        // カートの中からセッションの情報に入っているcart_idを持つCartItemテーブルを取得
        $items = CartItem::where('cart_id', $cart_id)->get();
        if (count($items) > 0) {
            $toppings = CartTopping::where('cart_item_id', $items->first()->id)->get();
        }

        $total_price = (int)Cart::calculateTotalPrice($items, $toppings); // 合計金額を計算
        $tax = (int)Cart::calculateTax($total_price); // 消費税を計算
        $total_price += $tax; // 消費税を合計金額に上乗せ


        return [
            'items' => $items,
            'toppings' => $toppings,
            'total_price' => $total_price,
            'tax' => $tax,
        ];
    }

    /**
     * ショッピングカートの商品を削除
     * @param DeleteRequest $request リクエスト
     * @return view カート画面
     */
    public function deleteCartItems(DeleteRequest $request)
    {
        // 商品のidを取得する
        $item_id = $request['id'];

        // 関連するCartToppingsテーブルのレコードを削除する
        CartTopping::where('cart_item_id', $item_id)->delete();
        CartItem::where('id', $item_id)->delete();


        // カート画面にリダイレクト
        return redirect(route('cart'));
    }
}
//テスト
//tesu
//hoge
