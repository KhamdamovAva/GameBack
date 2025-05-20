<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getUserByEmail($email){
        $user = User::where('email', $email)->firstOrFail();
        return $user;
    }
    public function updateProfile($data, $id){
        $user = User::findOrFail($id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = bcrypt($data['password']);

        $user->save();
        return $user;
    }


}
