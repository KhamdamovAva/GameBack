<?php

namespace App\DTO;

class UserDTO
{
    /**
     * Create a new class instance.
     */
    public $name;
    public $email;
    public $phone;
    public $password;
    public function __construct($name, $email, $password, $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }
}
