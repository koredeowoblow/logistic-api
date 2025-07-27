<?php

use App\Http\Controllers\Apis\v1\AuthController;
use Illuminate\Support\Facades\Route;

Route::post("/register", [AuthController::class, "signup"]);
Route::post("/login", [AuthController::class, "login"]);

Route::prefix("admin")->group(function(){
    Route::post("/login", [AuthController::class, "adminLogin"]);
});
Route::middleware("auth:sanctum")->group(function(){
    Route::post("logout", [AuthController::class, "logout"]);
});
