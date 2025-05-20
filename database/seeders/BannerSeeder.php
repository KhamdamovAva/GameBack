<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Attachment;
use App\Models\Banners\Banner;
use Illuminate\Database\Seeder;
use App\Models\Banners\BannerTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            $this->command->warn('No users found. Please create a user first.');
            return;
        }

        $banners = [
            [
                'url' => 'https://example.com/banner1',
                'image' => 'banner.jpg',
                'name' => 'NVIDIA RTX SUPER',
                'description' => 'Новые игровые видеокарты NVIDIA GeForce RTX 4070 Super 4070 Ti и 4080 доступны к заказу!',
            ],
            [
                'url' => 'https://example.com/banner2',
                'image' => 'banner.jpg',
                'name' => 'Gaming PC',
                'description' => 'Собери свой мощный игровой компьютер с лучшими комплектующими!',
            ]
        ];

        foreach ($banners as $data) {
            $banner = Banner::create([
                'user_id' => $user->id,
                'url' => $data['url'],
            ]);

            $translations = [
                'ru' => ['name' => $data['name'], 'description' => $data['description']],
                'en' => ['name' => $this->translateToUzbek($data['name']), 'description' => $this->translateToUzbek($data['description'])],
            ];

            foreach ($translations as $locale => $translated) {
                BannerTranslation::create([
                    'banner_id' => $banner->id,
                    'locale' => $locale,
                    'name' => $translated['name'],
                    'description' => $translated['description'],
                ]);
            }

            Attachment::create([
                'attachment_id' => $banner->id,
                'attachment_type' => Banner::class,
                'size' => 0,
                'path' => $data['image'],
            ]);
        }
    }

    private function translateToUzbek(string $text): string
    {
        return match ($text) {
            'Новые игровые видеокарты NVIDIA GeForce RTX 4070 Super 4070 Ti и 4080 доступны к заказу!' =>
                'Yangi NVIDIA GeForce RTX 4070 Super 4070 Ti va 4080 oʻyin video kartalariga buyurtma berish mumkin!',
            'Собери свой мощный игровой компьютер с лучшими комплектующими!' =>
                'Eng yaxshi komponentlar bilan kuchli oʻyin kompyuteringizni yarating!',
            'NVIDIA RTX SUPER' => 'NVIDIA RTX SUPER',
            'Gaming PC' => 'Gaming PC',
            default => $text,
        };
    }
}
