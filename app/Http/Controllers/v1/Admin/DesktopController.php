<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\DesktopDTO;
use App\Http\Requests\v1\Desktop\UpdateDesktopRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Desktop\DesktopResource;
use App\Interfaces\Services\DesktopServiceInterface;
use App\Http\Requests\v1\Desktop\StoreDesktopRequest;

class DesktopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected DesktopServiceInterface $desktopService)
    {
        //
    }
    public function index()
    {
        $desktops = $this->desktopService->allDesktops();
        return $this->success(DesktopResource::collection($desktops), __('successes.desktops.all'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDesktopRequest $request)
    {
        $desktopDTO = new DesktopDTO(
            $request->desktop_type_id,
            $request->type,
            $request->translations,
            $request['attributes'],
            $request->statuses,
            $request->file('image'),
            $request->price,
            $request->desktop_fps,
            $request->discount
        );

        $desktop = $this->desktopService->createDesktop($desktopDTO);
        return $this->success(new DesktopResource($desktop), __('successes.desktop.created'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $desktop = $this->desktopService->showDesktop($slug);
        return $this->success(new DesktopResource($desktop), __('successes.desktop.show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDesktopRequest $request, $id)
    {
        $desktopDTO = new DesktopDTO(
            $request->desktop_type_id,
            $request->type,
            $request->translations,
            $request['attributes'],
            $request->statuses,
            $request->file('image'),
            $request->price,
            $request->desktop_fps,
            $request->discount
        );

        $desktop = $this->desktopService->updateDesktop($id, $desktopDTO);
        return $this->success(new DesktopResource($desktop), __('successes.desktop.updated'), 200);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $this->desktopService->deleteDesktop($id);
        return response()->json(['message' => __('successes.desktop.deleted')], Response::HTTP_OK);
    }
}
