<?php

namespace App\Repositories;

use App\Events\AttachmentEvent;
use App\Models\Services\Service;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Repositories\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AttachmentService $attachmentService)
    {
        //
    }
    public function index(){
        return Service::with('image')->paginate(8);
    }
    public function show($slug){
        return Service::where('slug', $slug)->with('image')->firstOrFail();
    }
    public function store($data){
        $service = new Service();
        $service->user_id = Auth::id();
        $service->fill($data['translations']);
        $service->slug = $data['slug'];
        $service->save();

        event(new AttachmentEvent($data['image'], $service->image()));

        return $service->load('image');
    }
    public function update($data, $id){
        $service = $this->getById($id);
        $service->fill($data['translations']);
        $service->slug = $data['slug'];
        $service->save();
        if($data['image'] && $service->image){
            $this->attachmentService->destroy($service->image);
            event(new AttachmentEvent($data['image'], $service->image()));
        }

        return $service->load('image');
    }
    public function delete($id){
        $service = $this->getById($id);
        if(!empty($service->image)){
            $this->attachmentService->destroy($service->image);
        }
        $service->delete();
        return;
    }
    public function getById($id){
        return Service::findOrFail($id);
    }
}
