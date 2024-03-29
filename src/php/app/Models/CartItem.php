<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\CartTopping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
            'item_id',
            'cart_id',
            'size',
            'quantity',
            'order_price',
    ];

    public function cartToppings()
    {
        return $this->hasMany(CartTopping::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function cart()
    {
      return $this->belongsTo(Cart::class);
    }
}
