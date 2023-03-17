<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models\PrimaryCategory>
 */
class PrimaryCategoryFactory extends Factory
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
                'id'      => 1,
                'name'    => '和風',
                'sort_no' => 1
            ],
            [
                'id'      => 2,
                'name'    => '洋風',
                'sort_no' => 2,
            ],
            [
                'id'      => 3,
                'name'    => 'スペシャル4',
                'sort_no' => 3,
            ],
            [
                'id'      => 4,
                'name'    => 'その他',
                'sort_no' => 4,
            ],
        ];
    }
}
