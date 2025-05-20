<?php

namespace App\Models;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
