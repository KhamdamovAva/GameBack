<?php

namespace App\Models\Desktops;

use Illuminate\Database\Eloquent\Model;

class DesktopTranslation extends Model
{
    public $timestemps = false;

    protected $fillable = [
        'name',
        'description'
    ];
}
