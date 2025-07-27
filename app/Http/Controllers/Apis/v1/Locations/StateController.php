<?php

namespace App\Http\Controllers\Apis\v1\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Locations\StateService;
use App\Class\ApiResponse;
use App\Exceptions\FailedProcessException;
use App\Http\Resources\Locations\StateResource;
use App\Http\Requests\Locations\State\StateStoreRequest;
use App\Http\Requests\Locations\State\StateUpdateRequest;

class StateController extends Controller
{
    protected $stateService;

    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }

    public function getAllStates()
    {
        $data= $this->stateService->getAllStates();
        return ApiResponse::success('States retrieved successfully', StateResource::collection($data));

    }

    public function getStateById($id)
    {
        $data=$this->stateService->getStateById($id);
        return ApiResponse::success('State retrieved successfully', new StateResource($data));
    }

    public function deleteState($id){

        $this->stateService->deleteState($id);
        return ApiResponse::success('State deleted successfully');
    }

    public function createState(StateStoreRequest $request)
    {
        $data = $request->validated();
        $data = $this->stateService->createState($data);
        return ApiResponse::success('State created successfully', new StateResource($data));
    }

    public function updateState(StateUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $data = $this->stateService->updateState($id, $data);
        return ApiResponse::success('State updated successfully', new StateResource($data));
    }

    public function searchStates(Request $request)
    {
        $param = $request->input('search');
        $data = $this->stateService->searchStates($param);
        return ApiResponse::success('States retrieved successfully', StateResource::collection($data));
    }

}
