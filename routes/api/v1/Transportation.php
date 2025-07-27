<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\v1\Transportation\TransportationModeCategoryController;
use App\Http\Controllers\Apis\v1\Transportation\TransportationModelController;

Route::prefix('/TransportationModeCategory')->group(function () {
    Route::get('/', [TransportationModeCategoryController::class, "index"]);
    Route::post('/create', [TransportationModeCategoryController::class, "create"]);
    Route::get('/{id}', [TransportationModeCategoryController::class, "show"]);
    Route::put('/update/{id}', [TransportationModeCategoryController::class, "update"]);
    Route::delete('/delete/{id}', [TransportationModeCategoryController::class, 'delete']);
});
Route::prefix('/TransportationModel')->group(function () {
    Route::get('/', [TransportationModelController::class, "index"]);
    Route::post('/create', [TransportationModelController::class, "create"]);
    Route::get('/{id}', [TransportationModelController::class, "show"]);
    Route::put('/update/{id}', [TransportationModelController::class, "update"]);
    Route::delete('/delete/{id}', [TransportationModelController::class, 'delete']);
});
