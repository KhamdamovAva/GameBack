<?php

namespace App\DTO;

class LangDTO
{
    public $locale;
    public function __construct($locale)
    {
        $this->locale = $locale;
    }
}
