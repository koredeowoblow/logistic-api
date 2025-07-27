<?php

namespace App\Http\Controllers\Apis\v1;

use App\Class\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Resources\AdminResource;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function __construct(private AuthService $authService)
    {
        
    }
    
    public function signup(SignupRequest $request){
        $validData = $request->validated();
        $resp = $this->authService->createUserAccount($validData);
        return ApiResponse::success("Account created successfully", new UserResource($resp));
    }

    public function login(LoginRequest $request){
        $validData = $request->validated();
        $resp = $this->authService->userLogin($validData);
        return ApiResponse::success("Login successful", new UserResource($resp));
    }

    public function adminLogin(LoginRequest $request){
        $data = $request->validated();
        $resp = $this->authService->adminLogin($data);
        return ApiResponse::success("Login successful", new AdminResource($resp));
    }

    public function logout(Request $request){
        $this->authService->userLogout();
        return ApiResponse::success("User logged out successfully");
    }
}
