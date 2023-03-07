<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\BuyRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{

    public function showOrderConfirm()
    {
        return view('order.order_confirm');
    }

    public function buyOrderItems(BuyRequest $request)
    {

        $order = new Order;

        //ログインしたユーザIDが必要なため動作未確認の
        $user_id = Auth::id();
        $order->user_id = $user_id;

        $order->destination_name = $request->input('destination_name');
        $order->destination_email = $request->input('destination_email');
        $order->destination_zipcode = $request->input('destination_zipcode');
        $order->destination_prefectures = $request->input('destination_prefectures');
        $order->destination_municipalities = $request->input('destination_municipalities');
        $order->destination_address_line1 = $request->input('destination_address_line1');
        $order->destination_address_line2 = $request->input('destination_address_line2');
        $order->destination_tell = $request->input('destination_tell');
        $order->delivery_time = $request->input('responsibleCompany');
        $order->payment_method = $request->input('payment_method');

        $order->save();

        return redirect()->route('order.complete');
    }



    public function showOrderComplete()
    {
        return view('order.order_complete');
    }
}
