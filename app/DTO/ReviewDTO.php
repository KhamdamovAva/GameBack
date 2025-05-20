<?php

namespace App\DTO;

class ReviewDTO
{
    public $translations;
    public $fullname;
    public $image;
    public $video;
    public function __construct($translations, $fullname, $image, $video)
    {
        $this->translations = $translations;
        $this->fullname = $fullname;
        $this->image = $image;
        $this->video = $video;
    }
}
