<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Vessel\VesselService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VesselController extends Controller
{
    private VesselService $vesselService;

    public function __construct(VesselService $vesselService)
    {
        $this->vesselService = $vesselService;
    }

    public function index()
    {
        $vessels = $this->vesselService->getAllVessels();
        return response()->json($vessels, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->only(['name','email','password']);
        $vessel = $this->vesselService->createVessel($data);
        return response()->json($vessel, Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $vessel = $this->vesselService->getVesselById($id);
        if (!$vessel) {
            return response()->json(['message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($vessel, Response::HTTP_OK);
    }
}
