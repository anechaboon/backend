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
        $ticketCCEmail = TicketCCEmail::findOrFail($id);
        $ticketCCEmail->update($data);
        return $ticketCCEmail;
    }

    public function delete(int $id): bool
    {
        $ticketCCEmail = TicketCCEmail::findOrFail($id);
        return $ticketCCEmail->delete();
    }

    public function deleteByTicketId(int $ticketId): bool
    {
        $deleted = TicketCCEmail::where('ticket_id', $ticketId)->delete();
        return $deleted > 0;
    }
}
