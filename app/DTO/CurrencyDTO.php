<?php

namespace App\DTO;

class CurrencyDTO
{
    public $currency;
    public $conversions;
    public function __construct($currency, $conversions)
    {
        $this->currency = $currency;
        $this->conversions = $conversions;
    }
}
