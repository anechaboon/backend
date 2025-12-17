<?php
namespace App\Repositories\Vessel;

use App\Models\Vessel;

class VesselRepository implements VesselRepositoryInterface
{
    public function all(): array
    {
        return Vessel::all()->toArray();
    }

    public function find(int $id): ?Vessel
    {
        return Vessel::find($id);
    }

    public function create(array $data): Vessel
    {
        return Vessel::create($data);
    }

    public function update(int $id, array $data): Vessel
    {
        $user = Vessel::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = Vessel::findOrFail($id);
        return $user->delete();
    }
}
