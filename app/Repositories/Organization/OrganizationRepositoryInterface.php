<?php
namespace App\Repositories\Organization;

use App\Models\Organization;

interface OrganizationRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?Organization;
    public function create(array $data): Organization;
    public function update(int $id, array $data): Organization;
    public function delete(int $id): bool;
}
