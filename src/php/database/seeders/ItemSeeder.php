<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::factory()->create([
            'name' => 'じゃがバターベーコン',
            'description' => 'This is Item A',
            'price_m' => 1380,
            'price_l' => 2380,
            'image_path' => '1.jpg',
            'deleted' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
