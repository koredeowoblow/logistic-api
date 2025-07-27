<?php
namespace App\Services\Locations;
use App\Repositories\Locations\CountryRepository;

class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries()
    {
        $data = $this->countryRepository->all();
        return $data;
    }

    public function getCountryById($id)
    {
        $data = $this->countryRepository->findById($id);
        return $data;
    }

    public function createCountry($data)
    {
        $data = $this->countryRepository->create($data);
        return $data;
    }

    public function updateCountry($id, $data)
    {
        $country = $this->countryRepository->findById($id);
        $data = $this->countryRepository->update($id, $data);
        return $data;
    }

    public function deleteCountry($id)
    {
        $country = $this->countryRepository->findById($id);

        $data = $this->countryRepository->delete($id);
        return $data;
    }
}
?>
