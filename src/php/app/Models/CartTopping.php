<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartTopping extends Model
{
    use HasFactory;

    public function toppings()
    {
        return $this->hasMany(Topping::class);
    }
}
