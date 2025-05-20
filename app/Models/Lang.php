<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    protected $fillable = ['locale'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
