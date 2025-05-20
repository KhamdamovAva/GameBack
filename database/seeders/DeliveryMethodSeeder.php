<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = 1;

        $deliveryMethods = [
            [
                'slug' => 'standard-shipping',
                'price' => 5000,
                'estimated_delivery_time' => 5,
                'translations' => [
                    'en' => 'Standard Shipping',
                    'ru' => 'Стандартная доставка',
                    'uz' => 'Standart yetkazib berish',
                ],
            ],
            [
                'slug' => 'express-shipping',
                'price' => 10000,
                'estimated_delivery_time' => 2,
                'translations' => [
                    'en' => 'Express Shipping',
                    'ru' => 'Экспресс доставка',
                    'uz' => 'Tezkor yetkazib berish',
                ],
            ],
            [
                'slug' => 'pickup',
                'price' => 0,
                'estimated_delivery_time' => 1,
                'translations' => [
                    'en' => 'Pickup',
                    'ru' => 'Самовывоз',
                    'uz' => 'Olib ketish',
                ],
            ],
        ];

        foreach ($deliveryMethods as $method) {
            $methodId = DB::table('delivery_methods')->insertGetId([
                'user_id' => $userId,
                'slug' => $method['slug'],
                'price' => $method['price'],
                'estimated_delivery_time' => $method['estimated_delivery_time'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($method['translations'] as $locale => $name) {
                DB::table('delivery_method_translations')->insert([
                    'delivery_method_id' => $methodId,
                    'locale' => $locale,
                    'name' => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
