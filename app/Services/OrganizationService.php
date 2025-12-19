<?php
namespace App\Services;

use App\Repositories\Organization\OrganizationRepositoryInterface;

class OrganizationService
{
    private OrganizationRepositoryInterface $organizationRepo;

    public function __construct(OrganizationRepositoryInterface $organizationRepo)
    {
        $this->organizationRepo = $organizationRepo;
    }

    public function getAllOrganizations(): array
    {
        return $this->organizationRepo->all();
    }

    public function getOrganizationById(int $id)
    {
        return $this->organizationRepo->find($id);
    }

    public function createOrganization(array $data)
    {
        return $this->organizationRepo->create($data);
    }

    public function updateOrganization(int $id, array $data)
    {
        return $this->organizationRepo->update($id, $data);
    }

    public function deleteOrganization(int $id): bool
    {
        return $this->organizationRepo->delete($id);
    }

}
