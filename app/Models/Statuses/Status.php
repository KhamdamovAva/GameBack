<?php

namespace App\Models\Statuses;

use App\Models\User;
use App\Models\Desktops\Desktop;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Status extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = [
        'name'
    ];
    protected $fillable = [
        'user_id'
    ];
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public function desktops(){
        return $this->belongsToMany(Desktop::class);
    }
}
