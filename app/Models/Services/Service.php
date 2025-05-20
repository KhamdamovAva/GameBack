<?php

namespace App\Models\Services;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContact;

class Service extends Model implements TranslatableContact
{
    use Translatable;
    public $translatedAttributes = [
        'name',
        'type',
        'description',
        'status',
        'services'
    ];

    protected $fillable = ['user_id', 'slug'];
    public function image(){
        return $this->morphOne(Attachment::class, 'attachment');
    }
}
