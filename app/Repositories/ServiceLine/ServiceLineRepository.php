<?php
namespace App\Repositories\ServiceLine;

use App\Models\ServiceLine;

class ServiceLineRepository implements ServiceLineRepositoryInterface
{
    public function all(): array
    {
        return ServiceLine::all()->toArray();
    }

    public function find(int $id): ?ServiceLine
    {
        return ServiceLine::find($id);
    }

    public function create(array $data): ServiceLine
    {
        return ServiceLine::create($data);
    }

    public function update(int $id, array $data): ServiceLine
    {
        $user = ServiceLine::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = ServiceLine::findOrFail($id);
        return $user->delete();
    }
}
