<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\ServiceDTO;
use App\Http\Resources\v1\Service\ServiceResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Services\ServiceInterface;
use App\Http\Requests\v1\Service\StoreServiceRequest;
use App\Http\Requests\v1\Service\UpdateServiceRequest;

class ServiceController extends Controller
{
    public function __construct(protected ServiceInterface $serviceInterface){

    }
    public function index(){
        $services = $this->serviceInterface->allServices();
        return $this->responsePagination($services, ServiceResource::collection($services), __('successes.service.all'));
    }
    public function show($slug){
        $service = $this->serviceInterface->getService($slug);
        return $this->success(new ServiceResource($service), __('successes.service.show'));
    }
    public function store(StoreServiceRequest $request){
        $serviceDTO = new ServiceDTO($request->translations, $request->file('image'));
        $service = $this->serviceInterface->storeService($serviceDTO);
        return $this->success(new ServiceResource($service), __('successes.service.created'), 201);
    }
    public function update(UpdateServiceRequest $request, $id){
        $serviceDTO = new ServiceDTO($request->translations, $request->file('image'));
        $updatedService = $this->serviceInterface->updateService($serviceDTO, $id);
        return $this->success(new ServiceResource($updatedService), __('successes.service.updated'));
    }
    public function destroy($id){
        $this->serviceInterface->deleteService($id);
        return $this->success([], __('successes.service.deleted'));
    }
}
