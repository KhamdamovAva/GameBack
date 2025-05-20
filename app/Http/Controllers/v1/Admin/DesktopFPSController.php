<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\DesktopFpsDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\DesktopFPS\StoreDesktopFPSRequest;
use App\Http\Requests\v1\DesktopFPS\UpdateDesktopFPSRequest;
use App\Http\Resources\v1\DesktopFPSResource;
use App\Interfaces\Services\DesktopFpsServiceInterface;
use Illuminate\Http\Request;

class DesktopFPSController extends Controller
{
    public function __construct(protected DesktopFpsServiceInterface $desktopFpsService){

    }
    public function index()
    {
        $allFps = $this->desktopFpsService->allDesktopFps();
        return $this->success(DesktopFPSResource::collection($allFps), __('successes.desktop_fps.all'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDesktopFPSRequest $request)
    {
        $fpsDTO = new DesktopFpsDTO($request->fps);
        $fps = $this->desktopFpsService->storeFps($fpsDTO);
        return $this->success(new DesktopFPSResource($fps), __('successes.desktop_fps.created'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fps = $this->desktopFpsService->getFps($id);
        return $this->success(new DesktopFPSResource($fps), __('successes.desktop_fps.show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDesktopFPSRequest $request, string $id)
    {
        $fpsDTO = new DesktopFpsDTO($request->fps);
        $fps = $this->desktopFpsService->updateFps($fpsDTO, $id);
        return $this->success(new DesktopFPSResource($fps), __('successes.desktop_fps.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->desktopFpsService->deleteFps($id);
        return $this->success([], __('successes.desktop_fps.deleted'));
    }
}
