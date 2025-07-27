<?php

namespace App\Repositories\Transportations;

use App\Repositories\IRepository;
use App\Models\Transportations\TransportMode;

class  TransportationModelRepository implements IRepository
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
        $data = TransportMode::with('category')->paginate(pageCount()); // eager-load category
        return $data;
    }


    public function findById($id)
    {
        $data = TransportMode::with("category")->findorFail($id);
        return $data;
    }

    public function create($data)
    {
        $record = TransportMode::create($data);
        return $record;
    }
    public function update($id, $data)
    {
        $record = TransportMode::findOrFail($id);
        $record->update($data);  // updates the fields
        return $record;          // returns the model instance
    }


    public function delete($id)
    {
        $rec = TransportMode::where("id", $id)->delete();
        return $rec;
    }

    public function search($param)
    {
        $rec = TransportMode::query()
            ->where("name", "LIKE", "%$param%")
            ->orWhere("slug", "LIKE", "%$param%")
            ->orWhere("description", "=", $param)
            ->orWhere("status", "LIKE", "%$param%")
            ->get();
        return $rec;
    }
    public function findData($column, $data)
    {
        $rec = TransportMode::query()->where($column, $data);
        return $rec;
    }
}
