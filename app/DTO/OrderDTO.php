<?php

namespace App\DTO;

class OrderDTO
{
    public $fullname;
    public $phone;
    public $delivery_method_id;
    public $address;
    public $comment;
    public $items;
    public function __construct($fullname, $phone, $delivery_method_id, $address, $comment, $items)
    {
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->delivery_method_id = $delivery_method_id;
        $this->address = $address;
        $this->comment = $comment;
        $this->items = $items;
    }
}
