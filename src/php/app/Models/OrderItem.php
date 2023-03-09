<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\OrderTopping;

class OrderItem extends Model
{
    use HasFactory;



    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function orderToppings()
    {
        return $this->hasMany(OrderTopping::class);
    }
}
