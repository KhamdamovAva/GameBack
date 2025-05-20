<?php

namespace App\Repositories;

use App\Models\Products\ProductType;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\ProductTypeRepositoryInterface;

class ProductTypeRepository implements ProductTypeRepositoryInterface
{
    public function index(){
        return ProductType::all();

    }
    public function show($slug){
        return ProductType::where('slug', $slug)->firstOrFail();
    }
    public function store($data){
        $productType = new ProductType();
        $productType->user_id = Auth::id();
        $productType->name = $data['name'];
        $productType->slug = $data['slug'];
        $productType->save();
        return $productType;
    }
    public function update($data, $id){
        $productType = $this->getById($id);
        $productType->name = $data['name'];
        $productType->slug = $data['slug'];
        $productType->save();
        return $productType;
    }
    public function destroy($id){
        $productType = $this->getById($id);
        return $productType->delete();
    }
    public function getById($id){
        return ProductType::findOrFail($id);
    }
}
