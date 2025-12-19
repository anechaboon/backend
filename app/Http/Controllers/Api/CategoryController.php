<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    // Get list of categories
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return response()->json([
            'data' => $categories,
            'message' => 'Categories retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Create a new category
    public function store(Request $request)
    {
        $data = $request->only(['name','description','status']);
        if (!isset($data['name']) || !isset($data['description']) || !isset($data['status'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }
        $category = $this->categoryService->createCategory($data);
        return response()->json([
            'data' => $category,
            'message' => 'Category created successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Get a specific category
    public function show(int $id)
    {
        $category = $this->categoryService->getCategoryById($id);
        if (!$category) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $category,
            'message' => 'Category retrieved successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Update a specific category
    public function update(Request $request, int $id)
    {
        $data = $request->only(['name','description','status']);
        if (empty($id) || !isset($data['name']) || !isset($data['description']) || !isset($data['status'])) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }

        $category = $this->categoryService->updateCategory($id, $data);
        if (!$category) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'data' => $category,
            'message' => 'Category updated successfully',
            'status' => true
        
        ], Response::HTTP_OK);
    }

    // Delete a specific category
    public function destroy(int $id)
    {
        if (empty($id)) {
            return response()->json(['status' => false, 'message'=>'Invalid data'], Response::HTTP_BAD_REQUEST);
        }   
        $deleted = $this->categoryService->deleteCategory($id);
        if (!$deleted) {
            return response()->json(['status' => false, 'message'=>'Not Found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'message' => 'Category deleted successfully',
            'status' => true
        ], Response::HTTP_OK);
    }

}
