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
                'name'                => 'ミート',
                'sort_no'             => 1,
                'primary_category_id' => 1,
            ],
            [
                'id'                  => 2,
                'name'                => 'シーフード',
                'sort_no'             => 2,
                'primary_category_id' => 1,
            ],
            [
                'id'                  => 3,
                'name'                => 'チーズ',
                'sort_no'             => 3,
                'primary_category_id' => 1,
            ],
            [
                'id'                  => 4,
                'name'                => 'トマト',
                'sort_no'             => 4,
                'primary_category_id' => 2,
            ],
            [
                'id'                  => 5,
                'name'                => '変わり種',
                'sort_no'             => 5,
                'primary_category_id' => 2,
            ],
            [
                'id'                  => 6,
                'name'                => 'スペシャル',
                'sort_no'             => 6,
                'primary_category_id' => 3,
            ],
        ]);
    }
}
