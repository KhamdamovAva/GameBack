<?php

namespace App\Interfaces\Services;

interface BrandServiceInterface
{
    public function getAllBrands();
    public function createBrand($brandDTO);
    public function getBrand($slug);
    public function updateBrand($brandDTO, $id);
    public function deleteBrand($id);
}
