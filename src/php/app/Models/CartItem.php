<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartTopping;

class CartItem extends Model
{
    use HasFactory;

    public function cartTopppings()
    {
        return $this->hasMany(OrderTopping::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
