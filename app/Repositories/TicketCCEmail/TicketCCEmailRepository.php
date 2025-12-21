<?php
namespace App\Repositories\TicketCCEmail;

use App\Models\TicketCCEmail;
use Ramsey\Uuid\Type\Integer;

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

    public function findByTicketId(int $ticketId): ?TicketCCEmail
    {
        return TicketCCEmail::where('ticket_id', $ticketId)->first();
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

    public function updateByTicketId(int $ticketId, array $data): bool
    {
        $ticketCCEmail = TicketCCEmail::where('ticket_id', $ticketId)
            ->update($data);
        return $ticketCCEmail > 0;
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
