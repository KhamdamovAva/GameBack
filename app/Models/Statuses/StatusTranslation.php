<?php

namespace App\Models\Statuses;

use Illuminate\Database\Eloquent\Model;

class StatusTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'locale'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($translation) {
            $translation->name = mb_convert_case(trim($translation->name), MB_CASE_TITLE, "UTF-8");
        });
    }

}
