<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Resources\v1\Product\ProductResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Category\CategoryResource;
use App\Interfaces\Services\CategoryServiceInterface;

class CategoryController extends Controller
{
    public function __construct(protected CategoryServiceInterface $categoryService){

    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return $this->success(CategoryResource::collection($categories), __('successes.category.all'));
    }
    public function categoryWithProducts($slug){
        $categoryWithProducts = $this->categoryService->showCategory($slug);
        return $this->responsePagination($categoryWithProducts, ProductResource::collection($categoryWithProducts));

    }
}
