<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user(); // ログインしているユーザーを取得
        $cartId = Session::get('cart');

        // カートがセッションに存在しない場合、カートを作成する
        if (!$cartId) {
            $cart = new Cart();
            if ($user) {
                $cart->user_id = $user->id; // ログインしているユーザーのIDを設定する
            }
            $cart->save();
            $cartId = $cart->id;
            Session::put('cart', $cartId);
        }

        return $next($request);
    }
}
