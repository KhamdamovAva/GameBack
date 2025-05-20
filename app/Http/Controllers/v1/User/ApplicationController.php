<?php

namespace App\Http\Controllers\V1\api\User;

use App\DTO\ApplicationDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationStoreRequest;
use App\Interfaces\Services\ApplicationServiceInterface;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    use ResponseTrait;
    public function __construct(protected ApplicationServiceInterface $applicationService){}
    public function create(ApplicationStoreRequest $request){
       $appDTO = new ApplicationDTO($request->name,$request->number);
       $app = $this->applicationService->create($appDTO);
       return $this->success([],__('successes.applications.created'));
    }
}
