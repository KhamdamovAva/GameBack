<?php

    namespace App\Interfaces\Services;

interface BannerServiceInterface{
    public function getAllBanners();
    public function createBanner($banner);
    public function showBanner($id);
    public function updateBanner($id, $banner);
    public function deleteBanner($id);
}