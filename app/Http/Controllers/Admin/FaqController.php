<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('category')->orderBy('display_order')->paginate(20);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|in:general,tools,games,account',
            'display_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['display_order'] = $validated['display_order'] ?? 0;

        Faq::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'FAQ created successfully!',
            'redirect' => route('admin.faqs.index')
        ]);
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|in:general,tools,games,account',
            'display_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['display_order'] = $validated['display_order'] ?? 0;

        $faq->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'FAQ updated successfully!',
            'redirect' => route('admin.faqs.index')
        ]);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return response()->json([
            'success' => true,
            'message' => 'FAQ deleted successfully!'
        ]);
    }
}
