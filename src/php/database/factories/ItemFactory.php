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
        $random_image_number = rand(1, 18);
        $image_path = $random_image_number . '.jpg';

        return [
            'name' => $this->faker->unique()->randomElement([
                'マルゲリータピザ', 'ペパロニピザ', 'ハワイアンピザ', 'ミートラバーズピザ', 'スーパーデラックスピザ'
            ]),
            'description' => $this->faker->unique()->randomElement([
                'トマトソースにたっぷりのチーズが乗ったピザです。',
                'マルゲリータはシンプルで美味しいピザです。',
                '生ハムがたっぷりのピザです。',
                '野菜たっぷりのヘルシーなピザです。',
                'チーズがたっぷりの濃厚なピザです。',
                'ハワイアンピザはハムとパイナップルの相性抜群です。',
                'ペパロニがたっぷりのアメリカンスタイルのピザです。',
                'シーフードがたっぷりの贅沢なピザです。',
                'チーズにサラミがたっぷりのピザです。',
                'キノコたっぷりのベジタリアンピザです。',
            ]),
            'price_m' => 1380,
            'price_l' => 2380,
            'image_path' => $image_path,
            'deleted' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
