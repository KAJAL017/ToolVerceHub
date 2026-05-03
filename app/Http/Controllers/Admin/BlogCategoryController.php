<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = BlogCategory::withCount('blogs')->orderBy('order')->get();
        return view('admin.blog-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.blog-categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_categories,slug',
            'color' => 'required|in:g,c,b,a',
            'icon_emoji' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Set default order
        if (empty($validated['order'])) {
            $validated['order'] = BlogCategory::max('order') + 1;
        }

        BlogCategory::create($validated);

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_categories,slug,' . $blogCategory->id,
            'color' => 'required|in:g,c,b,a',
            'icon_emoji' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $blogCategory->update($validated);

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        // Check if category has blogs
        if ($blogCategory->blogs()->count() > 0) {
            return redirect()->route('admin.blog-categories.index')
                ->with('error', 'Cannot delete category with existing blogs!');
        }

        $blogCategory->delete();

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}
