<?php
namespace App\Repositories\TicketCCEmail;

use App\Models\TicketCCEmail;

interface TicketCCEmailRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?TicketCCEmail;
    public function create(array $data): TicketCCEmail;
    public function update(int $id, array $data): TicketCCEmail;
    public function delete(int $id): bool;
    public function deleteByTicketId(int $ticketId): bool;
}
