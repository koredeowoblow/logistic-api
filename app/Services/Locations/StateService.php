<?php
namespace App\Services\Locations;
use App\Repositories\Locations\StateRepository;

class StateService
{
    protected $stateRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    public function getAllStates()
    {
        $data= $this->stateRepository->all();
        if(!$data) {
          throw new FailedProcessException('No State Found',StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function getStateById($id)
    {
        $data= $this->stateRepository->findById($id);
        if (!$data) {
            throw new FailedProcessException('State not found', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function createState($data)
    {
        $data= $this->stateRepository->create($data);
        if (!$data) {
            throw new FailedProcessException('State creation failed', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function updateState($id, $data)
    {
        $state = $this->stateRepository->findById($id);

        if (!$state) {
            throw new FailedProcessException('State not found', StatusCodeEnums::FAILED);
        }
        $data= $this->stateRepository->update($id, $data);

        if (!$data){
            throw new FailedProcessException('State Update failed', StatusCodeEnums::FAILED);
        }
        return $data;

    }

    public function deleteState($id)
    {
        $state=$this->stateRepository->findById($id);
        if (!$state) {
            throw new FailedProcessException('State not found', StatusCodeEnums::FAILED);
        }
        $data= $this->stateRepository->delete($id);

        if (!$data){
            throw new FailedProcessException('State Delete failed', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function searchStates($param)
    {
        $data= $this->stateRepository->search($param);
         if (!$data){
            throw new FailedProcessException('State Not Found', StatusCodeEnums::FAILED);
        }
        return $data;
    }
}
?>
