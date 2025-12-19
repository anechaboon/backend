<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ServiceLineService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceLineController extends Controller
{
    private ServiceLineService $serviceLineService;

    public function __construct(ServiceLineService $serviceLineService)
    {
        $this->serviceLineService = $serviceLineService;
    }

    // Get list of serviceLines
    public function index()
    {
        $serviceLines = $this->serviceLineService->getAllServiceLines();
        return response()->json([
            'data' => $serviceLines,
            'message' => 'ServiceLines retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Create a new serviceLine
    public function store(Request $request)
    {
        $data = $request->only(['name','description','service_code','status']);
        if (!isset($data['name'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }
        $serviceLine = $this->serviceLineService->createServiceLine($data);
        return response()->json([
            'data' => $serviceLine,
            'message' => 'ServiceLine created successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Get a specific serviceLine
    public function show(int $id)
    {
        $serviceLine = $this->serviceLineService->getServiceLineById($id);
        if (!$serviceLine) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $serviceLine,
            'message' => 'ServiceLine retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Update a specific serviceLine
    public function update(Request $request, int $id)
    {
        $data = $request->only(['name','description','service_code','status']);
        if (empty($id) || !isset($data['name'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }
        $serviceLine = $this->serviceLineService->updateServiceLine($id, $data);

        if (!$serviceLine) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $serviceLine,
            'message' => 'ServiceLine updated successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Delete a specific serviceLine
    public function destroy(int $id)
    {
        if (empty($id)) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }   
        $deleted = $this->serviceLineService->deleteServiceLine($id);
        if (!$deleted) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'message' => 'ServiceLine deleted successfully',
            'status' => true
        ], Response::HTTP_OK);
    }

}
