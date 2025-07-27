<?php

namespace App\Http\Controllers\Apis\v1\Transportation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Class\ApiResponse;
use App\Http\Requests\Transportations\TransportationModelRequest;
use App\Http\Requests\Transportations\UpdateTransportationModelRequest;
use App\Services\Transportation\TransportationModelService;
use App\Http\Resources\Transportations\TransportationModeResource;

class TransportationModelController extends Controller
{
    //    public $TransportationModeCategory;
    public function __construct(private TransportationModelService $transportationModelService) {}
    public function index(Request $request)
    {
        $data = $this->transportationModelService->All(['category']);
        return ApiResponse::success(
            "All Transportation Models fetched successfully.",
            TransportationModeResource::collection($data)
        );
    }


    public function create(TransportationModelRequest $request)
    {
        $data = $this->transportationModelService->create($request->validated());
        return ApiResponse::success("Transportation Model created successfull", new TransportationModeResource($data));
    }
    public function show($id)
    {
        $data = $this->transportationModelService->findbyId($id);
        return ApiResponse::success("Transportation Model Found Successfully", new TransportationModeResource($data));
    }
    public function find(Request $request)
    {
        $data = $this->transportationModelService->findbyId($request);


        return Apiresponse::success("Transportation Model Found Successfully", new TransportationModeResource($data));
    }
    public function update(UpdateTransportationModelRequest $request, $id)
    {
        $data = $this->transportationModelService->update($request->validated(), $id);

        return ApiResponse::success("Transportation Model Updated sucessfully", new TransportationModeResource($data));
    }
    public function delete($id)
    {
        $data = $this->transportationModelService->delete($id);


        return ApiResponse::success("Transportation Model Deleted");
    }
}
