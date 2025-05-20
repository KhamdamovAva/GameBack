<?php

namespace App\Http\Resources\v1\Banner;

use Illuminate\Http\Request;
use App\Models\Banners\BannerTranslation;
use App\Http\Resources\v1\AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'url' => $this->url,
            'translations' => BannerTranslationResource::collection($this->whenLoaded('translations')),
            'image' => new AttachmentResource($this->whenLoaded('image')),
        ];
    }
}
