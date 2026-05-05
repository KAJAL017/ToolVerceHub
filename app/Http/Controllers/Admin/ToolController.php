<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use App\Models\ToolCategory;
use App\Models\Icon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolController extends Controller
{
    public function index(Request $request)
    {
        // Handle AJAX search request
        if ($request->ajax() && $request->has('search')) {
            $searchTerm = $request->get('search');
            $tools = Tool::with('category')
                ->where(function($query) use ($searchTerm) {
                    $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhereHas('category', function($q) use ($searchTerm) {
                              $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                          });
                })
                ->orderBy('display_order')
                ->orderBy('name')
                ->get();
            
            return response()->json(['tools' => $tools]);
        }
        
        $tools = Tool::with('category')->orderBy('display_order')->orderBy('name')->paginate(20);
        $allTools = Tool::with('category')->orderBy('display_order')->orderBy('name')->get(['id', 'name', 'description'])->map(function($tool) {
            return [
                'id' => $tool->id,
                'name' => strtolower($tool->name),
                'category' => strtolower($tool->category->name ?? ''),
                'description' => strtolower($tool->description ?? ''),
            ];
        });
        $categories = ToolCategory::active()->ordered()->get();
        return view('admin.tools.index', compact('tools', 'categories', 'allTools'));
    }

    public function create()
    {
        $categories = ToolCategory::active()->ordered()->get();
        $icons = Icon::orderBy('category')->orderBy('name')->get();
        $tags = \App\Models\ToolTag::orderBy('name')->get();
        return view('admin.tools.create', compact('categories', 'icons', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:tools,slug',
            'category_id' => 'nullable|exists:tool_categories,id',
            'icon' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'url' => 'nullable|string|max:500',
            'tool_count' => 'nullable|string|max:50',
            'color' => 'required|in:g,c,b,a',
            'display_order' => 'nullable|integer',
            'tool_tags' => 'nullable|array',
            'tool_tags.*' => 'exists:tool_tags,id',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $validated['is_free'] = $request->has('is_free') ? 1 : 0;
        $validated['show_in_hero'] = $request->has('show_in_hero') ? 1 : 0;
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $tool = Tool::create($validated);

        // Sync tool tags
        if ($request->has('tool_tags')) {
            $tool->toolTags()->sync($request->tool_tags);
        }

        return response()->json([
            'success' => true,
            'message' => 'Tool created successfully!',
            'redirect' => route('admin.tools.index')
        ]);
    }

    public function edit(Tool $tool)
    {
        $categories = ToolCategory::active()->ordered()->get();
        $icons = Icon::orderBy('category')->orderBy('name')->get();
        $tags = \App\Models\ToolTag::orderBy('name')->get();
        return view('admin.tools.edit', compact('tool', 'categories', 'icons', 'tags'));
    }

    public function update(Request $request, Tool $tool)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:tools,slug,' . $tool->id,
            'category_id' => 'nullable|exists:tool_categories,id',
            'icon' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'url' => 'nullable|string|max:500',
            'tool_count' => 'nullable|string|max:50',
            'color' => 'required|in:g,c,b,a',
            'display_order' => 'nullable|integer',
            'tool_tags' => 'nullable|array',
            'tool_tags.*' => 'exists:tool_tags,id',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $validated['is_free'] = $request->has('is_free') ? 1 : 0;
        $validated['show_in_hero'] = $request->has('show_in_hero') ? 1 : 0;
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $tool->update($validated);

        // Sync tool tags
        if ($request->has('tool_tags')) {
            $tool->toolTags()->sync($request->tool_tags);
        } else {
            $tool->toolTags()->sync([]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Tool updated successfully!',
            'redirect' => route('admin.tools.index')
        ]);
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tool deleted successfully!'
        ]);
    }

    /**
     * Toggle the featured status of the specified tool.
     */
    public function toggleFeatured(Tool $tool)
    {
        $tool->is_featured = !$tool->is_featured;
        $tool->save();

        return response()->json([
            'success' => true,
            'is_featured' => $tool->is_featured,
            'message' => $tool->is_featured 
                ? 'Tool marked as featured!' 
                : 'Tool removed from featured!'
        ]);
    }
}
