<?php

namespace App\Http\Controllers;


use App\Http\Requests\Order\BuyRequest;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Models\Topping;
use App\Models\CartItem;
use App\Models\OrderItem;
use App\Models\CartTopping;
use App\Models\OrderTopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\BaseController;
use App\Models\Coupon;
use App\Models\UserCoupon;
use App\Models\User;


class OrderController extends BaseController
{

    public function buyOrderItems()
    {
        $request = BuyRequest::capture();
        $this->saveDeliveryInformation($request);
        $this->saveOrderItems();

        // $this->deleteCart();
        // $this->makeCoupon();
        $this->firstMakeCoupon();

        return view('order.order_complete');
    }

    public function showDeliveryForm()
    {
        $cartItems = $this->getCartItems();
        $items = [
            'items' => $cartItems['items'],
            'toppings' => $cartItems['toppings'],
            'total_price' => $cartItems['total_price'],
            'tax' => $cartItems['tax'],
        ];
        // ログインユーザーのUserレコードを取得
        // dd(Auth::id());
        $user = User::where('id', Auth::id())->first();

        // dd($user);

        // Userレコードが存在すれば、お届け先入力フォームに渡すデータを作成
        if ($user) {
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'zipcode' => $user->zipcode,
                'prefecture' => $user->prefecture,
                'municipalities' => $user->municipalities,
                'address_line1' => $user->address_line1,
                'address_line2' => $user->address_line2,
                'telephone' => $user->telephone,
            ];
        } else {
            $data = [
                'zipcode' => '',
                'prefecture' => '',
                'municipalities' => '',
                'address_line1' => '',
                'address_line2' => '',
                'telephone' => '',
            ];
        }
        //

        // // else {
        // //     $data = null;
        // // }


        // dd($data);
        return view('order.order_confirm')->with('items', $items)->with('data', $data);

        //この$itemsがないとボタンを押した時にエラーになるため、呼び出し、値の受け渡しはできている
        //$itemsは渡せるのに＄dataは渡せない
    }

    public function firstMakeCoupon()
    {
        $coupon = Coupon::first(); //今は一つしかないため
        $user_id = Auth::id();

        //クーポンを持っているユーザの取得
        $userCoupon = UserCoupon::where('user_id', Auth::user()->id)->first();

        // 初回クーポンの付与
        if ($userCoupon === null) {
            $userCoupon = new UserCoupon([
                'user_id' => $user_id,
            ]);
            $userCoupon->coupon_id = $coupon->id; //クーポンが一種類のみ対応

            $userCoupon->save();
        }


        //使用処理
        // else {
        //     $cart = Cart::where('user_id', Auth::user()->id)->first();
        //     $cart->total_price = ($cart->total_price * 0.9);

        //     //クーポンの削除
        //     UserCoupon::where('user_id', Auth::user()->id)->delete();

        //     return redirect(route('order.confirm', $cart)); //全部渡さないといけない？
        // }
    }

    // public function secondMakeCoupon()
    // {
    //     $userCoupon = UserCoupon::where('user_id', Auth::user()->id)->first();
    //     if ($userCoupon->coupon_id === 1) {
    //         $userCoupon = new UserCoupon([
    //             'user_id' => $user_id,
    //         ]);
    //     }
    // }

    // public function makeCoupon()
    // {
    //     $coupon = Coupon::all();
    //     $user_id = Auth::id();


    //     // ユーザーが既にクーポンを持っているかどうかを確認する
    //     $userCoupon = UserCoupon::where('user_id', Auth::user()->id)->first();

    //     //持ってる人の場合

    //     //持っていない人の場合
    //     if ($userCoupon === null) {
    //         $userCoupon = new UserCoupon([
    //             'user_id' => $user_id,
    //             'coupon_id' => '1',
    //         ]);
    //         $userCoupon->save();

    //     }
    // }


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

        //注文完了メールを送信する処理を追加

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
        // //OrderToppingの価格をDBに格納する処理
        // foreach ($cartItems as $cartItem) {
        //     if ($cartItem->size === 'M') {

        //         $orderTopping->order_topping_price = $topping->price_m;
        //     } else {
        //         $orderTopping->order_topping_price = $topping->price_l;
        //     }
        //     $orderTopping->save();
        // }
        $this->couponMailSend($order);
    }

    public function showOrderComplete()
    {
        return view('order.order_complete');
    }

    private function  couponMailSend($order)
    {

        //クーポンを保存するメソッド
        //注文完了メールを送信する処理

        $orderItems = DB::table('order_items')->where('order_id', $order->id)->get();
        $contactsController = new ContactsController();
        $contactsController->sendOrderConfirmMail($order, $orderItems);
    }


    public function couponAdaptation(Request $request)
    {
        //利用可能なクーポンと現在のカート内の商品の合計金額を取得
        $availableCoupons = DB::table('user_coupons')->where('user_id', Auth::user()->id)->first();
        $totalPrice = DB::table('carts')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first()->total_price;

        //利用可能なクーポンが存在するか否かで分岐
        if ($availableCoupons) {

            $couponId = $availableCoupons->coupon_id;
            $couponCode = DB::table('coupons')->where('id', $couponId)->first()->code;
            $inputCouponCode = $request->input('coupon_code');
            //クーポンコードが正しいか否かで分岐
            if ($couponCode == $inputCouponCode) {

                $usedTimes = DB::table('user_coupons')->where('user_id', Auth::user()->id)->first()->count;
                //利用回数の上限を超えていないかで分岐
                if ($usedTimes == 0) {

                    //クーポン適応処理
                    $discountRate = DB::table('coupons')->where('id', $couponId)->first()->discount_rate;
                    $discountRate = (int)$discountRate;
                    $discountPrice = $totalPrice * ($discountRate*0.01);
                    $discountPrice = (int)$discountPrice;
                    $totalPrice = $totalPrice - $discountPrice;

                    // $currentTotalPrice= DB::table('carts')->where('user_id', Auth::user()->id)->orderBy('id','desc')->first();

                    $userId = Auth::id();
                    Cart::where('user_id', $userId)->update([
                        'total_price' => $totalPrice,
                    ]);

                    $usedTimes += 1;
                    UserCoupon::where('user_id', $userId)->where('coupon_id', $couponId)->update([
                        'count' => $usedTimes,
                    ]);

                    $discountMessage =  (string)$discountPrice ;
                    return view('order.coupon-only')->with([
                        'totalPrice' =>$totalPrice,
                        'message' => '20%引きクーポンが適応されました！',
                        'discountMessage' => $discountMessage,
                    ]);
                } else {
                    return view('order.coupon-only')->with([
                        'totalPrice' => $totalPrice,
                        'message' => 'クーポンの利用回数が上限を超えています。',
                    ]);
                }
            } else {

                return view('order.coupon-only')->with([
                    'totalPrice' => $totalPrice,
                    'message' => 'クーポコードが違います！',]);
            }
        } else {

            return view('order.coupon-only')->with([
                'totalPrice'=>$totalPrice,
                'message'=> '適応可能なクーポンが存在しません',
                ]);
        }
    }


    public function couponOnly()
    {
        $totalPrice = DB::table('carts')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first()->total_price;
        return view("order.coupon-only")->with('totalPrice', $totalPrice);
    }
}
                    
                    // public function deleteCart()
                    // {
                        // }
                        
                        // public function showOrderComplete()
                        // {
                            //     return view('order.order_complete');
                            // }
