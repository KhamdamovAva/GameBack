<?php

namespace App\Models\DeliveryMethods;

use App\Models\Attachment;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContact;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model implements TranslatableContact
{
    use Translatable;
    public $translatedAttributes = [
        'name'
    ];
    protected $fillable = [
        'user_id',
        'price',
        'estimated_delivery_time',
    ];
    public function logo(){
        return $this->morphOne(Attachment::class, 'attachment');
    }
}
