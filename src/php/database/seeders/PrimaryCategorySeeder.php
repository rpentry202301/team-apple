<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PrimaryCategory;
use Illuminate\Support\Facades\DB;

class PrimaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
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
        ]);
    }
}
