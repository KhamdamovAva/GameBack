<?php

namespace App\Http\Controllers\v1\User;

use App\DTO\DesktopTypeDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\DesktopTypeResource;
use App\Interfaces\Services\DesktopTypeServiceInterface;
use App\Http\Requests\v1\DesktopType\StoreDesktopTypeRequest;
use App\Http\Requests\v1\DesktopType\UpdateDesktopTypeRequest;

class DesktopTypeController extends Controller
{
    public function __construct(protected DesktopTypeServiceInterface $desktopTypeService){

    }
    public function index(){
        $desktopTypes = $this->desktopTypeService->allDesktopTypes();
        return $this->success(DesktopTypeResource::collection($desktopTypes), __('successes.desktop_type.all'));
    }
    public function show(string $slug){
        $desktopType = $this->desktopTypeService->getDesktopType($slug);
        return $this->success(new DesktopTypeResource($desktopType), __('successes.desktop_type.show'));
    }
}
