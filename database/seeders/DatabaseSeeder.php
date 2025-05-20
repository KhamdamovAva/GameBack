<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AttributeSeeder::class,
            BannerSeeder::class,
            BrandSeeder::class,
            DeliveryMethodSeeder::class,
            DesktopTypeSeeder::class,
            LanguageSeeder::class,
            ProductTypeSeeder::class,
            StatusSeeder::class,
            CategorySeeder::class,
            ReviewSeeder::class,
            BlogSeeder::class,
            CurrencySeeder::class,
            ServiceSeeder::class,
            DesktopSeeder::class,
            ProductSeeder::class,
            GameSeeder::class,
            DesktopFpsSeeder::class
        ]);
    }
}
