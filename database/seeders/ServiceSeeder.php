<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'user_id' => 1,
                'slug' => Str::slug('Computer Repair'),
            ],
            [
                'user_id' => 2,
                'slug' => Str::slug('Software Installation'),
            ],
        ];

        foreach ($services as $service) {
            $service['created_at'] = now();
            $service['updated_at'] = now();
            $serviceId = DB::table('services')->insertGetId($service);

            $translations = [
                [
                    'service_id' => $serviceId,
                    'locale' => 'uz',
                    'name' => $service['slug'] === 'computer-repair' ? 'Kompyuter Ta’mirlash' : 'Dastur O‘rnatish',
                    'type' => $service['slug'] === 'computer-repair' ? 'Texnik xizmat' : 'Dasturiy ta’minot',
                    'status' => 'Faol',
                    'description' => $service['slug'] === 'computer-repair'
                        ? 'Biz kompyuteringizdagi nosozliklarni tez va sifatli tuzatamiz.'
                        : 'Operatsion tizim va dasturlarni professional o‘rnatamiz.',
                    'services' => $service['slug'] === 'computer-repair'
                        ? 'Diagnostika, Xotira tozalash, Qurilma almashtirish'
                        : 'Windows, MacOS, Linux o‘rnatish, Dastur sozlash',
                ],
                [
                    'service_id' => $serviceId,
                    'locale' => 'ru',
                    'name' => $service['slug'] === 'computer-repair' ? 'Ремонт компьютеров' : 'Установка программ',
                    'type' => $service['slug'] === 'computer-repair' ? 'Техническое обслуживание' : 'Программное обеспечение',
                    'status' => 'Активный',
                    'description' => $service['slug'] === 'computer-repair'
                        ? 'Мы быстро и качественно устраним неполадки вашего компьютера.'
                        : 'Профессиональная установка операционных систем и программ.',
                    'services' => $service['slug'] === 'computer-repair'
                        ? 'Диагностика, Очистка памяти, Замена устройств'
                        : 'Установка Windows, MacOS, Linux, Настройка программ',
                ],
            ];

            foreach ($translations as $translation) {
                $translation['created_at'] = now();
                $translation['updated_at'] = now();
                DB::table('service_translations')->insert($translation);
            }
        }
    }
}
