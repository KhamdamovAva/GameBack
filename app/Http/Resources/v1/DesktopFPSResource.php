<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class DesktopFPSResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $fpsCollection = new Collection([$this->resource]);
        return [
            'id' => $this->id,
            'fps' => $fpsCollection->mapWithKeys(function ($item) {
                return [$item->resolution => (int) $item->fps_value];
            }),
            'game' => new GameResource($this->whenLoaded('game'))
        ];
    }

}
