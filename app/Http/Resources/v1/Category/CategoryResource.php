<?php

namespace App\Http\Resources\v1\Category;

use Illuminate\Http\Request;
use App\Http\Resources\v1\AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Product\ProductResource;
use App\Http\Resources\v1\Category\CategoryTranslationResource;

class CategoryResource extends JsonResource
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
            'translations' => CategoryTranslationResource::collection($this->whenLoaded('translations')),
            'icon' => new AttachmentResource($this->whenLoaded('icon')),
            'products' => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
