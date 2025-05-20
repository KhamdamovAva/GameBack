<?php

namespace App\Models\Attributes;

use App\Models\Desktops\Desktop;
use App\Models\Products\Product;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContact;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model implements TranslatableContact
{
    use Translatable;
    public $translatedAttributes = [
        'name'
    ];
    protected $fillable = ['value', 'user_id'];
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function desktops(){
        return $this->belongsToMany(Desktop::class);
    }
}
