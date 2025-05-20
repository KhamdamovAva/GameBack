<?php

    namespace App\Interfaces\Repositories;

interface BannerRepositoryInterface{
    public function getAllBanners();
    public function createBanner($banner);
    public function showBanner($id);
    public function updateBanner($id, $banner);
    public function deleteBanner($id);
}