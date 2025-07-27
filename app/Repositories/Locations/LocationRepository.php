<?php
namespace App\Repositories\Locations;
use App\Models\Locations\Location;
use App\Repositories\IRepository;

class LocationRepository implements IRepository
{
    public function __construct()
    {
        //
    }

    public function all()
    {
        return Location::query()->paginate();
    }

    public function findById($id)
    {
        return Location::findOrFail($id);
    }

    public function create($data)
    {
        return Location::create($data);
    }

    public function update($id, $data)
    {
        return Location::where("id", $id)->update($data);
    }

    public function delete($id)
    {
        return Location::where("id", $id)->delete();
    }

    public function search($param)
    {
        return Location::query()
            ->where("name", "LIKE", "%$param%")
            ->paginate();
    }
}
?>
