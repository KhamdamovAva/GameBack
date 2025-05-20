<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'type' => $this->data['type'],
            'message' => $this->data['message'],
            'contact_id' => $this->data['contact_id'] ?? ($this->data['order_id'] ?? null),
            'created_at' => $this->created_at,
            'read_at' => $this->read_at
        ];
    }
}
