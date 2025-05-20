<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CurrencyResource;
use App\Interfaces\Services\CurrencyServiceInterface;

class CurrencyController extends Controller
{
    public function __construct(protected CurrencyServiceInterface $currencyService){

    }

    public function index()
    {
        $currencies = $this->currencyService->getAllConversion();
        return $this->success(CurrencyResource::collection($currencies), __('successes.currency.all'));
    }
}
