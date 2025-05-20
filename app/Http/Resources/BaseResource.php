<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Models\Currency;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class BaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    protected function convertCurrency($price, $discount, $requestedCurrency)
    {
        $validCurrencies = Currency::pluck('Ccy')->toArray();
        if (!in_array($requestedCurrency, $validCurrencies)) {
            $requestedCurrency = 'UZS';
        }

        $currencyRate = Currency::where('Ccy', $requestedCurrency)->value('conversions') ?? 1;

        return [
            'converted_price' => round($price / $currencyRate, 2),
            'converted_discount' => round($discount / $currencyRate, 2),
        ];
    }
}
