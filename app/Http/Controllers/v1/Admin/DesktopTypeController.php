<?php

namespace App\Http\Controllers\v1\Admin;

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
    public function store(StoreDesktopTypeRequest $request){
        $desktopTypeDTO = new DesktopTypeDTO($request->name);
        $desktopType = $this->desktopTypeService->storeDesktopType($desktopTypeDTO);
        return $this->success(new DesktopTypeResource($desktopType), __('successes.desktop_type.created'), 201);
    }
    public function update(UpdateDesktopTypeRequest $request, $id){
        $desktopTypeDTO = new DesktopTypeDTO($request->name);
        $updatedDesktopType = $this->desktopTypeService->updateDesktopType($desktopTypeDTO, $id);
        return $this->success(new DesktopTypeResource($updatedDesktopType), __('successes.desktop_type.updated'));
    }
    public function destroy($id){
        $this->desktopTypeService->deletedesktopType($id);
        return $this->success([], __('successes.desktop_type.deleted'));
    }
}
