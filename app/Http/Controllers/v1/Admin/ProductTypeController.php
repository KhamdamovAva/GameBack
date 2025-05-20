<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\ProductTypeDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ProductTypeResource;
use App\Interfaces\Services\ProductTypeServiceInterface;
use App\Http\Requests\v1\ProductType\StoreProductTypeRequest;
use App\Http\Requests\v1\ProductType\UpdateProductTypeRequest;

class ProductTypeController extends Controller
{
    public function __construct(protected ProductTypeServiceInterface $productTypeService){

    }
    public function index(){
        $productTypes = $this->productTypeService->allProductTypes();
        return $this->success(ProductTypeResource::collection($productTypes), __('successes.product_type.all'));
    }
    public function show(string $slug){
        $productType = $this->productTypeService->getProductType($slug);
        return $this->success(new ProductTypeResource($productType), __('successes.product_type.show'));
    }
    public function store(StoreProductTypeRequest $request){
        $productTypeDTO = new ProductTypeDTO($request->name);
        $productType = $this->productTypeService->storeProductType($productTypeDTO);
        return $this->success(new ProductTypeResource($productType), __('successes.product_type.created'), 201);
    }
    public function update(UpdateProductTypeRequest $request, $id){
        $productTypeDTO = new ProductTypeDTO($request->name);
        $updatedProductType = $this->productTypeService->updateProductType($productTypeDTO, $id);
        return $this->success(new ProductTypeResource($updatedProductType), __('successes.product_type.updated'));
    }
    public function destroy($id){
        $this->productTypeService->deleteProductType($id);
        return $this->success([], __('successes.product_type.deleted'));
    }
}
