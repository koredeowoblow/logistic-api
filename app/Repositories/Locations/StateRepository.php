<?php
namespace App\Repositories\Locations;
use App\Models\Locations\State;
use App\Repositories\IRepository;

class StateRepository implements IRepository
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
        return State::with('country')->paginate(pageCount());
    }

    public function findById($id)
    {
        return State::with('country')->findOrFail($id);
    }

    public function create($data)
    {
        return State::create($data);
    }

    public function update($id, $data)
    {
        return State::where("id", $id)->update($data);
    }

    public function delete($id)
    {
        return State::where("id", $id)->delete();
    }

    public function search($param)
    {
        return State::query()
            ->where("name", "LIKE", "%$param%")
            ->paginate();
    }
}
?>
