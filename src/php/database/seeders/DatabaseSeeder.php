<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PrimaryCategorySeeder::class);
        $this->call(SecondaryCategorySeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ToppingSeeder::class);
        $this->call(UserSeeder::class);
    }
}
