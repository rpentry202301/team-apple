<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'じゃがバターベーコン',
            'description' => 'This is Item A',
            'price_m' => 1380,
            'price_l' => 2380,
            'image_path' => '1.jpg',
            'deleted' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
