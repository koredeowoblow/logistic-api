<?php
namespace App\Services\Locations;
use App\Repositories\Locations\LocationRepository;

class LocationService
{
    protected $locationRepository;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function getAllLocations()
    {
        $data= $this->locationRepository->all();
        if(!$data) {
          throw new FailedProcessException('No Location Found',StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function getLocationById($id)
    {
        $data= $this->locationRepository->findById($id);
        if (!$data) {
            throw new FailedProcessException('Location not found', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function createLocation($data)
    {
        $data= $this->locationRepository->create($data);
        if (!$data) {
            throw new FailedProcessException('Location creation failed', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function updateLocation($id, $data)
    {
        $Location = $this->locationRepository->findById($id);

        if (!$Location) {
            throw new FailedProcessException('Location not found', StatusCodeEnums::FAILED);
        }
        $data= $this->locationRepository->update($id, $data);

        if (!$data){
            throw new FailedProcessException('Location Update failed', StatusCodeEnums::FAILED);
        }
        return $data;

    }

    public function deleteLocation($id)
    {
        $Location=$this->locationRepository->findById($id);
        if (!$Location) {
            throw new FailedProcessException('Location not found', StatusCodeEnums::FAILED);
        }
        $data= $this->locationRepository->delete($id);

        if (!$data){
            throw new FailedProcessException('Location Delete failed', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function searchLocations($param)
    {
        $data= $this->locationRepository->search($param);
         if (!$data){
            throw new FailedProcessException('Location Not Found', StatusCodeEnums::FAILED);
        }
        return $data;
    }
}
?>
