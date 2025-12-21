<?php
namespace App\Repositories\TicketCCEmail;

use App\Models\TicketCCEmail;

interface TicketCCEmailRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?TicketCCEmail;
    public function findByTicketId(int $ticketId): ?TicketCCEmail;
    public function create(array $data): TicketCCEmail;
    public function update(int $id, array $data): TicketCCEmail;
    public function updateByTicketId(int $ticketId, array $data): bool;
    public function delete(int $id): bool;
    public function deleteByTicketId(int $ticketId): bool;
}
