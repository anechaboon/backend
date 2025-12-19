<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\VesselService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VesselController extends Controller
{
    private VesselService $vesselService;

    public function __construct(VesselService $vesselService)
    {
        $this->vesselService = $vesselService;
    }

    // Get list of vessels
    public function index()
    {
        $vessels = $this->vesselService->getAllVessels();
        return response()->json([
            'data' => $vessels,
            'message' => 'Vessels retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Create a new vessel
    public function store(Request $request)
    {
        $data = $request->only(['name','imo_number','type','flag']);
        if (!isset($data['name']) || !isset($data['imo_number']) || !isset($data['type']) || !isset($data['flag'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }
        $vessel = $this->vesselService->createVessel($data);
        return response()->json([
            'data' => $vessel,
            'message' => 'Vessel created successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Get a specific vessel
    public function show(int $id)
    {
        $vessel = $this->vesselService->getVesselById($id);
        if (!$vessel) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $vessel,
            'message' => 'Vessel retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Update a specific vessel
    public function update(Request $request, int $id)
    {
        $data = $request->only(['name','imo_number','type','flag']);
        if (empty($id) || !isset($data['name']) || !isset($data['imo_number']) || !isset($data['type']) || !isset($data['flag'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }

        $vessel = $this->vesselService->updateVessel($id, $data);
        if (!$vessel) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $vessel,
            'message' => 'Vessel updated successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Delete a specific vessel
    public function destroy(int $id)
    {
        if (empty($id)) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }   
        $deleted = $this->vesselService->deleteVessel($id);
        if (!$deleted) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'message' => 'Vessel deleted successfully',
            'status' => true
        ], Response::HTTP_OK);
    }

}
