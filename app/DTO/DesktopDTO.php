<?php

namespace App\DTO;

class DesktopDTO
{
    public $desktop_type_id;
    public $type;
    public $translations;
    public $attributes;
    public $statuses;
    public $image;
    public $price;
    public $desktopFPS;
    public $discount;
    public function __construct($desktop_type_id, $type, $translations, $attributes, $statuses, $image, $price, $desktopFPS, $discount)
    {
        $this->desktop_type_id = $desktop_type_id;
        $this->type = $type;
        $this->translations = $translations;
        $this->attributes = $attributes;
        $this->statuses = $statuses;
        $this->image = $image;
        $this->price = $price;
        $this->desktopFPS = $desktopFPS;
        $this->discount = $discount;
    }
}
