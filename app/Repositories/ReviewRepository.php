<?php

namespace App\Repositories;

use App\Events\AttachmentEvent;
use App\Models\Reviews\Review;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AttachmentService $attachmentService)
    {
        //
    }
    public function index(){
        return Review::with('attachments')->paginate(4);
    }
    public function store($data){
        $review = new Review();
        $review->user_id = Auth::id();
        $review->fill($data['translations']);
        $review->fullname = $data['fullname'];
        $review->slug = $data['slug'];
        $review->save();

        event(new AttachmentEvent($data['image'], $review->image(), 'review_images'));
        event(new AttachmentEvent($data['video'], $review->video(), 'review_videos'));

        return $review->load('attachments');
    }
    public function update($data, $id){
        $review = $this->getById($id);
        $review->fill($data['translations']);
        $review->slug = $data['slug'];
        $review->fullname = $data['fullname'];
        $review->save();

        if($data['image'] && $review->image && $data['video'] && $review->video){
            $this->attachmentService->destroy($review->image);
            $this->attachmentService->destroy($review->video);

            event(new AttachmentEvent($data['image'], $review->image(), 'review_images'));
            event(new AttachmentEvent($data['video'], $review->video(), 'review_videos'));
        }

        return $review->load('attachments');
    }
    public function show($slug){
        return Review::where('slug', $slug)->with('attachments')->firstOrFail();
    }
    public function destroy($id){
        $review = $this->getById($id);
        if(!empty($review->image) && $review->video){
            $this->attachmentService->destroy($review->image);
            $this->attachmentService->destroy($review->video);
        }
        $review->delete();
        return;
    }
    public function getById($id){
        return Review::findOrFail($id);
    }
}
