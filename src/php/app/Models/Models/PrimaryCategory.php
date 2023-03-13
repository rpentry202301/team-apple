<?php

namespace App\Models\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Models\SecondaryCategory;
use Illuminate\Database\Eloquent\Model;

class PrimaryCategory extends Model
{
    public function secondaryCategories()
    {
        return $this->hasMany(SecondaryCategory::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
