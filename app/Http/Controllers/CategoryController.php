<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    // Display all categories
    public function index()
    {
        $categories = Category::all();
        return view('Pages.backendpages.categories', compact('categories'));
    }

    // Show form to create a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a newly created category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Category::create($request->all());

        ActivityController::logActivity('Created Category');

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $category->update($request->all());

        ActivityController::logActivity('Updated Category');

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        $category->delete();

        ActivityController::logActivity('Deleted Category');

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $sort_by = $request->get('sort', 'asc');
        $query = Category::query();
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $categories = $query->orderBy('name', $sort_by)->paginate(10);
        return view('Pages.backendpages.categories', compact('categories'));
    }


}


