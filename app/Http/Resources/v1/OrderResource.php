<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'phone' => $this->phone,
            'delivery_method_id' => $this->delivery_method_id,
            'address' => $this->address,
            'comment' => $this->comment,
            'status' => $this->status,
            'items' => optional($this->items)->map(function ($item) {
                return [
                    'id' => $item->item_id,
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ];
            }) ?? [],


        ];
    }
}
