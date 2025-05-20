<?php

namespace App\Http\Resources\v1\Status;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Product\ProductResource;

class StatusResource extends JsonResource
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
            'translations' => StatusTranslationResource::collection($this->whenLoaded('translations')),
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
