<?php

namespace App\Http\Resources\v1\Product;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;
use App\Http\Resources\v1\BrandResource;
use App\Http\Resources\v1\AttachmentResource;
use App\Http\Resources\v1\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\v1\Category\CategoryResource;
use App\Http\Resources\v1\Attribute\AttributeResource;
use App\Http\Resources\v1\Product\ProductTranslationResource;

class ProductResource extends BaseResource
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
            'slug' => $this->slug,
            'description' => $this->description,
            'currency' => $request->input('Currency'),
            'price' => $currencyData['converted_price'],
            'discount' => $currencyData['converted_discount'],
            'translations' => ProductTranslationResource::collection($this->whenLoaded('translations')),
            'brand' => new BrandResource(optional($this->brand)),
            'category' => new CategoryResource(optional($this->category)),
            'statuses' => StatusResource::collection($this->whenLoaded('statuses')),
            'attributes' => AttributeResource::collection($this->whenLoaded('attributes')),
            'images' => AttachmentResource::collection($this->whenLoaded('images')),
        ];
    }

}
