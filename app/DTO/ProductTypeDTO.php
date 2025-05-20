<?php

namespace App\DTO;

class ProductTypeDTO
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}
