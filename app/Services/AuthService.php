<?php

namespace App\Services;

use App\Enums\UserEnums;
use App\Repositories\AdminRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AuthService
{
    public $userRepo;
    public $adminRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->adminRepo = new AdminRepository;
    }

    public function createUserAccount($data){
        $data["status"] = UserEnums::ACTIVE;
        $resp = $this->userRepo->create($data);
        return $resp;
    }

    public function userLogin($data){
        $user = $this->userRepo->findByEmail($data["email"]);
        if(!$user)
            abort(401, "Invalid login details");
        if(!Hash::check($data["password"], $user->password))
            abort(401, "Invalid login details");
        $this->userRepo->update($user->id, [
            "last_login" => now()->toDateTime()
        ]);
        $token = $this->userRepo->createAccessToken($user, UserEnums::tokenIdentifier($user->id));
        $user->token = $token;
        return $user;
    }

    public function adminLogin($data){
        $admin = $this->adminRepo->findByEmail($data["email"]);
        if(!$admin)
            abort(401, "Invalid login details");
        if(!Hash::check($data["password"], $admin->password))
            abort(401, "Invalid login details");
        //Send Admin login notification
        $this->adminRepo->update($admin->id, [
            "last_login" => now()->toDateTime()
        ]);
        $token = $this->adminRepo->createAccessToken($admin, UserEnums::adminTokenIdentifier($admin->id));
        $admin->token = $token;
        return $admin;
    }

    public function userLogout(){
        $user = auth()->user();
        $this->userRepo->revokeAccessToken($user);
        return $user;
    }
}
