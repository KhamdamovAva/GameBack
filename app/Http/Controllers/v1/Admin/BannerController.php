<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\BannerDTO;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Banner\BannerResource;
use App\Http\Requests\v1\Banner\BannerStoreRequest;
use App\Interfaces\Services\BannerServiceInterface;
use App\Http\Requests\v1\Banner\BannerUpdateRequest;

class BannerController extends Controller
{
    use ResponseTrait;
    public function __construct(protected BannerServiceInterface $bannerService){}
    public function index()
    {
        $banners = $this->bannerService->getAllBanners();
        return $this->success(BannerResource::collection($banners),__('successes.banners.all'));
    }
    public function store(BannerStoreRequest $request)
    {
        $bannerDTO = new BannerDTO($request->translations,$request->file('image'),$request->url);
        $banner = $this->bannerService->createBanner($bannerDTO);
        return $this->success(new BannerResource($banner),__('successes.banners.created'));
    }
    public function show(string $id)
    {
        $banner = $this->bannerService->showBanner($id);
        return $this->success(new bannerResource($banner),__('successes.banners.show'));
    }
    public function update(BannerUpdateRequest $request, string $id)
    {
        $bannerDTO = new BannerDTO($request->translations,$request->file('image'),$request->url);
        $banner = $this->bannerService->updateBanner($id,$bannerDTO);
        return $this->success(new BannerResource($banner),__('successes.banners.updated'));
    }
    public function destroy( $id)
    {
        $this->bannerService->deleteBanner($id);
        return $this->success([],__('successes.banners.deleted'));
    }
}
