<?php

namespace App\Services;

use App\Models\Products\Product;
use Illuminate\Support\Facades\App;
use App\Interfaces\Services\ProductServiceInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;

class ProductService extends BaseService implements ProductServiceInterface
{

    public function __construct(protected ProductRepositoryInterface $productRepository)
    {
        //
    }

    public function getAllProducts($perPage){
       return $this->productRepository->allProducts($perPage);
    }
    public function getCreatedProduct($productDTO){
        $translations = $this->prepareTranslations(['translations' => $productDTO->translations], ['name', 'description']);
        $locale = App::getLocale();
        $name = $translations[$locale]['name'];
        $slug = $this->generateSlug($name, Product::class);
        $data = [
            'translations' => $translations,
            'slug' => $slug,
            'images' => $productDTO->images,
            'price' => $productDTO->price,
            'discount' => $productDTO->discount,
            'attributes' => $productDTO->attributes,
            'brand_id' => $productDTO->brand_id,
            'statuses' => $productDTO->statuses,
            'type' => $productDTO->type,
            'category_id' => $productDTO->category_id
        ];
        // dd($data);
        return $this->productRepository->createProduct($data);
    }
    public function getUpdatedProduct($productDTO, $id){
        $translations = $this->prepareTranslations(['translations' => $productDTO->translations], ['name', 'description']);
        $locale = App::getLocale();
        $name = $translations[$locale]['name'];
        $newSlug = $this->generateSlug($name, Product::class);
        $data = [
            'translations' => $translations,
            'slug' => $newSlug,
            'images' => $productDTO->images,
            'price' => $productDTO->price,
            'discount' => $productDTO->discount,
            'attributes' => $productDTO->attributes,
            'brand_id' => $productDTO->brand_id,
            'statuses' => $productDTO->statuses,
            'type' => $productDTO->type,
            'category_id' => $productDTO->category_id

        ];
        return $this->productRepository->updateProduct($data, $id);
    }
    public function getProduct($slug){
        return $this->productRepository->showProduct($slug);
    }
    public function deleteProduct($id){
        return $this->productRepository->destroyProduct($id);
    }
    public function searchProductByName($q){
        return $this->productRepository->search($q);
    }
    public function byStatus($type, $page){
        return $this->productRepository->getByStatus($type, $page);
    }
}
