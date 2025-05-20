<?php

namespace App\Interfaces\Repositories;

interface UserRepositoryInterface
{
    public function getUserByEmail($email);
    public function updateProfile($data, $id);
}
