<?php

namespace App\Interfaces\Repositories;

interface CurrencyRepositoryInterface
{
    public function allConversion();
    public function createConversion($data);
    public function updateConversion($data, $id);
    public function showConversion($id);
    public function destroyConversion($id);
}
