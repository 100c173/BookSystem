<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    // Inject the CategoryService to delegate business logic
    protected CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a paginated list of categories.
     */
    public function index()
    {
        $categories = $this->service->list();
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created category in the database.
     * Uses a form request for validation.
     */
    public function store(CategoryRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified category in the database.
     * Uses a form request for validation.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->service->update($category, $request->validated());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Soft delete the specified category.
     */
    public function destroy(Category $category)
    {
        $this->service->delete($category);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    /**
     * Display a list of soft-deleted categories (trashed).
     */
    public function trashed()
    {
        $categories = $this->service->list(true, 5);
        return view('dashboard.category.trashed', compact('categories'));
    }

    /**
     * Restore a soft-deleted category.
     */
    public function restore($id)
    {
        $this->service->restore($id);
        return redirect()->route('categories.trashed')->with('success', 'Category restored successfully!');
    }

    /**
     * Permanently delete a soft-deleted category.
     */
    public function forceDelete($id)
    {
        $this->service->forceDelete($id);
        return redirect()->route('categories.trashed')->with('success', 'Category permanently deleted!');
    }
}
