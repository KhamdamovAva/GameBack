<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description'
    ];
}
