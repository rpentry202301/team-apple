<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\CartTopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Cart\AddRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Cart\DeleteRequest;


class CartController extends Controller
{
    /**
     * ショッピングカートの中身を表示
     * @return view ショッピングカートの一覧
     */
    public function showCartItems()
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
     * @return view カート画面
     */
    public function addCartItems(AddRequest $request)
    {
        // セッションからカート情報を取得する
        $cart_id = Session::get('cart');

        $topping_value = $request->input('topping');
        if (is_array($topping_value)) {
            $topping_ids = $topping_value;
        } else {
            $topping_ids = [$topping_value];
        }
        
        // カートに紐づくCartItemテーブルのコレクションを取得
        $items = CartItem::where('cart_id', $cart_id)
            ->where('item_id', $request->input('id'))
            ->where('size', $request->input('size'))
            ->join('cart_toppings', 'cart_toppings.cart_item_id', '=', 'cart_items.id')
            ->whereIn('cart_toppings.topping_id', $topping_ids)
            ->get();

        $toppings = null; // トッピングがない時にnullのエラーが出てしまうため変数を定義

        // カートの中に同じ商品が存在する場合は数量と金額を追加し、存在しない場合は新しくCartItemテーブルを作成
        if (count($items) > 0) {
            $item = $items->first();
            $item->quantity += $request->input('quantity');
            if ($request->input('price_m')) {
                $item->order_price += $request->input('price_m');
            } else {
                $item->order_price += $request->input('price_l');
            }
            $item->save();

            $toppings = CartTopping::where('cart_item_id', $items->first()->id)->get();
            if (count($toppings) > 0) {
                foreach ($toppings as $topping) {
                    if ($request->input('price_m')) {
                        $topping->total_topping_price += $request->input('price_m');
                    } else {
                        $topping->total_topping_price += $request->input('price_l');
                    }
                    $topping->save();
                }
            }
        } else {
            $item = new CartItem();
            $item->user_id = Auth::user()->id;
            $item->cart_id = $cart_id;
            $item->item_id = $request->input('id');
            $item->size = $request->input('size');
            $item->quantity = $request->input('quantity');
            if ($request->input('size') == 'M') {
                $item->order_price = $request->input('size_m');
            } else {
                $item->order_price = $request->input('size_l');
            }
            $item->save();

            foreach ($topping_ids as $topping_id) {
                $topping = new CartTopping();
                $topping->cart_item_id = $item->id;
                $topping->user_id = Auth::user()->id;
                $topping->topping_id = $topping_id;
                if ($request->input('size') == 'M') {
                    $topping->total_topping_price = $request->input('topping_m');
                } else {
                    $topping->total_topping_price = $request->input('topping_l');
                }
                $topping->save();
            }
        }

        $total_price = (int)Cart::calculateTotalPrice($items, $toppings); // 合計金額を計算
        $tax = (int)Cart::calculateTax($total_price); // 消費税を計算
        $total_price += $tax; // 消費税を合計金額に上乗せ

        // 商品の情報をビューに渡す
        return redirect(route('cart', [
            'items' => $items,
            'toppings' => $toppings,
            'total_price' => $total_price,
            'tax' => $tax
        ]));
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
