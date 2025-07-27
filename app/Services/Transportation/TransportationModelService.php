<?php

namespace App\Services\Transportation;

use App\Enums\StatusCodeEnums;
use App\Exceptions\FailedProcessException;
use App\Services\BaseService;
use App\Repositories\Transportations\TransportationModelRepository;

use App\Repositories\Transportations\TransportationCategoryRepository;

class TransportationModelService extends BaseService
{
    public $TransportationModel;
    public $TransportationMode;
    public function __construct(TransportationModelRepository $transportationModelRepository, TransportationCategoryRepository $transportationMode)
    {

        $this->TransportationModel = $transportationModelRepository;
        $this->TransportationMode = $transportationMode;
    }

    public function All()
    {
        $resp = $this->TransportationModel->all();
        return $resp;
    }

    public function create($reqData)
    {
        $resp = $this->TransportationModel->create($reqData);
        if (blank($resp)) {
            throw new FailedProcessException("Transportation Model Creation Failed", StatusCodeEnums::FAILED);
        }
        return $resp;
    }

    public function findbyId($id)
    {
        $resp = $this->TransportationModel->findById($id);
        return $resp;
    }

    public function update($reqData, $id)
    {

        $resp = $this->TransportationModel->update($id, $reqData);
        return $resp;
    }

    public function delete($id)
    {
        $resp = $this->TransportationModel->delete($id);
        return $resp;
    }
}
