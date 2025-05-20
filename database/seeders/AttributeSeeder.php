<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Attributes\Attribute;
use App\Models\Attributes\AttributeTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttributeSeeder extends Seeder
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
        $attributes = [
            'color' => 'red',
            'size' => 'large',
            'material' => 'cotton'
        ];
        foreach ($attributes as $name => $value) {
            $attribute = Attribute::create([
                'user_id' => $user->id,
                'slug' => Str::slug($name),
                'value' => $value,
            ]);

            $translations = [
                'en' => ucfirst($name),
                'ru' => $this->translateToRussian($name),
                'uz' => $this->translateToUzbek($name),
            ];

            foreach ($translations as $locale => $translatedName) {
                AttributeTranslation::create([
                    'attribute_id' => $attribute->id,
                    'locale' => $locale,
                    'name' => $translatedName,
                ]);
            }
        }
    }

    private function translateToRussian(string $name): string
    {
        return match ($name) {
            'color' => 'Цвет',
            'size' => 'Размер',
            'material' => 'Материал',
            default => $name,
        };
    }

    private function translateToUzbek(string $name): string
    {
        return match ($name) {
            'color' => 'Rang',
            'size' => 'O‘lcham',
            'material' => 'Material',
            default => $name,
        };
    }
}
