<?php

namespace App\Repositories\Transportations;

use App\Repositories\IRepository;
use App\Models\Transportations\TransportationModeCategory;
use App\Exceptions\FailedProcessException;
use App\Enums\StatusCodeEnums;

class  TransportationCategoryRepository implements IRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function all()
    {
        $data = TransportationModeCategory::query()->paginate();
        return $data;
    }


    public function findById($id)
    {
        $data = TransportationModeCategory::find($id);
        return $data;
    }

    public function create($data)
    {
        $rec = TransportationModeCategory::create($data);
        return $rec;
    }

    public function update($id, $data)
    {
        $record = TransportationModeCategory::find($id);
        if (!$record) {
            return null;
        }

        $record->update($data);  // updates the fields
        return $record;          // returns the model instance
    }



    public function delete($id)
    {
        $rec = TransportationModeCategory::where("id", $id)->delete();
        return $rec;
    }

    public function search($param)
    {
        $rec = TransportationModeCategory::query()
            ->where("name", "LIKE", "%$param%")
            ->orWhere("slug", "LIKE", "%$param%")
            ->orWhere("description", "=", $param)
            ->orWhere("status", "LIKE", "%$param%")
            ->get();
        return $rec;
    }
    public function findData($column, $data)
    {
        $rec = TransportationModeCategory::query()->where($column, $data)->get();
        return $rec;
    }
}
