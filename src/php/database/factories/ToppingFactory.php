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
            'name' => $this->faker->unique()->randomElement([
                'チーズ', 'トマト', 'ベーコン', 'ピーマン', 'コーン'
            ]),
            'price_m' => 300,
            'price_l' => 400,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
