<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'user_id' => 1,
                'video_url' => 'http://localhost',
                'slug' => Str::slug('Technology Trends 2024'),
            ],
            [
                'user_id' => 2,
                'video_url' => 'http://localhost',
                'slug' => Str::slug('The Future of AI'),
            ],
        ];

        foreach ($blogs as $blog) {
            $blog['created_at'] = now();
            $blog['updated_at'] = now();
            $blogId = DB::table('blogs')->insertGetId($blog);

            $translations = [
                [
                    'blog_id' => $blogId,
                    'locale' => 'uz',
                    'name' => $blog['slug'] === 'technology-trends-2024' ? 'Texnologiya Trendlari 2024' : 'AI Kelajagi',
                    'description' => $blog['slug'] === 'technology-trends-2024'
                        ? '2024-yilda texnologiya qanday rivojlanadi?'
                        : 'Sun’iy intellektning kelajagi qanday bo‘ladi?',
                ],
                [
                    'blog_id' => $blogId,
                    'locale' => 'ru',
                    'name' => $blog['slug'] === 'technology-trends-2024' ? 'Технологические тренды 2024' : 'Будущее ИИ',
                    'description' => $blog['slug'] === 'technology-trends-2024'
                        ? 'Как технологии будут развиваться в 2024 году?'
                        : 'Каково будущее искусственного интеллекта?',
                ],
            ];

            foreach ($translations as $translation) {
                $translation['created_at'] = now();
                $translation['updated_at'] = now();
                DB::table('blog_translations')->insert($translation);
            }
        }
    }
}
