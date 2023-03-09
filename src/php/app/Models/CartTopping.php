<?php

namespace App\Models;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartTopping extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'topping_id',
        'topping_name',
        'item_id',
        'size',
        'quantity',
        'size_m',
        'size_l',
    ];

    public function cartItem()
    {
        return $this->belongsTo(CartItem::class);
    }

    public function topping()
    {
        return $this->belongsTo(Topping::class);
    }
}
