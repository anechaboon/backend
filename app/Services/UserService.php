<?php
namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;

class UserService
{
    private UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function searchUsers(array $params, int $perPage = 15): array
    {
        return $this->userRepo->search($params, $perPage);
    }

    public function getUserById(int $id)
    {
        return $this->userRepo->find($id);
    }

    public function createUser(array $data)
    {
        return $this->userRepo->create($data);
    }

    public function updateUser(int $id, array $data)
    {
        return $this->userRepo->update($id, $data);
    }

    public function deleteUser(int $id): bool
    {
        return $this->userRepo->delete($id);
    }

}
