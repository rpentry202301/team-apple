<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderTopping;

class Topping extends Model
{
    use HasFactory;

    public function orderToppings()
    {
        return $this->hasMany(OrderTopping::class);
    }
}
