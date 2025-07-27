<?php

namespace App\Http\Controllers\Apis\v1\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Locations\CountryService;
use App\Class\ApiResponse;
use App\Exceptions\FailedProcessException;
use App\Http\Resources\Locations\CountryResource;
use App\Http\Requests\Locations\Country\CountryStoreRequest;
use App\Http\Requests\Locations\Country\CountryUpdateRequest;


class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function getAllCountries()
    {
        $data = $this->countryService->getAllCountries();
        return ApiResponse::success('Countries retrieved successfully', CountryResource::collection($data));
    }

    public function getCountryById($id)
    {
        $data = $this->countryService->getCountryById($id);
        return ApiResponse::success('Country retrieved successfully', new CountryResource($data));
    }

    public function deleteCountry($id)
    {
        $this->countryService->deleteCountry($id);
        return ApiResponse::success('Country deleted successfully');
    }

    public function createCountry(CountryStoreRequest $request)
    {
        $data = $request->validated();
        $data = $this->countryService->createCountry($data);
        return ApiResponse::success('Country created successfully', new CountryResource($data));
    }

    public function updateCountry(CountryUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $data = $this->countryService->updateCountry($id, $data);
        return ApiResponse::success('Country updated successfully', new CountryResource($data));
    }

    public function searchCountries(Request $request)
    {
        $param = $request->input('search');
        $data = $this->countryService->searchCountries($param);
        return ApiResponse::success('Countries retrieved successfully', CountryResource::collection($data));
    }
}
