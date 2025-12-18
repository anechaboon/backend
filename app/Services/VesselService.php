<?php
namespace App\Services;

use App\Repositories\Vessel\VesselRepositoryInterface;

class VesselService
{
    private VesselRepositoryInterface $vesselRepo;

    public function __construct(VesselRepositoryInterface $vesselRepo)
    {
        $this->vesselRepo = $vesselRepo;
    }

    public function getAllVessels(): array
    {
        return $this->vesselRepo->all();
    }

    public function getVesselById(int $id)
    {
        return $this->vesselRepo->find($id);
    }

    public function createVessel(array $data)
    {
        return $this->vesselRepo->create($data);
    }

}
