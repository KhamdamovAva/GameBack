<?php

namespace App\DTO;

class ServiceDTO
{
    public $translations;
    public $image;
    public function __construct($translations, $image)
    {
        $this->translations = $translations;
        $this->image = $image;
    }
}
