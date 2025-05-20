<?php

namespace App\Interfaces\Services;

interface ProductServiceInterface
{
   public function getAllProducts($perPage);
   public function getCreatedProduct($productDTO);
   public function getUpdatedProduct($productDTO, $id);
   public function getProduct($id);
   public function searchProductByName($q);
   public function deleteProduct($id);
   public function byStatus($type, $page);
}
