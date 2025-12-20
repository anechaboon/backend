<?php
namespace App\Services;

use App\Repositories\Ticket\TicketRepositoryInterface;

class TicketService
{
    private TicketRepositoryInterface $ticketRepo;

    public function __construct(TicketRepositoryInterface $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }

    public function getAllTickets(): array
    {
        return $this->ticketRepo->all();
    }

    public function getTicketById(int $id)
    {
        return $this->ticketRepo->find($id);
    }

    public function createTicket(array $data)
    {
        return $this->ticketRepo->create($data);
    }

    public function updateTicket(int $id, array $data)
    {
        return $this->ticketRepo->update($id, $data);
    }

    public function deleteTicket(int $id): bool
    {
        return $this->ticketRepo->delete($id);
    }

}
