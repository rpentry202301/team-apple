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
     * 合計金額を計算するメソッド
     * 
     */
    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item->getPrice() * $item->getQuantity();
        }
        return $totalPrice;
    }

    /**
     * 消費税を計算するメソッド
     *
     * @return tax 消費税
     */
    public function calculateTax($taxRate)
    {
        $price = $this->getTotalPrice();
        $tax = $price * $taxRate;
        return $tax;
    }

    
}
