<?php

namespace App\Interfaces\Services;

interface BlogServiceInterface
{
    public function allBlogs();
    public function getBlog($slug);
    public function storeBlog($blogDTO);
    public function updateBlog($blogDTO, $id);
    public function deleteBlog($id);
}
