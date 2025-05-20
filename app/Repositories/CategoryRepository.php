<?php

namespace App\Repositories;

use App\Events\AttachmentEvent;
use App\Models\Categories\Category;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(protected AttachmentService $attachmentService){

    }
    public function allCategories(){
        return Category::with('translations', 'icon')->get();
    }

    public function storeCategory($data){
        $category = new Category();
        $category->user_id = $data['user_id'];
        $category->fill($data['translations']);
        $category->slug = $data['slug'];
        $category->save();
        event(new AttachmentEvent($data['icon'], $category->icon(), 'categories'));
        return $category->load(['translations', 'icon']);

    }

    public function getCategoryById($id)
    {
        return Category::with(['translations', 'icon'])->findOrFail($id);
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()
            ->with(['translations', 'statuses.translations', 'attributes.translations', 'images', 'brand', 'category.translations'])
            ->paginate(12);

        return $products;
    }

    public function updateCategory($data, $category){
        $category->fill($data['translations']);
        $category->slug = $data['slug'];
        $category->save();
        if(!empty($data['icon']) && !empty($category->icon) || !empty($data['icon']) && empty($category->icon)){
            $this->attachmentService->destroy($category->icon);
            event(new AttachmentEvent($data['icon'], $category->icon(), 'categories'));
        }
        return $category->load(['translations', 'icon']);
    }
    public function destroyCategory($category){
        if(!empty($category->icon)){
            $this->attachmentService->destroy($category->icon);
        }
        $category->delete();
        return;
    }
}
