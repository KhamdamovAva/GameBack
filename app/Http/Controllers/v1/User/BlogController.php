<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Blog\BlogResource;
use App\Interfaces\Services\BlogServiceInterface;

class BlogController extends Controller
{
    public function __construct(protected BlogServiceInterface $blogService){

    }
    public function index(){
        $blogs = $this->blogService->allBlogs();
        return $this->responsePagination($blogs,BlogResource::collection($blogs), __('successes.blog.all'));
    }
    public function show($slug){
        $blog = $this->blogService->getBlog($slug);
        return $this->success(new BlogResource($blog), __('successes.blog.show'));
    }

}
