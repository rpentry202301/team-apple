<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SecondaryCategory;
use Illuminate\Support\Facades\DB;

class SecondaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secondary_categories')->insert([
            [
                'id'                  => 1,
                'name'                => '洋風系',
                'sort_no'             => 1,
                'primary_category_id' => 1,
            ],
            [
                'id'                  => 2,
                'name'                => '和風系',
                'sort_no'             => 2,
                'primary_category_id' => 1,
            ],
            [
                'id'                  => 3,
                'name'                => 'スイーツ系',
                'sort_no'             => 3,
                'primary_category_id' => 1,
            ],
            [
                'id'                  => 4,
                'name'                => 'ポテト',
                'sort_no'             => 4,
                'primary_category_id' => 2,
            ],
            [
                'id'                  => 5,
                'name'                => 'ナゲット',
                'sort_no'             => 5,
                'primary_category_id' => 2,
            ],
            [
                'id'                  => 6,
                'name'                => 'ホットドリンク',
                'sort_no'             => 6,
                'primary_category_id' => 3,
            ],
            [
                'id'                  => 7,
                'name'                => 'コールドドリンク',
                'sort_no'             => 7,
                'primary_category_id' => 3,
            ],
            [
                'id'                  => 8,
                'name'                => 'フルーツ',
                'sort_no'             => 8,
                'primary_category_id' => 4,
            ],
            [
                'id'                  => 9,
                'name'                => 'スイーツ',
                'sort_no'             => 9,
                'primary_category_id' => 4,
            ],
        ]);
    }
}
