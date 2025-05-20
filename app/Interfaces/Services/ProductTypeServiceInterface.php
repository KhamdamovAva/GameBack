<?php

namespace App\Interfaces\Services;

interface ProductTypeServiceInterface
{
    public function allProductTypes();
    public function getProductType($slug);
    public function storeProductType($productTypeDTO);
    public function updateProductType($productTypeDTO, $id);
    public function deleteProductType($id);
}
