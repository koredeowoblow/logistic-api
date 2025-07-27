<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/test", function(){
    abort(400, "Validation errors", [
        "code" => "39",
        "data" => ["sss"]
    ]);
});