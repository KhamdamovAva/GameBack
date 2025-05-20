<?php

namespace App\DTO;

class ProductDTO
{
    public $translations;
    public $images;
    public $price;
    public $discount;
    public $brand_id;
    public $attributes;
    public $statuses;
    public $type;
    public $category_id;
    public function __construct($translations, $images, $price, $discount, $brand_id, $attributes, $statuses, $type, $category_id)
    {
        $this->translations = $translations;
        $this->images = $images;
        $this->price = $price;
        $this->discount = $discount;
        $this->brand_id = $brand_id;
        $this->attributes = $attributes;
        $this->statuses = $statuses;
        $this->type = $type;
        $this->category_id = $category_id;
    }
}
