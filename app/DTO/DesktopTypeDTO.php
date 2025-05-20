<?php

namespace App\DTO;

class DesktopTypeDTO
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}
