<?php

namespace App\Http\Resources\v1\Attribute;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Attribute\AttributeTranslationResource;

class AttributeResource extends JsonResource
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
            'translations' => AttributeTranslationResource::collection($this->whenLoaded('translations')),
            'value' => $this->value
        ];
    }
}
