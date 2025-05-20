<?php

namespace Database\Seeders;

use App\Models\DesktopFPS;
use Illuminate\Database\Seeder;
use App\Models\Desktops\Desktop;
use Illuminate\Support\Facades\DB;

class DesktopFpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DesktopFPS::insert([
            [
                'user_id' => 1,
                'game_id' => 1,
                'resolution' => '1440p',
                'fps_value' => 40,
            ],
            [
                'user_id' => 2,
                'game_id' => 2,
                'resolution' => '1460p',
                'fps_value' => 60,
            ],
        ]);
    }
}
