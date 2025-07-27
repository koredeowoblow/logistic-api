<?php

namespace App\Class;

use App\Enums\StatusCodeEnums;

class ApiResponse
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function success($message, $data = [], $errors = [], $httpCode = 200){
        return response()->json([
            "status" => StatusCodeEnums::SUCCESS,
            "message" => $message,
            "data" => $data,
            "errors" => $errors
        ], $httpCode);
    }

    public static function failed($message, $data = [], $errors = [], $httpCode = 422){
        return response()->json([
            "status" => StatusCodeEnums::FAILED,
            "message" => $message,
            "data" => $data,
            "errors" => $errors
        ], $httpCode);
    }

    public static function custom($code, $message, $data = [], $errors = [], $httpCode = 200){
        return response()->json([
            "status" => $code,
            "message" => $message,
            "data" => $data,
            "errors" => $errors
        ], $httpCode);
    }
}
