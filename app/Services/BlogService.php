<?php

namespace App\Services;

use App\Models\Blogs\Blog;
use Illuminate\Support\Facades\App;
use App\Interfaces\Services\BlogServiceInterface;
use App\Interfaces\Repositories\BlogRepositoryInterface;

class BlogService extends BaseService implements BlogServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected BlogRepositoryInterface $blogRepository)
    {
        //
    }
    public function allBlogs(){
        return $this->blogRepository->index();
    }
    public function getBlog($slug){
        return $this->blogRepository->show($slug);
    }
    public function storeBlog($blogDTO){
        $translations = $this->prepareTranslations(['translations' => $blogDTO->translations], ['name', 'description']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['name'], Blog::class);
        $data = [
            'translations' => $translations,
            'image' => $blogDTO->image,
            'video_url' => $blogDTO->video_url,
            'slug' => $slug
        ];
        return $this->blogRepository->store($data);
    }
    public function updateBlog($blogDTO, $id){
        $translations = $this->prepareTranslations(['translations' => $blogDTO->translations], ['name', 'description']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['name'], Blog::class);
        $data = [
            'translations' => $translations,
            'image' => $blogDTO->image,
            'video_url' => $blogDTO->video_url,
            'slug' => $slug
        ];
        return $this->blogRepository->update($data, $id);
    }
    public function deleteBlog($id){
        return $this->blogRepository->destroy($id);
    }
}
