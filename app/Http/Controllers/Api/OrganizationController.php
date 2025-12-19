<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrganizationService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrganizationController extends Controller
{
    private OrganizationService $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    // Get list of organizations
    public function index()
    {
        $organizations = $this->organizationService->getAllOrganizations();
        return response()->json([
            'data' => $organizations,
            'message' => 'Organizations retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Create a new organization
    public function store(Request $request)
    {
        $data = $request->only(['name','email','phone','address','city','country','description','status']);
        if (!isset($data['name']) || !isset($data['email']) ) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }
        $organization = $this->organizationService->createOrganization($data);
        return response()->json([
            'data' => $organization,
            'message' => 'Organization created successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Get a specific organization
    public function show(int $id)
    {
        $organization = $this->organizationService->getOrganizationById($id);
        if (!$organization) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $organization,
            'message' => 'Organization retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Update a specific organization
    public function update(Request $request, int $id)
    {
        $data = $request->only(['name','email','phone','address','city','country','description','status']);
        if (empty($id) || !isset($data['name']) || !isset($data['email'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }
        $organization = $this->organizationService->updateOrganization($id, $data);

        if (!$organization) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $organization,
            'message' => 'Organization updated successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Delete a specific organization
    public function destroy(int $id)
    {
        if (empty($id)) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }   
        $deleted = $this->organizationService->deleteOrganization($id);
        if (!$deleted) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'message' => 'Organization deleted successfully',
            'status' => true
        ], Response::HTTP_OK);
    }

}
