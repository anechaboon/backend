<?php
namespace App\Repositories\ServiceLine;

use App\Models\ServiceLine;

interface ServiceLineRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?ServiceLine;
    public function create(array $data): ServiceLine;
    public function update(int $id, array $data): ServiceLine;
    public function delete(int $id): bool;
}
