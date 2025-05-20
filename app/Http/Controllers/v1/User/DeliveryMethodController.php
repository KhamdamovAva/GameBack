<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\DeliveryMethod\DeliveryMethodResource;
use App\Interfaces\Services\DeliveryMethodServiceInterface;

class DeliveryMethodController extends Controller
{
    public function __construct(protected DeliveryMethodServiceInterface $deliveryMethodService){

    }
    public function index()
    {
        $deliveryMethods = $this->deliveryMethodService->allDeliveryMethods();
        return $this->success(DeliveryMethodResource::collection($deliveryMethods), __('successes.delivery_method.all'));
    }

}
