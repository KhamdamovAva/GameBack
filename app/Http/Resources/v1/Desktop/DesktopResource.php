<?php

namespace App\Http\Resources\v1\Desktop;

use App\Http\Resources\BaseResource;
use App\Http\Resources\v1\Attribute\AttributeResource;
use Illuminate\Http\Request;
use App\Http\Resources\v1\AttachmentResource;
use App\Http\Resources\v1\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Product\ProductResource;
use App\Http\Resources\v1\DesktopTypeResource;
use App\Http\Resources\v1\DesktopFPSResource;

class DesktopResource extends BaseResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $currencyData = $this->convertCurrency($this->price, $this->discount, strtoupper($request->input('Currency', 'UZS')));

        return [
            'id' => $this->id,
            'type' => $this->type,
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'currency' => $request->input('Currency'),
            'price' => $currencyData['converted_price'],
            'discount' => $currencyData['converted_discount'],
            'desktop_type' => new DesktopTypeResource($this->whenLoaded('desktopType')),
            'desktop_fps' => DesktopFPSResource::collection($this->whenLoaded('desktopFps')),
            'translations' => DesktopTranslationResource::collection($this->whenLoaded('translations')),
            'statuses' => StatusResource::collection($this->whenLoaded('statuses')),
            'attributes' => AttributeResource::collection($this->whenLoaded('attributes')),
            'image' => new AttachmentResource($this->whenLoaded('image'))
        ];
    }
}
