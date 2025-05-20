<?php

namespace App\Models;

use App\Models\Desktops\Desktop;
use Illuminate\Database\Eloquent\Model;

class DesktopFPS extends Model
{
    protected $fillable = [
        'user_id',
        'game_id',
        'resolution',
        'fps_value'
    ];
    protected $casts = [
        'fps' => 'array',
    ];
    public function image(){
        return $this->morphOne(Attachment::class, 'attachment');
    }
    public function desktops(){
        return $this->belongsToMany(Desktop::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
}
