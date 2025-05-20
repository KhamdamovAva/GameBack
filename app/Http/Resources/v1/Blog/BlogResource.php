<?php

namespace App\Http\Resources\v1\Blog;

use App\Http\Resources\v1\AttachmentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'description' => $this->description,
            'video_url' => $this->video_url,
            'translations' => BlogTranslationResource::collection($this->whenLoaded('translations')),
            'attachments' => AttachmentResource::collection($this->whenLoaded('attachments')),
            'created_at' => $this->created_at
        ];
    }
}
