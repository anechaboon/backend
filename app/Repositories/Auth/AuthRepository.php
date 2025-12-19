<?php
namespace App\Repositories\Auth;


class AuthRepository implements AuthRepositoryInterface
{
    public function me(): array
    {
        return auth()->user()->toArray();
    }

    
}
