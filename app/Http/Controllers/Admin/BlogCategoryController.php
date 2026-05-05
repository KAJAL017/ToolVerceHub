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
        $categories = BlogCategory::withCount(['blogs' => function($query) {
            $query->where('status', 'published');
        }])->orderBy('name')->paginate(15);
        
        return view('admin.blog-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $icons = \App\Models\Icon::orderBy('category')->orderBy('name')->get();
        return view('admin.blog-categories.create', compact('icons'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_categories,slug',
            'description' => 'nullable|string',
            'icon_emoji' => 'nullable|string|max:10',
            'is_featured' => 'nullable|boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle checkbox (if not checked, it won't be in request)
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        BlogCategory::create($validated);

        // Return JSON response for AJAX
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Category created successfully!'
            ]);
        }

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(BlogCategory $blogCategory)
    {
        $icons = \App\Models\Icon::orderBy('category')->orderBy('name')->get();
        return view('admin.blog-categories.edit', compact('blogCategory', 'icons'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_categories,slug,' . $blogCategory->id,
            'description' => 'nullable|string',
            'icon_emoji' => 'nullable|string|max:10',
            'is_featured' => 'nullable|boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle checkbox (if not checked, it won't be in request)
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        $blogCategory->update($validated);

        // Return JSON response for AJAX
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully!'
            ]);
        }

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Toggle featured status of the category.
     */
    public function toggleFeatured(Request $request, BlogCategory $blogCategory)
    {
        $blogCategory->is_featured = !$blogCategory->is_featured;
        $blogCategory->save();

        return response()->json([
            'success' => true,
            'is_featured' => $blogCategory->is_featured,
            'message' => $blogCategory->is_featured 
                ? 'Category marked as featured!' 
                : 'Category removed from featured!'
        ]);
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        if ($blogCategory->blogs()->count() > 0) {
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete category with existing blogs!'
                ], 400);
            }
            
            return redirect()->route('admin.blog-categories.index')
                ->with('error', 'Cannot delete category with existing blogs!');
        }

        $blogCategory->delete();

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully!'
            ]);
        }

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}
