<?php

namespace App\Models\Banners;

use Illuminate\Database\Eloquent\Model;

class BannerTranslation extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
    public $timestamps = false;
}
