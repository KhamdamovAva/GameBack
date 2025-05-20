<?php

namespace App\Models\Desktops;

use App\Models\Game;
use App\Models\Attachment;
use App\Models\DesktopFPS;
use App\Models\DesktopType;
use App\Models\Statuses\Status;
use App\Models\Orders\OrderItem;
use App\Models\Products\Product;
use App\Models\Attributes\Attribute;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContact;

class Desktop extends Model implements TranslatableContact
{
    use Translatable;

    public $translatedAttributes = [
        'name',
        'description'
    ];
    protected $fillable = [
        'user_id',
        'desktop_type_id',
        'type',
        'price',
        'attributes',
        'images',
        'statuses',
        'desktop_fps',
        'discount'
    ];
    public function attributes(){
        return $this->belongsToMany(Attribute::class);
    }
    public function statuses(){
        return $this->belongsToMany(Status::class);
    }
    public function desktopType(){
        return $this->belongsTo(DesktopType::class);
    }
    public function desktopFps(){
        return $this->belongsToMany(DesktopFPS::class);
    }
    public function image(){
        return $this->morphOne(Attachment::class, 'attachment');
    }
    public function orderItems()
    {
        return $this->morphMany(OrderItem::class, 'item');
    }
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
