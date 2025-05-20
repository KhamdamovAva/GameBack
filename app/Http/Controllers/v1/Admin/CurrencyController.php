<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\CurrencyDTO;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CurrencyResource;
use App\Interfaces\Services\CurrencyServiceInterface;
use App\Http\Requests\v1\Currency\StoreCurrencyRequest;
use App\Http\Requests\v1\Currency\UpdateCurrencyRequest;

class CurrencyController extends Controller
{
    public function __construct(protected CurrencyServiceInterface $currencyService){

    }

    public function index()
    {
        $currencies = $this->currencyService->getAllConversion();
        return $this->success(CurrencyResource::collection($currencies), __('successes.currency.all'));
    }

    public function store(StoreCurrencyRequest $request)
    {
        $currencyDTO = new CurrencyDTO($request->currency, $request->conversions);
        $currency = $this->currencyService->getCreatedConversion($currencyDTO);
        return $this->success(new CurrencyResource($currency), __('successes.currency.created'), 201);
    }

    public function show(string $id)
    {
        $conv = $this->currencyService->getConversion($id);
        return $this->success(new CurrencyResource($conv));
    }

    public function update(UpdateCurrencyRequest $request, string $id)
    {
        $currencyDTO = new CurrencyDTO($request->currency, $request->conversions);
        $updatedCurrency = $this->currencyService->getUpdatedConversion($currencyDTO, $id);
        return $this->success(new CurrencyResource($updatedCurrency), __('successes.currency.updated'));

    }

    public function destroy(string $id)
    {
        $this->currencyService->deleteConversion($id);
        return $this->success([], __('successes.currency.deleted'));
    }
}
