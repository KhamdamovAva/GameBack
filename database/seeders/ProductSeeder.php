<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'user_id' => 1,
                'brand_id' => 1,
                'category_id' => 1,
                'slug' => Str::slug('Gaming Mouse'),
                'price' => 99.99,
                'discount' => 10.00,
                'type' => 'Mouse',
            ],
            [
                'user_id' => 2,
                'brand_id' => 2,
                'category_id' => 2,
                'slug' => Str::slug('Mechanical Keyboard'),
                'price' => 150.50,
                'discount' => 5.50,
                'type' => 'Keyboard',
            ],
        ];

        foreach ($products as $product) {
            $product['created_at'] = now();
            $product['updated_at'] = now();
            $productId = DB::table('products')->insertGetId($product);

            $translations = [
                [
                    'product_id' => $productId,
                    'locale' => 'uz',
                    'name' => $product['type'] === 'Mouse' ? 'Oʻyin sichqonchasi' : 'Mexanik klaviatura',
                    'description' => $product['type'] === 'Mouse'
                        ? 'Tezkor harakatlar uchun moʻljallangan oʻyin sichqonchasi.'
                        : 'Yuqori sifatli mexanik klaviatura, oson bosish imkoniyati bilan.',
                ],
                [
                    'product_id' => $productId,
                    'locale' => 'ru',
                    'name' => $product['type'] === 'Mouse' ? 'Игровая мышь' : 'Механическая клавиатура',
                    'description' => $product['type'] === 'Mouse'
                        ? 'Игровая мышь, предназначенная для быстрых движений.'
                        : 'Качественная механическая клавиатура с легким нажатием.',
                ],
            ];

            foreach ($translations as $translation) {
                $translation['created_at'] = now();
                $translation['updated_at'] = now();
                DB::table('product_translations')->insert($translation);
            }
        }
    }
}
