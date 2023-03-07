<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'destination_name',
        'destination_email',
        'destination_zipcode',
        'destination_prefectures',
        'destination_municipalities',
        'destination_address_line1',
        'destination_address_line2',
        'destination_tell',
        'delivery_time',
        'payment_method'
    ];
}
