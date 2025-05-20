<?php

namespace App\Interfaces\Services;

interface ReviewServiceInterface
{
    public function getAllReviews();
    public function storeReview($reviewDTO);
    public function updateReview($reviewDTO, $id);
    public function getReview($slug);
    public function deleteReview($id);
}
