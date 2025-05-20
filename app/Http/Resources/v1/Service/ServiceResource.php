<?php

namespace App\Http\Resources\v1\Service;

use App\Http\Resources\v1\AttachmentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'type' => $this->type,
            'description' => $this->description,
            'status' => $this->status,
            'services' => $this->services,
            'translations' => ServiceTranslationResource::collection($this->whenLoaded('translations')),
            'image' => new AttachmentResource($this->whenLoaded('image'))
        ];
    }
}
