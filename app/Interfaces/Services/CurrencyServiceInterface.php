<?php

namespace App\Interfaces\Services;

interface CurrencyServiceInterface
{
    public function getAllConversion();
    public function getCreatedConversion($convDTO);
    public function getUpdatedConversion($convDTO, $id);
    public function getConversion($id);
    public function deleteConversion($id);
}
