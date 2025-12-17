<?php
namespace App\Repositories\Vessel;

use App\Models\Vessel;

interface VesselRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?Vessel;
    public function create(array $data): Vessel;
    public function update(int $id, array $data): Vessel;
    public function delete(int $id): bool;
}
