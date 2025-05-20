<?php

namespace App\Models\Reviews;

use App\Models\Attachment;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContact;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Review extends Model implements TranslatableContact
{
    use Translatable;

    public $translatedAttributes = [
        'comment',
        'profession'
    ];
    protected $fillable = [
        'user_id',
        'slug',
        'fullname'
    ];

    public function attachments(){
        return $this->morphMany(Attachment::class, 'attachment');
    }
    public function image(){
        return $this->attachments()->where('type', 'jpg');
    }
    public function video(){
        return $this->attachments()->where('type', 'mp4');
    }
}
