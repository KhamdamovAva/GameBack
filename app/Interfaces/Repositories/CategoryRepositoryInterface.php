<?php

namespace App\Interfaces\Repositories;

interface CategoryRepositoryInterface
{
    public function allCategories();
    public function storeCategory($data);
    public function getCategoryById($id);
    public function showCategory($id);
    public function updateCategory($data, $category);
    public function destroyCategory($category);
}
