<?php

namespace App\Interfaces\Services;

interface CategoryServiceInterface
{
    public function getAllCategories();
    public function createCategory($categoryDTO);
    public function getCategory($id);
    public function showCategory($slug);
    public function updateCategory($categoryDTO, $id);
    public function deleteCategory($id);
}
