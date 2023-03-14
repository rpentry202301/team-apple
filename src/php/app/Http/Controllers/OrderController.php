<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\BuyRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\CartTopping;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderTopping;
use App\Models\Topping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BaseController;
use App\Models\Coupon;
use App\Models\UserCoupon;

class OrderController extends BaseController
{

    public function buyOrderItems()
    {
        $request = BuyRequest::capture();
        $this->saveDeliveryInformation($request);
        $this->saveOrderItems();
        // $this->deleteCart();
        $this->makeCoupon();

        return view('order.order_complete');
    }

    public function makeCoupon()
    {
        $coupon = Coupon::first(); //今は一つしかないため
        $user_id = Auth::id();

        //クーポンを持っているユーザの取得
        $userCoupon = UserCoupon::where('user_id', Auth::user()->id)->first();

        if ($userCoupon === null) {
            $userCoupon = new UserCoupon([
                'user_id' => $user_id,
            ]);
            if ($coupon) {
                $userCoupon->coupon_id = $coupon->id;
            } //なんで上のif文では動かない？
            $userCoupon->save();
        } else {
            $cart = Cart::where('user_id', Auth::user()->id)->first();
            $cart->total_price = ($cart->total_price * 0.9);

            //クーポンの削除s
            UserCoupon::where('user_id', Auth::user()->id)->delete();

            return redirect(route('order.confirm', $cart)); //全部渡さないといけない？

        }
    }


    public function showOrderConfirm()
    {
        $cartItems = $this->getCartItems();
        $data = [
            'items' => $cartItems['items'],
            'toppings' => $cartItems['toppings'],
            'total_price' => $cartItems['total_price'],
            'tax' => $cartItems['tax'],
        ];
        return view('order.order_confirm', $data);
    }



    private function saveDeliveryInformation(BuyRequest $request)
    {
        $validated = $request->validate(
            [
                'destination_name' => 'required|max:100',
                'destination_email' => 'required|max:100',
                'destination_zipcode' => 'required|max:7',
                'destination_zipcode' => 'required|min:7',
                'destination_prefectures' => 'required|max:100',
                'destination_municipalities' => 'required|max:100',
                'destination_address_line1' => 'required|max:100',
                // 'destination_address_line2' => 'required|max:100',
                'destination_tell' => 'required|max:15',

            ],
            [
                'destination_name.required' => 'お名前を入力してください。',
                'destination_name.max' => 'お名前は最大100文字です',
                'destination_email.required' => 'メールアドレスを入力してください。',
                'destination_email.max' => 'メールアドレスは最大100文字です',
                'destination_zipcode.required' => '郵便番号を入力してください。',
                'destination_zipcode.min' => '郵便番は7文字です',
                'destination_zipcode.max' => '郵便番は最大7文字です',
                'destination_prefectures.required' => '都道府県を入力してください。',
                'destination_prefectures.max' => '都道府県は最大100文字です',
                'destination_municipalities.required' => '市区町村を入力してください。',
                'destination_municipalities.max' => '市区町村は最大100文字です',
                'destination_address_line1.required' => '番地を入力してください。',
                'destination_address_line1.max' => '番地は最大100文字です',
                // 'destination_address_line2.required' => '建物名を入力してください。',
                // 'destination_address_line2.max' => 'お名前は最大100文字です',
                'destination_tell.required' => '電話番号を入力してください。',
                'destination_tell.max' => '電話番号は最大15文字です',
            ]
        );

        $order = new Order;

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
        $delivery_date = $request->input('delivery_date');
        $delivery_time = $request->input('delivery_time');
        $time = $delivery_date .  ' ' . $delivery_time;
        $order->delivery_time = $time;

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $order->total_price = $cart->total_price;


        $order->payment_method = $request->input('payment_method');

        $order->save();

        //return redirect()->route('order.complete');
    }

    private function saveOrderItems()
    {

        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        $item = Item::all();
        $order = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem;

            $orderItem->item_id =  $cartItem->item_id;
            $orderItem->order_id = $order->id;
            $orderItem->quantity =  $cartItem->quantity;
            $orderItem->size =  $cartItem->size;



            if ($cartItem->size === 'M') {
                $orderItem->order_price = $cartItem->order_price;
            } else {
                $orderItem->order_price = $cartItem->order_price;
            }

            $orderItem->order_name = $cartItem->item->name;
            $orderItem->save();
        }

        $cartToppings = CartTopping::where('user_id', Auth::user()->id)->get(); //cartitemと紐付け？でも誰のカートかわかる？
        $topping = Topping::all();

        foreach ($cartToppings as $cartTopping) {
            $orderTopping = new OrderTopping;

            $orderTopping->topping_id =  $cartTopping->topping_id;
            $orderTopping->order_item_id =  $cartTopping->cart_item_id;

            $orderTopping->order_topping_name =  $cartTopping->topping->name;

            if ($cartItem->size === 'M') {
                $orderTopping->order_topping_price = $cartTopping->total_topping_price;
            } else {
                $orderTopping->order_topping_price = $cartTopping->total_topping_price;;
            }

            //カートの中身とセッション情報の削除
            CartTopping::where('user_id', Auth::user()->id)->delete();
            CartItem::where('user_id', Auth::user()->id)->delete();
            Cart::where('user_id', Auth::user()->id)->delete();

            session()->forget('cart');

            $orderTopping->save();
        }
    }

    public function deleteCart()
    {
    }

    public function showOrderComplete()
    {
        return view('order.order_complete');
    }
}
