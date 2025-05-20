<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Review\ReviewResource;
use App\Interfaces\Services\ReviewServiceInterface;

class ReviewController extends Controller
{
    public function __construct(protected ReviewServiceInterface $reviewService){

    }
    public function index(){
        $reviews = $this->reviewService->getAllReviews();
        return $this->responsePagination($reviews, ReviewResource::collection($reviews), __('successes.review.all'));
    }

    public function show($slug){
        $review = $this->reviewService->getReview($slug);
        return $this->success(new ReviewResource($review), __('successes.review.show'));
    }

}
