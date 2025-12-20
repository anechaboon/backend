<?php
namespace App\Repositories\Ticket;

use App\Models\Ticket;

interface TicketRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?Ticket;
    public function create(array $data): Ticket;
    public function update(int $id, array $data): Ticket;
    public function delete(int $id): bool;
}
