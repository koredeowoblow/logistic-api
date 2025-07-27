<?php

namespace App\Http\Controllers\Apis\v1\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Locations\LocationService;
use App\Class\ApiResponse;
use App\Exceptions\FailedProcessException;
use App\Http\Resources\Locations\LocationResource;
use App\Http\Requests\Locations\Location\LocationStoreRequest;
use App\Http\Requests\Locations\Location\LocationUpdateRequest;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function getAllLocations()
    {
        $data= $this->locationService->getAllLocations();
        return ApiResponse::success('Locations retrieved successfully', LocationResource::collection($data));

    }

    public function getLocationById($id)
    {
        $data=$this->locationService->getLocationById($id);
        return ApiResponse::success('Location retrieved successfully', new LocationResource($data));
    }

    public function deleteLocation($id){

        $this->locationService->deleteLocation($id);
        return ApiResponse::success('Location deleted successfully');
    }

    public function createLocation(LocationStoreRequest $request)
    {
        $data = $request->validated();
        $data = $this->locationService->createLocation($data);
        return ApiResponse::success('Location created successfully', new LocationResource($data));
    }

    public function updateLocation(LocationUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $data = $this->locationService->updateLocation($id, $data);
        return ApiResponse::success('Location updated successfully', new LocationResource($data));
    }

    public function searchLocations(Request $request)
    {
        $param = $request->input('search');
        $data = $this->locationService->searchLocations($param);
        return ApiResponse::success('Locations retrieved successfully', LocationResource::collection($data));
    }

}
