<?php
namespace App\Repositories\Ticket;

use App\Models\Ticket;

class TicketRepository implements TicketRepositoryInterface
{
    public function all(): array
    {
        return Ticket::all()->toArray();
    }

    public function find(int $id): ?Ticket
    {
        return Ticket::find($id);
    }

    public function create(array $data): Ticket
    {
        return Ticket::create($data);
    }

    public function update(int $id, array $data): Ticket
    {
        $user = Ticket::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = Ticket::findOrFail($id);
        return $user->delete();
    }
}
