<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ExchangeRateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command updates currencies';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
        $currency = $response->json();
        $conversions = Currency::all();
        foreach ($conversions as $c) {
            $matchingCurrency = collect($currency)->firstWhere('Ccy', $c->Ccy);
            if ($matchingCurrency) {
                $c->update([
                    'Rate' => $matchingCurrency['Rate'],
                    'conversions' => $matchingCurrency['Rate'],
                ]);
            }
        }
    }
}
