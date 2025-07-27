<?php

namespace App\Services\Transportation;

use App\Services\BaseService;

use App\Exceptions\FailedProcessException;
use App\Enums\StatusCodeEnums;
use App\Repositories\Transportations\TransportationCategoryRepository;

class TransportationModeCategoryService extends BaseService
{
    public $TransportationCategory;
    public function __construct(TransportationCategoryRepository $TransportationCategory)
    {
        $this->TransportationCategory =  $TransportationCategory;
    }

    public function All()
    {
        $resp = $this->TransportationCategory->all();
        return $resp;
    }

    public function create($reqData)
    {
        // Check for duplicate slug
        $slugExists = $this->TransportationCategory->findData("slug", $reqData['slug']);
        if (!blank($slugExists)) {
            throw new FailedProcessException('Slug already exists', StatusCodeEnums::FAILED);
        }


        $nameExists = $this->TransportationCategory->findData("name", $reqData['name']);
        if (!blank($nameExists)) {
            throw new FailedProcessException('Name already exists', StatusCodeEnums::FAILED);
        }

        // Create new record
        return $this->TransportationCategory->create($reqData);
    }

    public function findbyId($id)
    {
        $resp = $this->TransportationCategory->findById($id);
        if (blank($resp)) {
            throw new FailedProcessException("Transportation Mode not Found", StatusCodeEnums::FAILED);
        }
        return $resp;
    }

    public function update($id, $reqData)
    {
        $mode = $this->TransportationCategory->findById($id);

        if (blank($mode)) {
            throw new FailedProcessException("Transportation Mode not Found", StatusCodeEnums::FAILED);
        }

        $resp = $this->TransportationCategory->update($id, $reqData); // ✅ Fixed order

        if (blank($resp)) {
            throw new FailedProcessException("Transportation Mode Update Failed", StatusCodeEnums::FAILED);
        }

        return $resp;
    }


    public function delete($id)
    {
        $resp = $this->TransportationCategory->delete($id);
        if (!$resp) {
            throw new FailedProcessException("Transportation Mode Deletion Failed", StatusCodeEnums::FAILED);
        }
        return $resp;
    }
}
