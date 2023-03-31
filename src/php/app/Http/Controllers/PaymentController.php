<?php

namespace App\Http\Controllers;

use Payjp\Payjp;
use Payjp\Charge;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class  PaymentController extends Controller
{
    public function payment(Request $request)

    {
        if (empty($request->get('payjp-token'))) {
            abort(404);
        }
        DB::beginTransaction();

        try {
            // ログインユーザー取得
            $user = auth()->user();
            // シークレットキーを設定
            \Payjp\Payjp::setApiKey(config('payjp.secret_key'));

            // 顧客情報登録
            $customer = \Payjp\Customer::create([
                // カード情報も合わせて登録する
                'card' => $request->get('payjp-token'),
                // 概要
                'description' => "userId: {$user->id}, userName: {$user->name}",
            ]);

            // DBにpayjpの顧客idを登録
            $user->payjp_customer_id = $customer->id;
            $user->save();

            //注文情報の取得

            $order = Order::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->first();

            // 支払い処理
            // 新規支払い情報作成
            \Payjp\Charge::create([
                // 上記で登録した顧客のidを指定
                "customer" => $customer->id,
                // 金額
                "amount" => $order->total_price,
                // //仮の金額
                // "amount" => 3000,
                // 通貨
                "currency" => 'jpy',
            ]);

            DB::commit();
            return redirect(route('payment'));
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return redirect()->back();
        }
    }
}
