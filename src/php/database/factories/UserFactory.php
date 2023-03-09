<?php

namespace Database\Factories;

use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'ラクスピザ太郎',
            'email' => 'pizapple@gmail.com',
            'password' => \Hash::make('pizapple'),            'password' => /*Hash::make*/ 'pizapple',
            'zipcode' => '160-0022',
            'prefecture' => '東京都',
            'municipalities' => '新宿区',
            'address_line1' => '新宿４丁目３−２５',
            'address_line2' => 'TOKYU REIT新宿ビル8F',
            'telephone' => '03-6675-3638',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
