<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    /**
     * Get a paginated list of categories.
     * If $withTrashed is true, only soft-deleted categories are returned.
     *
     * @param bool $withTrashed
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function list($withTrashed = false, $perPage = 10)
    {
        return $withTrashed 
            ? Category::onlyTrashed()->paginate($perPage)
            : Category::paginate($perPage);
    }

    /**
     * Create a new category using the given data.
     *
     * @param array $data
     * @return Category
     */
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * Update the given category with new data.
     *
     * @param Category $category
     * @param array $data
     * @return bool
     */
    public function update(Category $category, array $data): bool
    {
        return $category->update($data);
    }

    /**
     * Soft delete the given category.
     *
     * @param Category $category
     * @return bool
     */
    public function delete(Category $category): bool
    {
        return $category->delete();
    }

    /**
     * Restore a soft-deleted category by ID.
     *
     * @param int $id
     * @return Category|null
     */
    public function restore(int $id): ?Category
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return $category;
    }

    /**
     * Permanently delete a soft-deleted category by ID.
     *
     * @param int $id
     * @return bool
     */
    public function forceDelete(int $id): bool
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        return $category->forceDelete();
    }
}
