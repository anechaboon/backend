<?php
namespace App\Services;

use App\Models\TicketCCEmail;
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

    public function searchTickets(array $criteria): array
    {
        return $this->ticketRepo->search($criteria);
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
            $userId = auth()->user()->id ?? null;

            foreach ($data['cc_emails'] as $cc_email) {
                if (empty($cc_email)) {
                    continue;
                }
                $ticketCCEmailData = [
                    'ticket_id' => $res->id,
                    'cc_email' => $cc_email,
                    'created_by' => $userId,
                    'updated_by' => $userId,
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
        try {
            DB::beginTransaction();

            $repoCC = new TicketCCEmailRepository();
            $serviceCC = new TicketCCEmailService($repoCC);
            $userId = auth()->user()->id ?? null;
            $resCheck = $serviceCC->getTicketCCEmailByTicketId($id);
            if($resCheck){
                $serviceCC->updateByTicketId($id, ['deleted_by' => $userId]);
                $resDelete = $serviceCC->deleteByTicketId($id);
                if (!$resDelete) {
                    DB::rollBack();
                    throw new \Exception('Failed to delete existing Ticket CC Emails');
                }
            }
            
            foreach ($data['cc_emails'] as $cc_email) {
                if (empty($cc_email)) {
                    continue;
                }
                $resCC = $serviceCC->createTicketCCEmail([
                    'ticket_id' => $id,
                    'cc_email' => $cc_email['cc_email'],
                    'created_by' => $userId,
                    'updated_by' => $userId,
                ]);
                if (!$resCC) {
                    DB::rollBack();
                    throw new \Exception('Failed to create Ticket CC Email');
                }
            }
            $res = $this->ticketRepo->update($id, [...$data, 'updated_by' => $userId]);
            if (!$res) {
                DB::rollBack();
                throw new \Exception('Failed to update Ticket');
            }
            DB::commit();
            return $res;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteTicket(int $id): bool
    {
        $userId = auth()->user()->id ?? null;
        $this->ticketRepo->update($id, ['deleted_by' => $userId]);
        return $this->ticketRepo->delete($id, $userId);
    }

}
