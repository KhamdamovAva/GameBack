<?php

namespace App\Models\Reviews;

use Illuminate\Database\Eloquent\Model;

class ReviewTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'comment',
        'profession'
    ];
}
