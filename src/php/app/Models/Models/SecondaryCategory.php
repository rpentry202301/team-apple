<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryCategory extends Model
{
    public function primaryCategory()
    {
        return $this->belongsTo(PrimaryCategory::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

}
