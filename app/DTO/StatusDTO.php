<?php

namespace App\DTO;

class StatusDTO
{
    public array $translations;
    public function __construct($translations)
    {
        $this->translations = $translations;
    }
}
