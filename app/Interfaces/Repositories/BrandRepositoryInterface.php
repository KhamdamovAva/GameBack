<?php

namespace App\Interfaces\Repositories;

interface BrandRepositoryInterface
{
    public function allBrands();
    public function storeBrand($data);
    public function getBrandBySlug($id);
    public function updateBrand($data, $id);
    public function destroyBrand($id);
}
