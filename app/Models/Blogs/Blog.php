<?php

namespace App\Models\Blogs;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as ContactTranslatable;

class Blog extends Model implements ContactTranslatable
{
    use Translatable;

    public $translatedAttributes = [
        'name',
        'description'
    ];
    protected $fillable = [
        'user_id',
        'video_url',
        'slug',
        'url'
    ];
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachment');
    }

    public function image()
    {
        return $this->attachments()->where('type', 'jpg');
    }

}
