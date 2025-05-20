<?php

namespace App\Interfaces\Services;

interface UserServiceInterface
{
    public function loginUser($data);
    public function editProfile($userDTO, $id);

}
