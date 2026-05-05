<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ToolTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolTagController extends Controller
{
    /**
     * Display a listing of tool tags.
     */
    public function index()
    {
        $tags = ToolTag::withCount('tools')->orderBy('name')->paginate(15);
        return view('admin.tool-tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new tool tag.
     */
    public function create()
    {
        return view('admin.tool-tags.create');
    }

    /**
     * Store a newly created tool tag in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:tool_tags,slug',
            'is_featured' => 'nullable|boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle checkbox value
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        ToolTag::create($validated);

        // Return JSON response for AJAX
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Tool tag created successfully!'
            ]);
        }

        return redirect()->route('admin.tool-tags.index')
            ->with('success', 'Tool tag created successfully!');
    }

    /**
     * Show the form for editing the specified tool tag.
     */
    public function edit(ToolTag $toolTag)
    {
        return view('admin.tool-tags.edit', compact('toolTag'));
    }

    /**
     * Update the specified tool tag in storage.
     */
    public function update(Request $request, ToolTag $toolTag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:tool_tags,slug,' . $toolTag->id,
            'is_featured' => 'nullable|boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle checkbox value
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        $toolTag->update($validated);

        // Return JSON response for AJAX
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Tool tag updated successfully!'
            ]);
        }

        return redirect()->route('admin.tool-tags.index')
            ->with('success', 'Tool tag updated successfully!');
    }

    /**
     * Remove the specified tool tag from storage.
     */
    public function destroy(ToolTag $toolTag)
    {
        if ($toolTag->tools()->count() > 0) {
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete tag with existing tools!'
                ], 400);
            }
            
            return redirect()->route('admin.tool-tags.index')
                ->with('error', 'Cannot delete tag with existing tools!');
        }

        $toolTag->delete();

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Tool tag deleted successfully!'
            ]);
        }

        return redirect()->route('admin.tool-tags.index')
            ->with('success', 'Tool tag deleted successfully!');
    }

    /**
     * Toggle the featured status of the specified tool tag.
     */
    public function toggleFeatured(ToolTag $toolTag)
    {
        $toolTag->is_featured = !$toolTag->is_featured;
        $toolTag->save();

        return response()->json([
            'success' => true,
            'is_featured' => $toolTag->is_featured,
            'message' => $toolTag->is_featured 
                ? 'Tag marked as featured!' 
                : 'Tag removed from featured!'
        ]);
    }
}
