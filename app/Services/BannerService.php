<?php

namespace App\Services;

use App\Models\Banners\Banner;
use Illuminate\Support\Facades\App;
use App\Http\Resources\Banner\BannerResource;
use App\Interfaces\Services\BannerServiceInterface;
use App\Interfaces\Repositories\BannerRepositoryInterface;

class BannerService extends BaseService implements BannerServiceInterface
{
    public function __construct(protected BannerRepositoryInterface $bannerRepository)
    {    
    }
    public function getAllBanners()
    {
         return $this->bannerRepository->getAllBanners();
    }
    public function createBanner($banner)
    { 
       $translations = $this->prepareTranslations(['translations' => $banner->translations],['name','description']);
       $locale = App::getLocale(); 
       $name = $translations[$locale]['name'];
       $slug = $this->generateSlug($name,Banner::class);
        $data = [
            'translations' => $translations,
            'slug' => $slug,
            'url' => $banner->url,
            'image' => $banner->image
        ];
        return $this->bannerRepository->createBanner($data);
    }

    public function showBanner($id)
    {
         return  $this->bannerRepository->showBanner($id);
    }
    public function updateBanner($id, $banner)
    {
        $translations = $this->prepareTranslations(['translations' => $banner->translations],['name','description']);
        $locale = App::getLocale(); 
        $name = $translations[$locale]['name'];
        $slug = $this->generateSlug($name,Banner::class);
        $data = [
             'translations' => $translations,
             'slug' => $slug,
             'url' => $banner->url,
             'image' => $banner->image
        ];
         return $this->bannerRepository->updateBanner($id,$data);
    }
    public function deleteBanner($id)
    {
        return $this->bannerRepository->deleteBanner($id);
    }
}