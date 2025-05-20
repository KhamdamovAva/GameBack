<?php

namespace App\DTO;

class BannerDTO
{
    public $translations;
    public $image;
    public $url;

    public function __construct($translations, $image, $url)
    {
        $this->translations = $translations;
        $this->image = $image;
        $this->url = $url;
    }
}