<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topping;
use Illuminate\Support\Facades\DB;


class ToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('toppings')->insert([
            [
                'name' => 'Topping A',
                'price_m' => 100,
                'price_l' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Topping B',
                'price_m' => 120,
                'price_l' => 170,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Topping C',
                'price_m' => 150,
                'price_l' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
