<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langs = [
            ['user_id' => 1, 'locale' => 'en'],
            ['user_id' => 1, 'locale' => 'ru'],
            ['user_id' => 1, 'locale' => 'uz'],
            ['user_id' => 1, 'locale' => 'fr'],
        ];

        foreach ($langs as $lang) {
            DB::table('langs')->insert([
                'user_id'   => $lang['user_id'],
                'locale'    => $lang['locale'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
