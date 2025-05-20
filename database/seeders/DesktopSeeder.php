<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DesktopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desktops = [
            [
                'user_id' => 1,
                'type' => 'Gaming PC',
                'discount' => 10,
                'slug' => Str::slug('Gaming PC'),
                'desktop_type_id' => 1,
                'price' => 1500,
            ],
            [
                'user_id' => 2,
                'type' => 'Workstation',
                'discount' => 5,
                'slug' => Str::slug('Workstation'),
                'desktop_type_id' => 2,
                'price' => 2000,
            ],
        ];

        foreach ($desktops as $desktop) {
            $desktop['created_at'] = now();
            $desktop['updated_at'] = now();
            $desktopId = DB::table('desktops')->insertGetId($desktop);

            $translations = [
                [
                    'desktop_id' => $desktopId,
                    'locale' => 'uz',
                    'name' => $desktop['type'] === 'Gaming PC' ? 'Oʻyin kompyuteri' : 'Ish stansiyasi',
                    'description' => $desktop['type'] === 'Gaming PC'
                        ? 'Yuqori unumdorlikka ega oʻyin kompyuteri.'
                        : 'Professional ish uchun kuchli kompyuter.',
                ],
                [
                    'desktop_id' => $desktopId,
                    'locale' => 'ru',
                    'name' => $desktop['type'] === 'Gaming PC' ? 'Игровой ПК' : 'Рабочая станция',
                    'description' => $desktop['type'] === 'Gaming PC'
                        ? 'Высокопроизводительный компьютер для игр.'
                        : 'Мощный компьютер для профессиональной работы.',
                ],
            ];

            foreach ($translations as $translation) {
                $translation['created_at'] = now();
                $translation['updated_at'] = now();
                DB::table('desktop_translations')->insert($translation);
            }
        }
    }
}
