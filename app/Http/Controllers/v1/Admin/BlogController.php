<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\BlogDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Blog\StoreBlogRequest;
use App\Http\Requests\v1\Blog\UpdateBlogRequest;
use App\Http\Resources\v1\Blog\BlogResource;
use App\Interfaces\Services\BlogServiceInterface;
use Illuminate\Http\Request;

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
    public function store(StoreBlogRequest $request){
        $blogDTO = new BlogDTO($request->translations, $request->file('image'), $request->video_url);
        $blog = $this->blogService->storeBlog($blogDTO);
        return $this->success(new BlogResource($blog), __('successes.blog.created'), 201);
    }
    public function update(UpdateBlogRequest $request, $id){
        $blogDTO = new BlogDTO($request->translations, $request->file('image'), $request->video_url);
        $updatedBlog = $this->blogService->updateBlog($blogDTO, $id);
        return $this->success(new BlogResource($updatedBlog), __('successes.blog.updated'));
    }
    public function destroy($id){
        $this->blogService->deleteBlog($id);
        return $this->success([], __('successes.blog.deleted'));
    }

}
