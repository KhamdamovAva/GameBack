<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'user_id' => 1,
                'slug' => Str::slug('Dilshoda Qambarova'),
                'fullname' => 'Dilshoda Qambarova',
            ],
            [
                'user_id' => 1,
                'slug' => Str::slug('Bekzod Karimov'),
                'fullname' => 'Bekzod Karimov',
            ],
        ];

        foreach ($reviews as $review) {
            $review['created_at'] = now();
            $review['updated_at'] = now();
            $reviewId = DB::table('reviews')->insertGetId($review);

            // Review tarjimalari (uz va ru tillarida)
            $translations = [
                [
                    'review_id' => $reviewId,
                    'locale' => 'uz',
                    'comment' => $review['fullname'] === 'Dilshoda Qambarova'
                        ? 'Xizmat juda zo‘r, men juda mamnunman!'
                        : 'Ajoyib tajriba, tavsiya qilaman!',
                    'profession' => $review['fullname'] === 'Dilshoda Qambarova'
                        ? 'Backend dasturchi'
                        : 'Grafik dizayner',
                ],
                [
                    'review_id' => $reviewId,
                    'locale' => 'ru',
                    'comment' => $review['fullname'] === 'Dilshoda Qambarova'
                        ? 'Отличный сервис, я очень доволен!'
                        : 'Прекрасный опыт, рекомендую!',
                    'profession' => $review['fullname'] === 'Dilshoda Qambarova'
                        ? 'Backend-разработчик'
                        : 'Графический дизайнер',
                ],
            ];

            foreach ($translations as $translation) {
                $translation['created_at'] = now();
                $translation['updated_at'] = now();
                DB::table('review_translations')->insert($translation);
            }
        }
    }
}
