<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Traits\ResponseTrait;
use App\Traits\TranslationTrait;

class BaseService
{
    use ResponseTrait, TranslationTrait;
    protected function generateSlug(string $name, string $model, string $column = 'slug'): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;
        while ($model::where($column, $slug)->exists()) {
            $slug = sprintf('%s-%d', $originalSlug, $count);
            $count++;
        }
        return $slug;

    }
    protected function detectItemType($itemId)
    {
        $models = [
            'App\Models\Products\Product',
            'App\Models\Desktops\Desktop'
        ];

        foreach ($models as $model) {
            if ($model::where('id', $itemId)->exists()) {
                return $model;
            }
        }

        throw new \Exception("Item type not found for item ID: $itemId");
    }

}
