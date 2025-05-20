<?php

namespace App\Services;

use App\Models\Brand;
use App\Services\BaseService;
use Illuminate\Support\Facades\App;
use App\Interfaces\Services\BrandServiceInterface;
use App\Interfaces\Repositories\BrandRepositoryInterface;

class BrandService extends BaseService implements BrandServiceInterface
{
    public function __construct(protected BrandRepositoryInterface $brandRepository){

    }
    public function getAllBrands(){
        return $this->brandRepository->allBrands();
    }
    public function createBrand($brandDTO){
        $slug = $this->generateSlug($brandDTO->name, Brand::class);
        $data = [
            'user_id' => $brandDTO->user_id,
            'name' => $brandDTO->name,
            'slug' => $slug
        ];
        return $this->brandRepository->storeBrand($data);
    }
    public function getBrand($slug){
        return $this->brandRepository->getBrandBySlug($slug);
    }
    public function updateBrand($brandDTO, $id){
        $newSlug = $this->generateSlug($brandDTO->name, Brand::class);
        $data = [
            'user_id' => $brandDTO->user_id,
            'name' => $brandDTO->name,
            'slug' => $newSlug
        ];
        return $this->brandRepository->updateBrand($data, $id);
    }
    public function deleteBrand($id){
        $this->brandRepository->destroyBrand($id);
        return;
    }
}
