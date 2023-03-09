<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Topping;

class Item extends Model
{
    use HasFactory;

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function toppings()
    {
        return $this->hasMany(Topping::class);
    }

    public function cartItems()
    {
      return $this->hasMany(CartItem::class);
    }
}
