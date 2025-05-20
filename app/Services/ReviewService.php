<?php

namespace App\Services;

use App\Models\Reviews\Review;
use Illuminate\Support\Facades\App;
use App\Interfaces\Services\ReviewServiceInterface;
use App\Interfaces\Repositories\ReviewRepositoryInterface;

class ReviewService extends BaseService implements ReviewServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected ReviewRepositoryInterface $reviewRepository)
    {
        //
    }
    public function getAllReviews(){
        return $this->reviewRepository->index();
    }
    public function storeReview($reviewDTO){
        $translations = $this->prepareTranslations(['translations' => $reviewDTO->translations], ['comment', 'profession']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['profession'], Review::class);
        $data = [
            'translations' => $translations,
            'fullname' => $reviewDTO->fullname,
            'slug' => $slug,
            'image' => $reviewDTO->image,
            'video' => $reviewDTO->video
        ];
        return $this->reviewRepository->store($data);
    }
    public function updateReview($reviewDTO, $id){
        $translations = $this->prepareTranslations(['translations' => $reviewDTO->translations], ['comment', 'profession']);
        $locale = App::getLocale();
        $slug = $this->generateSlug($translations[$locale]['profession'], Review::class);
        $data = [
            'translations' => $translations,
            'fullname' => $reviewDTO->fullname,
            'slug' => $slug,
            'image' => $reviewDTO->image,
            'video' => $reviewDTO->video
        ];
        return $this->reviewRepository->update($data, $id);
    }
    public function getReview($slug){
        return $this->reviewRepository->show($slug);
    }
    public function deleteReview($id){
        return $this->reviewRepository->destroy($id);
    }
}
