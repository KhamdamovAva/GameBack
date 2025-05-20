<?php

namespace App\Models\Banners;

use App\Models\User;
use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContact;

class Banner extends Model implements TranslatableContact
{
    use Translatable;
    protected $fillable = [
        'user_id',
        'url',
        'slug'
    ];
    public $translatedAttributes =
    [
        'name',
        'description',
    ];
    public function image(){
        return $this->morphOne(Attachment::class, 'attachment');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
