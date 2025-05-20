<?php

namespace App\Http\Resources\v1\DeliveryMethod;

use App\Http\Resources\v1\AttachmentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryMethodResource extends JsonResource
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
            'price' => $this->price,
            'name' => $this->name,
            'slug' => $this->slug,
            'estimated_delivery_time' => $this->estimated_delivery_time,
            'translations' => DeliveryMethodTranslationResource::collection($this->whenLoaded('translations')),
            'logo' => new AttachmentResource($this->whenLoaded('logo')),
        ];
    }
}
