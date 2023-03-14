<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    protected $fillable = ['user_id', 'coupon_code', 'expiration_date'];

    use HasFactory;
    // UserCouponモデルとCouponモデルを関連付ける
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    // UserCouponモデルとUserモデルを関連付ける
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
