<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Resources\v1\Service\ServiceResource;
use App\Http\Controllers\Controller;
use App\Interfaces\Services\ServiceInterface;


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
}
