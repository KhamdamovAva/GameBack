<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\DeliveryMethodDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\DeliveryMethod\StoreDeliveryMethodRequest;
use App\Http\Requests\v1\DeliveryMethod\UpdateDeliveryMethodRequest;
use App\Http\Resources\v1\DeliveryMethod\DeliveryMethodResource;
use App\Interfaces\Services\DeliveryMethodServiceInterface;
use Illuminate\Http\Request;

class DeliveryMethodController extends Controller
{
    public function __construct(protected DeliveryMethodServiceInterface $deliveryMethodService){

    }
    public function index()
    {
        $deliveryMethods = $this->deliveryMethodService->allDeliveryMethods();
        return $this->success(DeliveryMethodResource::collection($deliveryMethods), __('successes.delivery_method.all'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryMethodRequest $request)
    {
        $deliveryMethodDTO = new DeliveryMethodDTO($request->translations, $request->price, $request->file('logo'), $request->estimated_delivery_time);
        $deliveryMethod = $this->deliveryMethodService->storeDeliveryMethod($deliveryMethodDTO);
        return $this->success(new DeliveryMethodResource($deliveryMethod), __('successes.delivery_method.created'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $deliveryMethod = $this->deliveryMethodService->getDeliveryMethod($slug);
        return $this->success(new DeliveryMethodResource($deliveryMethod), __('successes.delivery_method.show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryMethodRequest $request, string $id)
    {
        $deliveryMethodDTO = new DeliveryMethodDTO($request->translations, $request->price, $request->file('logo'), $request->estimated_delivery_time);
        $deliveryMethod = $this->deliveryMethodService->updateDeliveryMethod($deliveryMethodDTO, $id);
        return $this->success(new DeliveryMethodResource($deliveryMethod), __('successes.delivery_method.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->deliveryMethodService->deleteDeliveryMethod($id);
        return $this->success([], __('successes.delivery_method.deleted'));
    }
}
