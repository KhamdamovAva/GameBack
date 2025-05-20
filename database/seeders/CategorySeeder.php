<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'slug' => 'laptops', 'user_id' => 1],
            ['id' => 2, 'slug' => 'monitor', 'user_id' => 1],
        ];
        DB::table('categories')->insert($categories);
        $translations = [
            ['category_id' => 1, 'locale' => 'uz', 'name' => 'Noutbuklar'],
            ['category_id' => 1, 'locale' => 'ru', 'name' => 'Ноутбуки'],

            ['category_id' => 2, 'locale' => 'uz', 'name' => 'Monitorlar'],
            ['category_id' => 2, 'locale' => 'ru', 'name' => 'Монитори'],
        ];

        DB::table('category_translations')->insert($translations);
    }
}
