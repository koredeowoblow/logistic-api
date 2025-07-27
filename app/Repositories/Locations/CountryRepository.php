<?php
namespace App\Repositories\Locations;
use App\Models\Locations\Country;
use App\Repositories\IRepository;

class CountryRepository implements IRepository
{

    public function __construct()
    {
        //
    }

    public function all()
    {
        return Country::query()->paginate();
    }

    public function findById($id)
    {
        return Country::findOrFail($id);
    }

    public function create($data)
    {
        return Country::create($data);
    }

    public function update($data)
    {
        return Country::where("id", $id)->update($data);
    }

    public function delete($id)
    {
        return Country::where("id", $id)->delete();
    }

    public function search($param)
    {
        return Country::query()
            ->where("name", "LIKE", "%$param%")
            ->paginate();
    }
}


?>
