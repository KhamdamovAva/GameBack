<?php

namespace App\DTO;

class AttributeDTO
{
    public $value;
    public $translations;
    public $user_id;
    public function __construct($value, $translations, $user_id)
    {
        $this->value = $value;
        $this->translations = $translations;
        $this->user_id = $user_id;
    }
}
