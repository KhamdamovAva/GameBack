<?php
namespace App\Services;

use App\Models\Categories\Category;
use Illuminate\Support\Facades\App;
use App\Interfaces\Services\CategoryServiceInterface;
use App\Interfaces\Repositories\CategoryRepositoryInterface;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    public function __construct(protected CategoryRepositoryInterface $categoryRepository)
    {

    }
    public function getAllCategories()
    {
        return $this->categoryRepository->allCategories();
    }
    public function createCategory($categoryDTO)
    {
        $translations = $this->prepareTranslations(['translations' => $categoryDTO->translations], ['name']);
        $locale = App::getLocale();
        $name = $translations[$locale]['name'];
        $slug = $this->generateSlug($name, Category::class);
        $data = [
            'user_id' => $categoryDTO->user_id,
            'icon' => $categoryDTO->icon,
            'translations' => $translations,
            'slug' => $slug
        ];
        return $this->categoryRepository->storeCategory($data);
    }

    public function getCategory($id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }
    public function updateCategory($categoryDTO, $id)
    {
        $category = $this->categoryRepository->getCategoryById($id);
        $translations = $this->prepareTranslations(['translations' => $categoryDTO->translations], ['name']);
        $locale = App::getLocale();
        $name = $translations[$locale]['name'];
        $newSlug = $this->generateSlug($name, Category::class);
        $data = [
            'user_id' => $categoryDTO->user_id,
            'icon' => $categoryDTO->icon,
            'translations' => $translations,
            'slug' => $newSlug
        ];
        return $this->categoryRepository->updateCategory($data, $category);

    }
    public function deleteCategory($id)
    {
        $category = $this->categoryRepository->getCategoryById($id);
        $this->categoryRepository->destroyCategory($category);
        return;
    }
    public function showCategory($slug)
    {
        return $this->categoryRepository->showCategory($slug);
    }
}
