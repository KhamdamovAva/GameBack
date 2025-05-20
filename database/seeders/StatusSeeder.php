<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
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
        $statuses = [
            ['slug' => 'active'],
            ['slug' => 'inactive'],
            ['slug' => 'new'],
            ['slug' => 'discounted']
        ];

        foreach ($statuses as $status) {
            $statusId = DB::table('statuses')->insertGetId([
                'user_id' => $user->id,
                'slug' => $status['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $translations = [
                ['locale' => 'uz', 'name' => $this->translateToUzbek($status['slug'])],
                ['locale' => 'ru', 'name' => $this->translateToRussian($status['slug'])],
            ];

            foreach ($translations as $translation) {
                DB::table('status_translations')->insert([
                    'status_id' => $statusId,
                    'locale' => $translation['locale'],
                    'name' => $translation['name'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Status nomlarini rus tiliga tarjima qilish.
     */
    private function translateToRussian(string $slug): string
    {
        return match ($slug) {
            'discounted' => 'Распродажа',
            'new' => 'Новый',
            'inactive' => 'Неактивный',
            'active' => 'Aктивный',
            default => $slug,
        };
    }
    private function translateToUzbek(string $slug): string
    {
        return match ($slug) {
            'discounted' => 'Chegirma',
            'new' => 'Yangi',
            'inactive' => 'Nofaol',
            'active' => 'Faol',
            default => $slug,
        };
    }
}
