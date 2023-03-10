<?php

namespace App\Models;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $items = [];
    protected $totalPrice = 0;

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * 合計金額を計算する
     *
     * @param $items カート内商品
     * @param $toppings カート内トッピング
     * @return $total_price 合計金額
     */
    public static function calculateTotalPrice($items, $toppings)
    {
        $total_price = 0; // 合計金額
        $tax = 0; // 消費税

        // カートに追加する商品の金額を計算する処理
        foreach ($items as $item) {
            if ($item->order_price == 1380) {
                $total_price += $item->item->price_m * $item->quantity;
            } else {
                // dd($item);
                $total_price += $item->item->price_l * $item->quantity;
            }
        }

        // カートに追加する商品のトッピングの金額を計算する処理
        if (count($items) != 0) {
            foreach ($toppings as $topping) {
                if ($topping->total_topping_price == 300) {
                    $total_price += 300;
                } else {
                    $total_price += 400;
                }
            }
        }

        $total_price = $total_price;
        return $total_price;
    }

    /**
     * 消費税を計算する
     *
     * @param $total_price 合計金額
     * @return $tax 消費税
     */
    public static function calculateTax($total_price)
    {
        $tax = $total_price * 0.1;

        return $tax;
    }

    /**
     * 注文商品の合計金額を計算する
     *
     * @return totalPrice 合計金額
     */
    public function total_price()
    {
        $order_price = 0;
        foreach ($this->items as $item) {
            $order_price += $item['order_price'];
        }

        $total_topping_price = 0;
        foreach ($this->item->toppings as $topping) {
            $total_topping_price += $topping['total_topping_price'];
        }

        $this->totalPrice = $order_price + $total_topping_price;
    }
}
