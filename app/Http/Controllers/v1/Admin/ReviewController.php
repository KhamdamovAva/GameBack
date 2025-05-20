<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\ReviewDTO;
use App\Http\Requests\v1\Review\StoreReviewRequest;
use App\Http\Requests\v1\Review\UpdateReviewRequest;
use Illuminate\Http\Request;
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
    public function store(StoreReviewRequest $request){
        $reviewDTO = new ReviewDTO($request->translations, $request->fullname, $request->file('image'), $request->file('video'));
        $review = $this->reviewService->storeReview($reviewDTO);
        return $this->success(new ReviewResource($review), __('successes.review.created'), 201);
    }
    public function update(UpdateReviewRequest $request, $id){
        $reviewDTO = new ReviewDTO($request->translations, $request->fullname, $request->file('image'), $request->file('video'));
        $review = $this->reviewService->updateReview($reviewDTO, $id);
        return $this->success(new ReviewResource($review), __('successes.review.updated'));
    }
    public function show($slug){
        $review = $this->reviewService->getReview($slug);
        return $this->success(new ReviewResource($review), __('successes.review.show'));
    }
    public function destroy($id){
        $this->reviewService->deleteReview($id);slug:
        return $this->success([], __('successes.review.deleted'));
    }
}
