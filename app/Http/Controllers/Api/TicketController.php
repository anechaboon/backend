<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TicketService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    private TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    // Get list of tickets
    public function index()
    {
        $tickets = $this->ticketService->getAllTickets();
        return response()->json([
            'data' => $tickets,
            'message' => 'Tickets retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Create a new ticket
    public function store(Request $request)
    {
        $data = $request->only(['title','description','contact_email','priority', 'category_id', 'organization_id', 'vessel_id', 'service_line_id', 'assigned_to_user_id', 'status']);
        if (!isset($data['title']) || !isset($data['contact_email']) || !isset($data['priority']) || !isset($data['status'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }
        $ticket = $this->ticketService->createTicket($data);
        return response()->json([
            'data' => $ticket,
            'message' => 'Ticket created successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Get a specific ticket
    public function show(int $id)
    {
        $ticket = $this->ticketService->getTicketById($id);
        if (!$ticket) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $ticket,
            'message' => 'Ticket retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Update a specific ticket
    public function update(Request $request, int $id)
    {
        $data = $request->only(['title','description','contact_email','priority', 'category_id', 'organization_id', 'vessel_id', 'service_line_id', 'assigned_to_user_id', 'status']);
        if (empty($id) || !isset($data['title']) || !isset($data['contact_email']) || !isset($data['priority']) || !isset($data['status'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }

        $ticket = $this->ticketService->updateTicket($id, $data);
        if (!$ticket) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $ticket,
            'message' => 'Ticket updated successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Delete a specific ticket
    public function destroy(int $id)
    {
        if (empty($id)) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }   
        $deleted = $this->ticketService->deleteTicket($id);
        if (!$deleted) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'message' => 'Ticket deleted successfully',
            'status' => true
        ], Response::HTTP_OK);
    }

}
