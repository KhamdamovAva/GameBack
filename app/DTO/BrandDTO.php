<?php

namespace App\DTO;

class BrandDTO
{
    public $name;
    public $user_id;

    public function __construct($name, $user_id)
    {
        $this->name = $name;
        $this->user_id = $user_id;
    }
}
