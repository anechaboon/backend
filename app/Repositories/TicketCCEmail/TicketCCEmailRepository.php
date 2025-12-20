<?php
namespace App\Repositories\TicketCCEmail;

use App\Models\TicketCCEmail;

class TicketCCEmailRepository implements TicketCCEmailRepositoryInterface
{
    public function all(): array
    {
        return TicketCCEmail::all()->toArray();
    }

    public function find(int $id): ?TicketCCEmail
    {
        return TicketCCEmail::find($id);
    }

    public function create(array $data): TicketCCEmail
    {
        return TicketCCEmail::create($data);
    }

    public function update(int $id, array $data): TicketCCEmail
    {
        $user = TicketCCEmail::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = TicketCCEmail::findOrFail($id);
        return $user->delete();
    }
}
