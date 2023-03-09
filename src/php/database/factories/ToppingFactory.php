<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topping>
 */
class ToppingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            [
                'name' => 'ベーコン',
                'price_m' => 300,
                'price_l' => 400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'チーズ',
                'price_m' => 300,
                'price_l' => 400,
                'createat' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'トマト',
                'price_m' => 300,
                'price_l' => 400,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
}
