<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Interfaces\Services\UserServiceInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserService extends BaseService implements UserServiceInterface
{

    public function __construct(protected UserRepositoryInterface $userRepository)
    {
        //
    }
    public function loginUser($data){
        $user = $this->userRepository->getUserByEmail($data['email']);
        if(!$user || !Hash::check($data['password'], $user->password)){
            return $this->error(__('errors.user.not_found'), 404);
        }
        if($user->email_verified_at == null){
            return $this->error(__('errors.email.not_verified'), 403);
        }
        return $user->createToken('login')->plainTextToken;

    }
    public function editProfile($userDTO, $id){
        $data = [
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'phone' => $userDTO->phone,
            'password' => $userDTO->password
        ];
        return $this->userRepository->updateProfile($data,$id);
    }


}
