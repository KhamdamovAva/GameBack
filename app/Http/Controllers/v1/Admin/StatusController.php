<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\StatusDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Status\StoreStatusRequest;
use App\Http\Requests\v1\Status\UpdateStatusRequest;
use App\Http\Resources\v1\Status\StatusResource;
use App\Interfaces\Services\StatusServiceInterface;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    //TODO qowama mentor etgan narsani locale bilan bog'liq validatsiya prablemasi
    public function __construct(protected StatusServiceInterface $statusService){

    }
    public function index()
    {
        $statuses = $this->statusService->getAllStatuses();
        return $this->success(StatusResource::collection($statuses), __('successes.sta_tus.all'));
    }

    public function store(StoreStatusRequest $request)
    {
        $statusDTO = new StatusDTO($request->translations);
        $status = $this->statusService->createStatus($statusDTO);
        return $this->success(new StatusResource($status), __('successes.sta_tus.created'), 201);
    }

    public function show(string $slug)
    {
        $status = $this->statusService->getStatus($slug);
        return $this->success(new StatusResource($status));
    }

    public function update(UpdateStatusRequest $request, string $id)
    {
        $statusDTO = new StatusDTO($request->translations);
        $updatedStatus = $this->statusService->updateStatus($statusDTO, $id);
        return $this->success(new StatusResource($updatedStatus), __('successes.sta_tus.updated'));
    }

    public function destroy(string $id)
    {
        $this->statusService->deleteStatus($id);
        return $this->success([], __('successes.sta_tus.deleted'));
    }
}
