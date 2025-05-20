<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesktopTypeSeeder extends Seeder
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
        $desktopTypes = [
            ['name' => 'Игровой'],
            ['name' => 'Офисный'],
        ];

        foreach ($desktopTypes as $type) {
            DB::table('desktop_types')->insert([
                'user_id' => $user->id,
                'name' => $type['name'],
                'slug' => Str::slug($type['name']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
