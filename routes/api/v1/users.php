<?php

use App\Http\Controllers\Apis\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(["auth:sanctum", "auth.admin"])->group(function(){
    Route::get("", [ UserController::class, "all" ]);
    Route::get("/{user}", [UserController::class, "show"]);
});