<?php

namespace App\Repositories;

use App\Events\AttachmentEvent;
use App\Models\Statuses\Status;
use App\Models\Products\Product;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    #TODO fix product response
    public function __construct(protected AttachmentService $attachmentService){

    }
    public function allProducts($perPage){
        $products = Product::with('images', 'attributes.translations', 'statuses.translations', 'category.translations', 'brand')->paginate($perPage);
        return $products;
    }
    public function createProduct($data){
        $product = new Product();
        $product->user_id = Auth::id();
        $product->price = $data['price'];
        $product->discount = $data['discount'];
        $product->brand_id = $data['brand_id'];
        $product->type = $data['type'];
        $product->category_id = $data['category_id'];
        $product->fill($data['translations']);
        $product->slug = $data['slug'];
        $product->save();
        $product->statuses()->attach($data['statuses']);
        $product->attributes()->sync($data['attributes']);
        event(new AttachmentEvent($data['images'], $product->images(), 'products'));
        return $product->load('attributes.translations', 'brand', 'statuses.translations', 'category.translations', 'images');
    }
    public function updateProduct($data, $id){
        $product = $this->getById($id);
        $product->price = $data['price'];
        $product->discount = $data['discount'];
        $product->brand_id = $data['brand_id'];
        $product->type = $data['type'];
        $product->category_id = $data['category_id'];
        $product->fill($data['translations']);
        $product->slug = $data['slug'];
        $product->save();
        $product->statuses()->detach($product->statuses);
        $product->attributes()->detach($product->attributes);
        $product->statuses()->attach($data['statuses']);
        $product->attributes()->attach($data['attributes']);

        if(!empty($data['images']) && !empty($product->images) || !empty($data['images']) && empty($product->images)){
            $this->attachmentService->destroy($product->images);
            event(new AttachmentEvent($data['images'], $product->images(), 'products'));
        }

        return $product->load(['attributes.translations', 'brand', 'statuses.translations', 'category.translations', 'images']);
    }
    public function showProduct($slug){
        return Product::where('slug', $slug)->with(['attributes.translations', 'brand', 'statuses.translations', 'category.translations', 'images'])->firstOrFail();
    }
    public function destroyProduct($id){
        $product = $this->getById($id);
        $product->statuses()->detach($product->statuses);
        $product->attributes()->detach($product->attributes);
        if(!empty($product->images)){
            $this->attachmentService->destroy($product->images);
        }
        $product->delete();
        return;
    }
    public function search($q){
    $status = Status::whereTranslation('name', 'active')->firstOrFail();

    return $status->products()
        ->whereHas('translations', function ($query) use ($q) {
            $query->where('name', 'like', "%{$q}%");
        })
        ->with(['statuses.translations', 'images', 'brand'])
        ->paginate(8);
    }
    public function getById($id){
        return Product::findOrFail($id);
    }
    public function getByStatus($type, $page){

        $query = Product::query();
        if ($type === 'new') {
            $status = Status::whereTranslation('name', ['Новый', 'Активный'])
            ->orWhereTranslation('name', ['Yangi', 'Faol'])
            ->orWhereTranslation('name', ['New', 'Active'])
            ->firstOrFail();
            $query = $status->products();
        } elseif ($type === 'discounted') {
            $status = Status::whereTranslation('name', 'Активный')
            ->orWhereTranslation('name', 'Faol')
            ->orWhereTranslation('name', 'Active')
            ->firstOrFail();
            $query = $status->products()->whereNotNull('discount');
        }
        return $query
            ->with(['translations', 'statuses.translations', 'images', 'brand'])
            ->paginate($page);
    }
}













