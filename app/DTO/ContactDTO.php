<?php

namespace App\DTO;

class ContactDTO
{
    public $fullname;
    public $phone;
    public function __construct($fullname, $phone)
    {
        $this->fullname = $fullname;
        $this->phone = $phone;
    }
}
