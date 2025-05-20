<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\CategoryDTO;
use App\Http\Resources\v1\Product\ProductResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\v1\Category\CategoryResource;
use App\Interfaces\Services\CategoryServiceInterface;
use App\Http\Requests\v1\Category\StoreCategoryRequest;
use App\Http\Requests\v1\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct(protected CategoryServiceInterface $categoryService){

    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return $this->success(CategoryResource::collection($categories), __('successes.category.all'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $categoryDTO = new CategoryDTO($request->icon, $request->translations, Auth::id());
        $category = $this->categoryService->createCategory($categoryDTO);
        return $this->success(new CategoryResource($category), __('successes.category.created'), 201);
    }

    public function show(string $id)
    {
        $category = $this->categoryService->getCategory($id);
        return $this->success(new CategoryResource($category), __('successes.category.show'));
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        $categoryDTO = new CategoryDTO($request->icon, $request->translations, Auth::id());
        $category = $this->categoryService->updateCategory($categoryDTO, $id);
        return $this->success(new CategoryResource($category), __('successes.category.updated'));
    }

    public function destroy(string $id)
    {
        $this->categoryService->deleteCategory($id);
        return $this->success([], __('successes.category.deleted'));

    }
    public function categoryWithProducts($slug){
        $categoryWithProducts = $this->categoryService->showCategory($slug);
        return $this->responsePagination($categoryWithProducts, ProductResource::collection($categoryWithProducts));

    }
}
