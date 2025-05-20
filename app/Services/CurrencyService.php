<?php

namespace App\Services;

use App\Interfaces\Services\CurrencyServiceInterface;
use App\Interfaces\Repositories\CurrencyRepositoryInterface;


class CurrencyService extends BaseService implements CurrencyServiceInterface
{

    public function __construct(protected CurrencyRepositoryInterface $conversionRepository)
    {

    }

    public function getAllConversion(){
        $convs = $this->conversionRepository->allConversion();
        return $convs;
    }
    public function getCreatedConversion($convDTO){
        $currency = strtoupper($convDTO->currency);
        $data = [
            'currency' => $currency,
            'conversions' => $convDTO->conversions
        ];
        $conv = $this->conversionRepository->createConversion($data);
        return $conv;
    }
    public function getUpdatedConversion($convDTO, $id){
        $currency = strtoupper($convDTO->currency);
        $data = [
            'currency' => $currency,
            'conversions' => $convDTO->conversions
        ];
        $updatedConv = $this->conversionRepository->updateConversion($data, $id);
        return $updatedConv;
    }
    public function getConversion($id){
        $conv = $this->conversionRepository->showConversion($id);
        return $conv;
    }
    public function deleteConversion($id){
        $this->conversionRepository->destroyConversion($id);
        return;
    }
}
