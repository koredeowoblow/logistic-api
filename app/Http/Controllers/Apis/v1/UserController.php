<?php

namespace App\Http\Controllers\Apis\v1;

use App\Class\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct(
        private UserService $userService
    )
    {
        
    }
    public function all(Request $request){
        $resp = $this->userService->getAllUsers($request->except("page"));
        return ApiResponse::success("Users fetched",  UserResource::collection($resp)->response()->getData(true));
    }

    public function show(Request $request, User $user){
        $resp = $this->userService->getSingleUser($user->id);
        return ApiResponse::success("User fetched", new UserResource($resp));
    }
}
