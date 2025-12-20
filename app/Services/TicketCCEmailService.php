<?php
namespace App\Services;

use App\Repositories\TicketCCEmail\TicketCCEmailRepositoryInterface;

class TicketCCEmailService
{
    private TicketCCEmailRepositoryInterface $ticketCCEmailRepo;

    public function __construct(TicketCCEmailRepositoryInterface $ticketCCEmailRepo)
    {
        $this->ticketCCEmailRepo = $ticketCCEmailRepo;
    }

    public function getAllTicketCCEmails(): array
    {
        return $this->ticketCCEmailRepo->all();
    }

    public function getTicketCCEmailById(int $id)
    {
        return $this->ticketCCEmailRepo->find($id);
    }

    public function createTicketCCEmail(array $data)
    {
        return $this->ticketCCEmailRepo->create($data);
    }

    public function updateTicketCCEmail(int $id, array $data)
    {
        return $this->ticketCCEmailRepo->update($id, $data);
    }

    public function deleteTicketCCEmail(int $id): bool
    {
        return $this->ticketCCEmailRepo->delete($id);
    }

}
