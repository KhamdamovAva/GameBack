<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin2025',
            'phone' => '998999999999',
            'email_verified_at' => now()
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'user1234',
            'phone' => '998770000303',
            'email_verified_at' => now()
        ]);
    }
}
