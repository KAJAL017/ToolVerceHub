<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogTagController extends Controller
{
    public function index()
    {
        $tags = BlogTag::orderBy('name')->paginate(15);
        return view('admin.blog-tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.blog-tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_tags,slug',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle checkbox (if not checked, it won't be in request)
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        BlogTag::create($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Tag created successfully!'
            ]);
        }

        return redirect()->route('admin.blog-tags.index')
            ->with('success', 'Tag created successfully!');
    }

    public function edit(BlogTag $blogTag)
    {
        return view('admin.blog-tags.edit', compact('blogTag'));
    }

    public function update(Request $request, BlogTag $blogTag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_tags,slug,' . $blogTag->id,
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle checkbox (if not checked, it won't be in request)
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        $blogTag->update($validated);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Tag updated successfully!'
            ]);
        }

        return redirect()->route('admin.blog-tags.index')
            ->with('success', 'Tag updated successfully!');
    }

    /**
     * Toggle featured status of the tag.
     */
    public function toggleFeatured(Request $request, BlogTag $blogTag)
    {
        $blogTag->is_featured = !$blogTag->is_featured;
        $blogTag->save();

        return response()->json([
            'success' => true,
            'is_featured' => $blogTag->is_featured,
            'message' => $blogTag->is_featured 
                ? 'Tag marked as featured!' 
                : 'Tag removed from featured!'
        ]);
    }

    public function destroy(BlogTag $blogTag)
    {
        $blogTag->delete();

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Tag deleted successfully!'
            ]);
        }

        return redirect()->route('admin.blog-tags.index')
            ->with('success', 'Tag deleted successfully!');
    }
}
