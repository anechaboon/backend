<?php
namespace App\Repositories\Ticket;

use App\Models\Ticket;

class TicketRepository implements TicketRepositoryInterface
{
    public function all(): array
    {
        return Ticket::all()->toArray();
    }

    public function search(array $criteria, int $perPage = 15): array
    {
        $res = self::paginate($criteria, $perPage);
        return $res->toArray();
    }

    public function paginate(array $criteria, int $perPage = 15)
    {
        $query = Ticket::select([
            'tickets.*'
        ])->with('organization', 'vessel', 'serviceLine')
        ->when(isset($criteria['status']), function ($q) use ($criteria) {
            $q->where('tickets.status', $criteria['status']);
        })
        ->when(isset($criteria['organization_id']), function ($q) use ($criteria) {
            $q->where('tickets.organization_id', $criteria['organization_id']);
        })
        ->when(isset($criteria['vessel_id']), function ($q) use ($criteria) {
            $q->where('tickets.vessel_id', $criteria['vessel_id']);
        })
        ->when(isset($criteria['service_line_id']), function ($q) use ($criteria) {
            $q->where('tickets.service_line_id', $criteria['service_line_id']);
        });
        return $query->paginate($perPage);
    }   

    public function find(int $id): ?Ticket
    {
        return Ticket::select([
            'tickets.*',
            'users.full_name as assigned_to_user_name'
        ])->join('users', 'tickets.assigned_to_user_id', '=', 'users.id')
        ->with('organization', 'vessel', 'serviceLine','category','ccEmails')
        ->find($id);
        
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
