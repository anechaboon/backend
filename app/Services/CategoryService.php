<?php
namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryService
{
    private CategoryRepositoryInterface $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAllCategories(): array
    {
        return $this->categoryRepo->all();
    }

    public function getCategoryById(int $id)
    {
        return $this->categoryRepo->find($id);
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepo->create($data);
    }

    public function updateCategory(int $id, array $data)
    {
        return $this->categoryRepo->update($id, $data);
    }

    public function deleteCategory(int $id): bool
    {
        return $this->categoryRepo->delete($id);
    }

}
