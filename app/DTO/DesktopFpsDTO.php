<?php

namespace App\DTO;

class DesktopFpsDTO
{
    public $fps;
    public function __construct($fps)
    {
        $this->fps = $fps;
    }
}
