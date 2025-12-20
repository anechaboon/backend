<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // Get list of users
    public function index(Request $request)
    {
        $users = $this->userService->searchUsers($request->all());
        return response()->json([
            'data' => $users['data'],
            'message' => 'Users retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Create a new user
    public function store(Request $request)
    {
        $data = $request->only(['full_name','email','password','role','status']);
        if (!isset($data['full_name']) || !isset($data['email']) || !isset($data['password']) || !isset($data['role'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }
        $user = $this->userService->createUser($data);
        return response()->json([
            'data' => $user,
            'message' => 'User created successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Get a specific user
    public function show(int $id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $user,
            'message' => 'User retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Update a specific user
    public function update(Request $request, int $id)
    {
        $data = $request->only(['full_name','email','password','role','status']);
        if (empty($id) || !isset($data['full_name']) || !isset($data['email']) || !isset($data['password']) || !isset($data['role'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }

        $user = $this->userService->updateUser($id, $data);
        if (!$user) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $user,
            'message' => 'User updated successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Delete a specific user
    public function destroy(int $id)
    {
        if (empty($id)) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }   
        $deleted = $this->userService->deleteUser($id);
        if (!$deleted) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'message' => 'User deleted successfully',
            'status' => true
        ], Response::HTTP_OK);
    }

}
