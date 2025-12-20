<?php
namespace App\Services;

use App\Repositories\Ticket\TicketRepositoryInterface;
use App\Services\TicketCCEmailService;
use App\Repositories\TicketCCEmail\TicketCCEmailRepository;
use DB;
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
        try {
            DB::beginTransaction();

            $res = $this->ticketRepo->create($data);
            $repoCC = new TicketCCEmailRepository();
            $serviceCC = new TicketCCEmailService($repoCC);

            foreach ($data['cc_emails'] as $cc_email) {
                $ticketCCEmailData = [
                    'ticket_id' => $res->id,
                    'cc_email' => $cc_email,
                    'created_by' => $data['created_by'] ?? null,
                ];
                $resCC = $serviceCC->createTicketCCEmail($ticketCCEmailData);
                if (!$resCC) {
                    DB::rollBack();
                    throw new \Exception('Failed to create Ticket CC Email');
                }
            }
            DB::commit();
            return $res;
            
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
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
