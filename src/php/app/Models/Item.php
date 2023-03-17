<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Topping;
use App\Models\SecondaryCategory;

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

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function secondaryCategory()
    {
        return $this->belongsTo(SecondaryCategory::class);
    }
}
