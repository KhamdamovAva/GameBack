<?php

namespace App\Interfaces\Repositories;

interface ProductRepositoryInterface
{

    public function allProducts($perPage);
    public function createProduct($data);
    public function updateProduct($data, $id);
    public function showProduct($id);
    public function destroyProduct($id);
    public function search($q);
    public function getByStatus($type, $page);
}
