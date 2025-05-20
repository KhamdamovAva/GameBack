<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Status\StatusResource;
use App\Interfaces\Services\StatusServiceInterface;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct(protected StatusServiceInterface $statusService){

    }
    public function index(){
        $statuses = $this->statusService->getAllStatuses();
        return $this->success(StatusResource::collection($statuses), __('successes.sta_tus.all'));
    }
}
