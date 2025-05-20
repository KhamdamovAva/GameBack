<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Banner\BannerStoreRequest;
use App\Interfaces\Services\BannerServiceInterface;
use App\Http\Requests\v1\Banner\BannerUpdateRequest;
use App\Http\Resources\v1\Banner\BannerResource;

class BannerController extends Controller
{
    public function __construct(protected BannerServiceInterface $bannerService)
    {
    }
    public function index()
    {
        return $this->success(BannerResource::collection($this->bannerService->getAllBanners()));
    }
}