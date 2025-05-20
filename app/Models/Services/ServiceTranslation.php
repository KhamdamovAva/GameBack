<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'type',
        'description',
        'status',
        'services'
    ];
}
