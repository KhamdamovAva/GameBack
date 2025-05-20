<?php

namespace App\Repositories;

use App\Models\Blogs\Blog;
use App\Events\AttachmentEvent;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    public function __construct(protected AttachmentService $attachmentService){

    }
    public function index(){
        return Blog::with('attachments', 'translations')->paginate(3);
    }
    public function show($slug){
        return Blog::where('slug', $slug)->with('attachments')->firstOrFail();
    }
    public function store($data){
        $blog = new Blog();
        $blog->user_id = Auth::id();
        $blog->video_url = $data['video_url'];
        $blog->slug = $data['slug'];
        $blog->fill($data['translations']);
        $blog->save();

        event(new AttachmentEvent($data['image'], $blog->image(), 'blog_images'));
        return $blog->load('attachments');
    }
    public function update($data, $id){
        $blog = $this->getById($id);
        $blog->slug = $data['slug'];
        $blog->video_url = $data['video_url'];
        $blog->fill($data['translations']);
        $blog->save();

        if($data['image'] && $blog->image){
            $this->attachmentService->destroy($blog->image);
            event(new AttachmentEvent($data['image'], $blog->image(), 'blog_images'));
        }

        return $blog->load('attachments');
    }
    public function destroy($id){
        $blog = $this->getById($id);
        if(!empty($blog->image)){
            $this->attachmentService->destroy($blog->image);
        }
        $blog->delete();
        return;
    }
    public function getById($id){
        return Blog::findOrFail($id);
    }
}
