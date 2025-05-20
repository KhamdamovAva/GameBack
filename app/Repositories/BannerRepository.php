<?php

namespace App\Repositories;
use App\Models\Banners\Banner;
use App\Events\AttachmentEvent;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\BannerRepositoryInterface;

class BannerRepository implements BannerRepositoryInterface
{
    public function __construct(protected AttachmentService $attachmentService)
    {
    }
    public function getAllBanners()
    {
        $banners = Banner::with('translations','image')->get();
        return $banners;
    }
    public function createBanner($data)
    {
        $banner = new Banner();
        $banner->fill($data['translations']);
        $banner->slug = $data['slug'];
        $banner->user_id = Auth::id();
        $banner->url = $data['url'];
        $banner->save();
        event(new AttachmentEvent($data['image'],$banner->image(), 'banners'));
        return $banner->load('translations','image');
    }
    public function showBanner($slug)
    {
        $banner = Banner::where('slug',$slug)->firstOrFail();
        return $banner;
    }
    public function updateBanner($id, $data)
    {
        $banner = $this->getById($id);
        $banner->fill($data['translations']);
        $banner->slug = $data['slug'];
        $banner->user_id = Auth::id();
        $banner->url = $data['url'];
        $banner->save();
        if(!empty($data['image']) && !empty($banner->image) || !empty($data['image']) && empty($banner->image)){
            $this->attachmentService->destroy($banner->image);
            event(new AttachmentEvent($data['image'], $banner->image(), 'banners'));
        }
        return $banner->load(['translations', 'image']);
    }
    public function deleteBanner($id)
    {
        $banner = $this->getById($id);

        if(!empty($banner->image)){
            $this->attachmentService->destroy($banner->image);
        }
        
        $banner->delete();
        return;
    }
    public function getById($id){
        return Banner::findOrFail($id);
    }
}
