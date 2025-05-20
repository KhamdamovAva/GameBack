<?php

namespace App\DTO;

class DeliveryMethodDTO
{
    public $translations;
    public $price;
    public $logo;
    public $estimated_delivery_time;
    public function __construct($translations, $price, $logo, $estimated_delivery_time)
    {
        $this->translations = $translations;
        $this->price = $price;
        $this->logo = $logo;
        $this->estimated_delivery_time = $estimated_delivery_time;
    }
}
