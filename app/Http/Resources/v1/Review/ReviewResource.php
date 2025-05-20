<?php

namespace App\Http\Resources\v1\Review;

use Illuminate\Http\Request;
use App\Http\Resources\v1\AttachmentResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Review\ReviewTranslationResource;

class ReviewResource extends JsonResource
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
            'fullname' => $this->fullname,
            'profession' => $this->profession,
            'comment' => $this->comment,
            'translations' => ReviewTranslationResource::collection($this->whenLoaded('translations')),
            'attachments' => AttachmentResource::collection($this->whenLoaded('attachments'))
        ];
    }
}
