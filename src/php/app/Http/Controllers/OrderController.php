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

class OrderController extends Controller
{

    public function showOrderConfirm()
    {
        return view('order.order_confirm');
    }

    public function buyOrderItems()
    {
        $request = BuyRequest::capture();
        $this->saveDeliveryInformation($request);
        $this->saveOrderItems();

        return view('order.order_complete');
    }

    private function saveDeliveryInformation(BuyRequest $request)
    {
        $order = new Order;

        //ログインしたユーザIDが必要なため動作未確認の
        $user_id = Auth::id();
        $order->user_id = $user_id;
        
        $delivery_date = $request->input('delivery_date');
        $delivery_time = $request->input('delivery_time');
        $time = $delivery_date .  ' ' . $delivery_time;

        $order->destination_name = $request->input('destination_name');
        $order->destination_email = $request->input('destination_email');
        $order->destination_zipcode = $request->input('destination_zipcode');
        $order->destination_prefectures = $request->input('destination_prefectures');
        $order->destination_municipalities = $request->input('destination_municipalities');
        $order->destination_address_line1 = $request->input('destination_address_line1');
        $order->destination_address_line2 = $request->input('destination_address_line2');
        $order->destination_tell = $request->input('destination_tell');
        $order->delivery_time = $time;

        $cart = Cart::table('user_id', Auth::user()->id)->first();

        $order->payment_method = $request->input('payment_method');

        $order->save();

        //return redirect()->route('order.complete');
    }

    private function saveOrderItems()
    {

        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        $item = Item::all();
        $order = new Order();

        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem;
            

            //Itemテーブルを経由しなくていける？
            $orderItem->item_id =  $cartItem->item_id;
            // $orderItem->order_id = ;
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


        $cartToppings = CartTopping::where('cart_item_id', $cartItems->item_id)->get(); //cartitemと紐付け？でも誰のカートかわかる？
        $topping = Topping::all();
        //$cartItems = CartItem::where('user_id', Auth::user()->id)->get();


        foreach ($cartToppings as $cartTopping) {
            $orderTopping = new OrderTopping;

            //Itemテーブルを経由しなくていける？
            $orderTopping->topping_id =  $cartTopping->topping_id;
            $orderTopping->order_item_id =  $cartTopping->cart_item_id;
            $orderTopping->order_topping_name =  $topping->name;

            if ($cartItem->size === 'M') {
                $order->order_price = $item->price_m;
            } else {
                $order->order_price = $item->price_l;
            }
            $orderTopping->save();
        }
        //OrderToppingの価格をDBに格納する処理
        foreach ($cartItems as $cartItem) {
            if ($cartItem->size === 'M') {

                $orderTopping->order_topping_price = $topping->price_m;
            } else {
                $orderTopping->order_topping_price = $topping->price_l;
            }
            $orderTopping->save();
        }
    }

    public function showOrderComplete()
    {
        return view('order.order_complete');
    }
}