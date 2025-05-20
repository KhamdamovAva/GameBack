<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
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
        $brands = [
            'Apple',
            'Samsung',
            'Sony',
            'Xiaomi',
            'LG',
            'Dell',
            'HP',
        ];
        foreach ($brands as $brand) {
            Brand::create([
                'user_id' => $user->id,
                'name' => $brand,
                'slug' => Str::slug($brand),
            ]);
        }
    }
}
