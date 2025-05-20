<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Interfaces\Repositories\BrandRepositoryInterface;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{

    public function allBrands(){
        return Brand::all();
    }
    public function storeBrand($data){
        $brand = new Brand();
        $brand->user_id = $data['user_id'];
        $brand->name = $data['name'];
        $brand->slug = $data['slug'];
        $brand->save();

        return $brand;
    }
    public function getBrandBySlug($slug){
       return Brand::where('slug', $slug)->firstOrFail();
    }
    public function getBrandById($id){
        return Brand::findOrFail($id);
    }
    public function updateBrand($data, $id){
        $brand = $this->getBrandById($id);
        $brand->name = $data['name'];
        $brand->slug = $data['slug'];
        $brand->save();
        return $brand;
    }
    public function destroyBrand($id){
        $brand = $this->getBrandById($id);
        $brand->delete();
        return;
    }
}
