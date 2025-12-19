<?php
namespace App\Services;

use App\Repositories\ServiceLine\ServiceLineRepositoryInterface;

class ServiceLineService
{
    private ServiceLineRepositoryInterface $serviceLineRepo;

    public function __construct(ServiceLineRepositoryInterface $serviceLineRepo)
    {
        $this->serviceLineRepo = $serviceLineRepo;
    }

    public function getAllServiceLines(): array
    {
        return $this->serviceLineRepo->all();
    }

    public function getServiceLineById(int $id)
    {
        return $this->serviceLineRepo->find($id);
    }

    public function createServiceLine(array $data)
    {
        return $this->serviceLineRepo->create($data);
    }

    public function updateServiceLine(int $id, array $data)
    {
        return $this->serviceLineRepo->update($id, $data);
    }

    public function deleteServiceLine(int $id): bool
    {
        return $this->serviceLineRepo->delete($id);
    }

}
