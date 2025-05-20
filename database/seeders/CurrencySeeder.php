<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                'currency' => 'US Dollar',
                'conversions' => 12,
                'Ccy' => 'USD',
            ],
            [
                'currency' => 'Russian Ruble',
                'conversions' => 100,
                'Ccy' => 'RUB',
            ],
            [
                'currency' => 'So\'m',
                'conversions' => 1,
                'Ccy' => 'UZS',
            ],
        ];

        foreach ($currencies as $currency) {
            $currency['created_at'] = now();
            $currency['updated_at'] = now();
            DB::table('currencies')->insert($currency);
        }
    }
}
