<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Interfaces\Repositories\CurrencyRepositoryInterface;


class CurrencyRepository implements CurrencyRepositoryInterface
{
    public function allConversion(){
        $currencies = Currency::all();
        return $currencies;
    }
    public function createConversion($data){
        $currency = new Currency();
        $currency->currency = $data['currency'];
        $currency->conversions = $data['conversions'];
        $currency->Ccy = $data['currency'];
        $currency->save();
        return $currency;
    }
    public function updateConversion($data, $id){
        $currency = $this->showConversion($id);
        $currency->currency = $data['currency'] ?? $currency->currency;
        $currency->conversions = $data['conversions'] ?? $currency->conversions;
        $currency->save();
        return $currency;
    }
    public function showConversion($id){
        $currency = Currency::findOrFail($id);
        return $currency;
    }
    public function destroyConversion($id){
        $currency = $this->showConversion($id);
        $currency->delete();
        return;
    }
}
