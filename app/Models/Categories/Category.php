<?php

namespace App\Models\Categories;

use App\Models\User;
use App\Models\Attachment;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContact;

class Category extends Model implements TranslatableContact
{
    use Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = ['user_id', 'icon'];
    public function icon(){
        return $this->morphOne(Attachment::class, 'attachment');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
