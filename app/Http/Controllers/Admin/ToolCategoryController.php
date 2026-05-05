<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ToolCategory;
use App\Models\Icon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolCategoryController extends Controller
{
    public function index()
    {
        $categories = ToolCategory::withCount('tools')->orderBy('display_order')->orderBy('name')->paginate(15);
        return view('admin.tool-categories.index', compact('categories'));
    }

    public function create()
    {
        $icons = Icon::orderBy('category')->orderBy('name')->get();
        return view('admin.tool-categories.create', compact('icons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:tool_categories,slug',
            'icon' => 'nullable|string|max:10',
            'color' => 'required|in:g,c,b,a',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $validated['show_in_header'] = $request->has('show_in_header') ? 1 : 0;
        $validated['show_in_home'] = $request->has('show_in_home') ? 1 : 0;
        $validated['show_in_built'] = $request->has('show_in_built') ? 1 : 0;

        ToolCategory::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Tool category created successfully!',
            'redirect' => route('admin.tool-categories.index')
        ]);
    }

    public function edit(ToolCategory $toolCategory)
    {
        $icons = Icon::orderBy('category')->orderBy('name')->get();
        return view('admin.tool-categories.edit', compact('toolCategory', 'icons'));
    }

    public function update(Request $request, ToolCategory $toolCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:tool_categories,slug,' . $toolCategory->id,
            'icon' => 'nullable|string|max:10',
            'color' => 'required|in:g,c,b,a',
            'description' => 'nullable|string',
            'display_order' => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $validated['show_in_header'] = $request->has('show_in_header') ? 1 : 0;
        $validated['show_in_home'] = $request->has('show_in_home') ? 1 : 0;
        $validated['show_in_built'] = $request->has('show_in_built') ? 1 : 0;

        $toolCategory->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Tool category updated successfully!',
            'redirect' => route('admin.tool-categories.index')
        ]);
    }

    public function destroy(ToolCategory $toolCategory)
    {
        $toolCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tool category deleted successfully!'
        ]);
    }

    /**
     * Toggle featured status of the category.
     */
    public function toggleFeatured(Request $request, ToolCategory $toolCategory)
    {
        $toolCategory->is_featured = !$toolCategory->is_featured;
        $toolCategory->save();

        return response()->json([
            'success' => true,
            'is_featured' => $toolCategory->is_featured,
            'message' => $toolCategory->is_featured 
                ? 'Category marked as featured!' 
                : 'Category removed from featured!'
        ]);
    }
}
