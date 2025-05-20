<?php

namespace App\Http\Resources\v1\Service;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceTranslationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'locale' => $this->locale,
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->description,
            'status' => $this->status,
            'services' => $this->services,
        ];
    }
}
