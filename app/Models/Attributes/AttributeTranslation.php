<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Model;

class AttributeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
