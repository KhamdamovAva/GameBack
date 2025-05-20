<?php

namespace App\Http\Resources\v1\Attribute;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttributeTranslationResource extends JsonResource
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
            'name' => $this->name
        ];
    }
}
