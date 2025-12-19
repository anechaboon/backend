<?php
namespace App\Repositories\Organization;

use App\Models\Organization;

class OrganizationRepository implements OrganizationRepositoryInterface
{
    public function all(): array
    {
        return Organization::all()->toArray();
    }

    public function find(int $id): ?Organization
    {
        return Organization::find($id);
    }

    public function create(array $data): Organization
    {
        return Organization::create($data);
    }

    public function update(int $id, array $data): Organization
    {
        $user = Organization::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = Organization::findOrFail($id);
        return $user->delete();
    }
}
