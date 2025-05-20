<?php

namespace App\Repositories;

use App\Events\AttachmentEvent;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Models\DeliveryMethods\DeliveryMethod;
use App\Interfaces\Repositories\DeliveryMethodRepositoryInterface;

class DeliveryMethodRepository implements DeliveryMethodRepositoryInterface
{
    #TODO add error handling
    public function __construct(protected AttachmentService $attachmentService)
    {
        //
    }

    public function index(){
        return DeliveryMethod::with('logo')->get();
    }
    public function show($slug){
        return DeliveryMethod::with('logo')->where('slug', $slug)->firstOrFail();
    }
    public function store($data){
        $deliveryMethod = new DeliveryMethod();
        $deliveryMethod->user_id = Auth::id();
        $deliveryMethod->slug = $data['slug'];
        $deliveryMethod->price = $data['price'];
        $deliveryMethod->fill($data['translations']);
        $deliveryMethod->estimated_delivery_time = $data['time'];
        $deliveryMethod->save();

        event(new AttachmentEvent($data['logo'], $deliveryMethod->logo()));

        return $deliveryMethod->load('logo');

    }
    public function update($data, $id){
        $deliveryMethod = $this->getById($id);
        $deliveryMethod->slug = $data['slug'];
        $deliveryMethod->price = $data['price'];
        $deliveryMethod->fill($data['translations']);
        $deliveryMethod->estimated_delivery_time = $data['time'];
        $deliveryMethod->save();
        if($data['logo'] && $deliveryMethod->logo){
            $this->attachmentService->destroy($deliveryMethod->logo);
            event(new AttachmentEvent($data['logo'], $deliveryMethod->logo()));
        }
        return $deliveryMethod->load('logo');
    }
    public function destroy($id){
        $deliveryMethod = $this->getById($id);
        $this->attachmentService->destroy($deliveryMethod->logo);
        $deliveryMethod->delete();
        return;
    }
    public function getById($id){
        return DeliveryMethod::findOrFail($id);
    }
}
