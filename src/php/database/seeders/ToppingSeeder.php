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
                'price_m' => 200,
                'price_l' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Topping B',
                'price_m' => 200,
                'price_l' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Topping C',
                'price_m' => 200,
                'price_l' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
