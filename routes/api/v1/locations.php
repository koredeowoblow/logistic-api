<?php
use App\Http\Controllers\Apis\v1\Locations\StateController;
use App\Http\Controllers\Apis\v1\Locations\LocationController;
use App\Http\Controllers\Apis\v1\Locations\CountryController;
use Illuminate\Support\Facades\Route;

//state
Route::get('/states',[StateController::class, 'getAllStates']);
Route::get('/state/{id}',[StateController::class, 'getStateById']);
Route::post('/state/create',[StateController::class, 'createState']);
Route::put('/state/update/{id}',[StateController::class, 'updateState']);
Route::delete('/state/delete/{id}',[StateController::class, 'deleteState']);
Route::get('/states/search',[StateController::class, 'searchStates']);

//Country
Route::get('/countries',[CountryController::class, 'getAllCountries']);
Route::get('/country/{id}',[CountryController::class, 'getCountryById']);
Route::post('/country/create',[CountryController::class, 'createCountry']);
Route::put('/country/update/{id}',[CountryController::class, 'updateCountry']);
Route::delete('/country/delete/{id}',[CountryController::class, 'deleteCountry']);
Route::get('/countries/search',[CountryController::class, 'searchCountries']);

//Location
Route::get('/locations',[LocationController::class, 'getAllLocations']);
Route::get('/location/{id}',[LocationController::class, 'getLocationById']);
Route::post('/location/create',[LocationController::class, 'createLocation']);
Route::put('/location/update/{id}',[LocationController::class, 'updateLocation']);
Route::delete('/location/delete/{id}',[LocationController::class, 'deleteLocation']);


?>
