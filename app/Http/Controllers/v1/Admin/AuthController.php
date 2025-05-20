<?php

namespace App\Http\Controllers\v1\Admin;

use App\DTO\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Auth\LoginRequest;
use App\Http\Requests\v1\Auth\UpdateProfileRequest;
use App\Http\Resources\v1\UserResource;
use App\Interfaces\Services\UserServiceInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected UserServiceInterface $userService){

    }
    public function login(LoginRequest $request){
        $token = $this->userService->loginUser($request->all());
        return $this->success($token, __('successes.admin.logged'));
    }
    public function getUser(){
        return $this->success(new UserResource(request()->user()));
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return $this->success([], __('successes.admin.logged_out'));
    }
    public function updateProfile(UpdateProfileRequest $request, $id){
        $userDTO = new UserDTO($request->name, $request->email, $request->password, $request->phone);
        $user = $this->userService->editProfile($userDTO, $id);
        return $this->success(new UserResource($user), __('successes.admin.profile.updated'));
    }
}
