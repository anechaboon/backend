<?php
namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function all(): array
    {
        return User::all()->toArray();
    }

    public function search(array $params, int $perPage = 15): array
    {
        $query = User::query();

        if (!empty($params['email'])) {
            $query->where('email', $params['email']);
        }

        if (!empty($params['full_name'])) {
            $query->where('full_name', 'like', '%' . $params['full_name'] . '%');
        }

        if (!empty($params['role'])) {
            $query->where('role', $params['role']);
        }

        return $query->paginate($perPage)->toArray();
    }

    public function find(int $id): ?User
    {
        return User::find($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(int $id, array $data): User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
