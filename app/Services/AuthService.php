<?php
namespace App\Services;

use App\Repositories\Auth\AuthRepositoryInterface;

class AuthService
{
    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function me()
    {
        return $this->authRepository->me();
    }

}
    