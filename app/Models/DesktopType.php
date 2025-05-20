<?php

namespace App\Models;

use App\Models\Desktops\Desktop;
use Illuminate\Database\Eloquent\Model;

class DesktopType extends Model
{
    protected $fillable = [
        'user_id',
        'name'
    ];
    public function desktops(){
        return $this->hasMany(Desktop::class);
    }
}
