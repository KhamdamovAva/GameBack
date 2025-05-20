<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use App\Models\Products\ProductType;
use App\Interfaces\Services\ProductTypeServiceInterface;
use App\Interfaces\Repositories\ProductTypeRepositoryInterface;

class ProductTypeService extends BaseService implements ProductTypeServiceInterface
{

    public function __construct(protected ProductTypeRepositoryInterface $productTypeRepository)
    {
        //
    }
    public function allProductTypes(){
        return $this->productTypeRepository->index();
    }
    public function getProductType($slug){
        return $this->productTypeRepository->show($slug);
    }
    public function storeProductType($productTypeDTO){
        $slug = $this->generateSlug($productTypeDTO->name, ProductType::class);
        $data = [
            'name' => $productTypeDTO->name,
            'slug' => $slug
        ];
        return $this->productTypeRepository->store($data);
    }
    public function updateProductType($productTypeDTO, $id){
        $slug = $this->generateSlug($productTypeDTO->name, ProductType::class);
        $data = [
            'name' => $productTypeDTO->name,
            'slug' => $slug
        ];
        return $this->productTypeRepository->update($data, $id);
    }
    public function deleteProductType($id){
        return $this->productTypeRepository->destroy($id);
    }
}
