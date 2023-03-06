<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topping;
use App\Models\OrderItem;

class OrderTopping extends Model
{
    use HasFactory;

    public function topping()
    {
        return $this->belongsTo(Topping::class);
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
