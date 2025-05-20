<?php

namespace App\Http\Controllers\v1\Admin;


use App\DTO\AttributeDTO;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\v1\Attribute\AttributeResource;
use App\Interfaces\Services\AttributeServiceInterface;
use App\Http\Requests\v1\Attribute\StoreAttributeRequest;
use App\Http\Requests\v1\Attribute\UpdateAttributeRequest;

class AttributeController extends Controller
{

    public function __construct(protected AttributeServiceInterface $attributeService){

    }
    public function index()
    {
        $attributes = $this->attributeService->getAllAttributes();
        return $this->success(AttributeResource::collection($attributes), __('successes.attribute.all'));
    }

    public function store(StoreAttributeRequest $request)
    {
        $attributeDTO = new AttributeDTO($request->value, $request->translations, Auth::id());
        $attribute = $this->attributeService->createAttribute($attributeDTO);
        return $this->success(new AttributeResource($attribute), __('successes.attribute.created'), 201);
    }


    public function show(string $id)
    {
        $attribute = $this->attributeService->getAttribute($id);
        return $this->success(new AttributeResource($attribute), __('successes.attribute.show'));

    }

    public function update(UpdateAttributeRequest $request, string $id)
    {
        $attributeDTO = new AttributeDTO($request->value, $request->translations, Auth::id());
        $attribute = $this->attributeService->updateAttribute($attributeDTO, $id);
        return $this->success(new AttributeResource($attribute), __('successes.attribute.updated'));

    }

    public function destroy(string $id)
    {
        $this->attributeService->deleteAttribute($id);
        return $this->success([], __('successes.attribute.deleted'));
    }
}
