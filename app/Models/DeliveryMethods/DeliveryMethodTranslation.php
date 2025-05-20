<?php

namespace App\Models\DeliveryMethods;

use Illuminate\Database\Eloquent\Model;

class DeliveryMethodTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
}
