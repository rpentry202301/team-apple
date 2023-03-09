<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'ラクスピザ太郎',
            'email' => 'pizapple@gmail.com',
            'password' => \Hash::make('pizapple'),
            'zipcode' => '160-0022',
            'prefecture' => '東京都',
            'municipalities' => '新宿区',
            'address_line1' => '新宿４丁目３−２５',
            'address_line2' => 'TOKYU REIT新宿ビル8F',
            'telephone' => 03 - 6675 - 3638,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
