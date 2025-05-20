<?php

namespace App\DTO;

class BlogDTO
{
    public $translations;
    public $image;
    public $video_url;
    public function __construct($translations, $image, $video_url)
    {
        $this->translations = $translations;
        $this->image = $image;
        $this->video_url = $video_url;
    }
}
