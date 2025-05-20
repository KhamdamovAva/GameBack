<?php

namespace App\DTO;

class CategoryDTO
{
    public $icon;
    public $translations;
    public $user_id;
    public function __construct($icon, $translations, $user_id)
    {
        $this->icon = $icon;
        $this->translations = $translations;
        $this->user_id = $user_id;
    }
}
