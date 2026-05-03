<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::with('category')->latest();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $blogs = $query->paginate(10);
        $categories = BlogCategory::all();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('order')->get();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blogs,slug',
            'category_id' => 'nullable|exists:blog_categories,id',
            'category_color' => 'required|in:g,c,b,a',
            'author_name' => 'required|string|max:100',
            'content' => 'required|string',
            'published_date' => 'required|date',
            'read_time' => 'required|integer|min:1',
            'status' => 'required|in:draft,published,archived',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle file uploads
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blogs', 'public');
            $validated['featured_image'] = $path;
        }

        if ($request->hasFile('author_avatar')) {
            $path = $request->file('author_avatar')->store('authors', 'public');
            $validated['author_avatar'] = $path;
        }

        // Handle Simple Text Fields
        $validated['meta_title'] = $request->input('meta_title');
        $validated['meta_description'] = $request->input('meta_description');
        $validated['seo_keywords'] = $request->input('seo_keywords');
        $validated['canonical_url'] = $request->input('canonical_url');
        $validated['featured_image_emoji'] = $request->input('featured_image_emoji');
        $validated['author_emoji'] = $request->input('author_emoji', '✍️');
        $validated['author_bio'] = $request->input('author_bio');
        $validated['tldr_summary'] = $request->input('tldr_summary');
        $validated['updated_date'] = $request->input('updated_date');

        // Handle Tags (comma-separated to array)
        if ($request->filled('tags')) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        // Handle Key Facts (HTML list from Quill to array)
        if ($request->filled('key_facts')) {
            $keyFactsHtml = $request->key_facts;
            // Extract list items from HTML
            preg_match_all('/<li>(.*?)<\/li>/s', $keyFactsHtml, $matches);
            if (!empty($matches[1])) {
                $validated['key_facts'] = array_map(function($item) {
                    return strip_tags(trim($item));
                }, $matches[1]);
            } else {
                // Fallback: treat as plain text if no HTML list found
                $validated['key_facts'] = array_filter(array_map('trim', explode("\n", strip_tags($keyFactsHtml))));
            }
        }


        // Handle Badges (from separate fields)
        if ($request->filled('badge_primary') || $request->filled('badge_secondary')) {
            $validated['badges'] = [
                'primary' => $request->input('badge_primary'),
                'secondary' => $request->input('badge_secondary'),
            ];
        }

        // Handle Table of Contents (from dynamic fields)
        if ($request->has('toc_id') && is_array($request->toc_id)) {
            $toc = [];
            foreach ($request->toc_id as $index => $id) {
                if (!empty($id) && !empty($request->toc_title[$index])) {
                    $toc[] = [
                        'id' => $id,
                        'title' => $request->toc_title[$index],
                    ];
                }
            }
            if (!empty($toc)) {
                $validated['table_of_contents'] = $toc;
            }
        }

        // Handle Tool Boxes (from dynamic fields)
        if ($request->has('toolbox_title') && is_array($request->toolbox_title)) {
            $toolboxes = [];
            foreach ($request->toolbox_title as $index => $title) {
                if (!empty($title)) {
                    $toolboxes[] = [
                        'emoji' => $request->toolbox_emoji[$index] ?? '',
                        'title' => $title,
                        'description' => $request->toolbox_description[$index] ?? '',
                        'button_text' => $request->toolbox_button_text[$index] ?? '',
                        'button_url' => $request->toolbox_button_url[$index] ?? '',
                        'color' => $request->toolbox_color[$index] ?? 'g',
                    ];
                }
            }
            if (!empty($toolboxes)) {
                $validated['tool_boxes'] = $toolboxes;
            }
        }

        // Handle Steps (from dynamic fields)
        if ($request->has('step_title') && is_array($request->step_title)) {
            $steps = [];
            foreach ($request->step_title as $index => $title) {
                if (!empty($title)) {
                    $steps[] = [
                        'number' => $request->step_number[$index] ?? ($index + 1),
                        'title' => $title,
                        'description' => $request->step_description[$index] ?? '',
                    ];
                }
            }
            if (!empty($steps)) {
                $validated['steps'] = $steps;
            }
        }

        // Handle Callouts (from dynamic fields)
        if ($request->has('callout_content') && is_array($request->callout_content)) {
            $callouts = [];
            foreach ($request->callout_content as $index => $content) {
                if (!empty($content)) {
                    $callouts[] = [
                        'type' => $request->callout_type[$index] ?? 'tip',
                        'icon' => $request->callout_icon[$index] ?? '💡',
                        'content' => $content,
                    ];
                }
            }
            if (!empty($callouts)) {
                $validated['callouts'] = $callouts;
            }
        }

        // Handle FAQs (from dynamic fields)
        if ($request->has('faq_question') && is_array($request->faq_question)) {
            $faqs = [];
            foreach ($request->faq_question as $index => $question) {
                if (!empty($question) && !empty($request->faq_answer[$index])) {
                    $faqs[] = [
                        'question' => $question,
                        'answer' => $request->faq_answer[$index],
                    ];
                }
            }
            if (!empty($faqs)) {
                $validated['faqs'] = $faqs;
            }
        }

        // Handle Conclusion Data (from separate fields)
        if ($request->filled('conclusion_title') || $request->filled('conclusion_content')) {
            $conclusionData = [
                'title' => $request->input('conclusion_title'),
                'content' => $request->input('conclusion_content'),
                'buttons' => [],
            ];
            
            // Add conclusion buttons
            if ($request->has('conclusion_btn_text') && is_array($request->conclusion_btn_text)) {
                foreach ($request->conclusion_btn_text as $index => $text) {
                    if (!empty($text)) {
                        $conclusionData['buttons'][] = [
                            'text' => $text,
                            'url' => $request->conclusion_btn_url[$index] ?? '#',
                            'color' => $request->conclusion_btn_color[$index] ?? 'g',
                        ];
                    }
                }
            }
            
            $validated['conclusion_data'] = $conclusionData;
        }

        // Handle Comparison Table (simplified format)
        if ($request->filled('comparison_headers') || $request->filled('comparison_rows')) {
            $headers = array_map('trim', explode(',', $request->comparison_headers ?? ''));
            $rowsText = $request->comparison_rows ?? '';
            $rows = [];
            
            foreach (explode("\n", $rowsText) as $line) {
                $line = trim($line);
                if (!empty($line)) {
                    $rows[] = array_map('trim', explode(',', $line));
                }
            }
            
            if (!empty($headers) && !empty($rows)) {
                $validated['comparison_table'] = [
                    'headers' => $headers,
                    'rows' => $rows,
                ];
            }
        }

        // Handle Sidebar Promos (from dynamic fields)
        if ($request->has('promo_name') && is_array($request->promo_name)) {
            $promos = [];
            foreach ($request->promo_name as $index => $name) {
                if (!empty($name)) {
                    $promos[] = [
                        'emoji' => $request->promo_emoji[$index] ?? '',
                        'name' => $name,
                        'description' => $request->promo_description[$index] ?? '',
                        'link_text' => $request->promo_link_text[$index] ?? '',
                        'link_url' => $request->promo_link_url[$index] ?? '',
                        'color' => $request->promo_color[$index] ?? 'g',
                    ];
                }
            }
            if (!empty($promos)) {
                $validated['sidebar_promos'] = $promos;
            }
        }

        // Handle Quick Links (from dynamic fields)
        if ($request->has('quick_link_text') && is_array($request->quick_link_text)) {
            $quickLinks = [];
            foreach ($request->quick_link_text as $index => $text) {
                if (!empty($text)) {
                    $quickLinks[] = [
                        'text' => $text,
                        'url' => $request->quick_link_url[$index] ?? '#',
                        'color' => $request->quick_link_color[$index] ?? 'g',
                    ];
                }
            }
            if (!empty($quickLinks)) {
                $validated['quick_links'] = $quickLinks;
            }
        }

        // Handle Related Posts IDs (comma-separated to array)
        if ($request->filled('related_posts_ids')) {
            $ids = array_map('trim', explode(',', $request->related_posts_ids));
            $ids = array_filter($ids, 'is_numeric');
            $validated['related_posts_ids'] = array_map('intval', $ids);
        }

        // Handle checkboxes
        $validated['is_beginner_friendly'] = $request->has('is_beginner_friendly');
        $validated['is_featured'] = $request->has('is_featured');

        // Create blog
        $blog = Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified blog (redirect to frontend).
     */
    public function show(Blog $blog)
    {
        // Redirect to frontend blog post page
        return redirect()->route('blog.post', $blog->slug);
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::orderBy('order')->get();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blogs,slug,' . $blog->id,
            'category_id' => 'nullable|exists:blog_categories,id',
            'category_color' => 'required|in:g,c,b,a',
            'author_name' => 'required|string|max:100',
            'content' => 'required|string',
            'published_date' => 'required|date',
            'read_time' => 'required|integer|min:1',
            'status' => 'required|in:draft,published,archived',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle file uploads
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('blogs', 'public');
            $validated['featured_image'] = $path;
        }

        if ($request->hasFile('author_avatar')) {
            $path = $request->file('author_avatar')->store('authors', 'public');
            $validated['author_avatar'] = $path;
        }

        // Handle Simple Text Fields
        $validated['meta_title'] = $request->input('meta_title');
        $validated['meta_description'] = $request->input('meta_description');
        $validated['seo_keywords'] = $request->input('seo_keywords');
        $validated['canonical_url'] = $request->input('canonical_url');
        $validated['featured_image_emoji'] = $request->input('featured_image_emoji');
        $validated['author_emoji'] = $request->input('author_emoji', '✍️');
        $validated['author_bio'] = $request->input('author_bio');
        $validated['tldr_summary'] = $request->input('tldr_summary');
        $validated['updated_date'] = $request->input('updated_date', now()->toDateString());

        // Handle Tags (comma-separated to array)
        if ($request->filled('tags')) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        // Handle Key Facts (HTML list from Quill to array)
        if ($request->filled('key_facts')) {
            $keyFactsHtml = $request->key_facts;
            // Extract list items from HTML
            preg_match_all('/<li>(.*?)<\/li>/s', $keyFactsHtml, $matches);
            if (!empty($matches[1])) {
                $validated['key_facts'] = array_map(function($item) {
                    return strip_tags(trim($item));
                }, $matches[1]);
            } else {
                // Fallback: treat as plain text if no HTML list found
                $validated['key_facts'] = array_filter(array_map('trim', explode("\n", strip_tags($keyFactsHtml))));
            }
        }


        // Handle Badges (from separate fields)
        if ($request->filled('badge_primary') || $request->filled('badge_secondary')) {
            $validated['badges'] = [
                'primary' => $request->input('badge_primary'),
                'secondary' => $request->input('badge_secondary'),
            ];
        }

        // Handle Table of Contents (from dynamic fields)
        if ($request->has('toc_id') && is_array($request->toc_id)) {
            $toc = [];
            foreach ($request->toc_id as $index => $id) {
                if (!empty($id) && !empty($request->toc_title[$index])) {
                    $toc[] = [
                        'id' => $id,
                        'title' => $request->toc_title[$index],
                    ];
                }
            }
            if (!empty($toc)) {
                $validated['table_of_contents'] = $toc;
            }
        }

        // Handle Tool Boxes (from dynamic fields)
        if ($request->has('toolbox_title') && is_array($request->toolbox_title)) {
            $toolboxes = [];
            foreach ($request->toolbox_title as $index => $title) {
                if (!empty($title)) {
                    $toolboxes[] = [
                        'emoji' => $request->toolbox_emoji[$index] ?? '',
                        'title' => $title,
                        'description' => $request->toolbox_description[$index] ?? '',
                        'button_text' => $request->toolbox_button_text[$index] ?? '',
                        'button_url' => $request->toolbox_button_url[$index] ?? '',
                        'color' => $request->toolbox_color[$index] ?? 'g',
                    ];
                }
            }
            if (!empty($toolboxes)) {
                $validated['tool_boxes'] = $toolboxes;
            }
        }

        // Handle Steps (from dynamic fields)
        if ($request->has('step_title') && is_array($request->step_title)) {
            $steps = [];
            foreach ($request->step_title as $index => $title) {
                if (!empty($title)) {
                    $steps[] = [
                        'number' => $request->step_number[$index] ?? ($index + 1),
                        'title' => $title,
                        'description' => $request->step_description[$index] ?? '',
                    ];
                }
            }
            if (!empty($steps)) {
                $validated['steps'] = $steps;
            }
        }

        // Handle Callouts (from dynamic fields)
        if ($request->has('callout_content') && is_array($request->callout_content)) {
            $callouts = [];
            foreach ($request->callout_content as $index => $content) {
                if (!empty($content)) {
                    $callouts[] = [
                        'type' => $request->callout_type[$index] ?? 'tip',
                        'icon' => $request->callout_icon[$index] ?? '💡',
                        'content' => $content,
                    ];
                }
            }
            if (!empty($callouts)) {
                $validated['callouts'] = $callouts;
            }
        }

        // Handle FAQs (from dynamic fields)
        if ($request->has('faq_question') && is_array($request->faq_question)) {
            $faqs = [];
            foreach ($request->faq_question as $index => $question) {
                if (!empty($question) && !empty($request->faq_answer[$index])) {
                    $faqs[] = [
                        'question' => $question,
                        'answer' => $request->faq_answer[$index],
                    ];
                }
            }
            if (!empty($faqs)) {
                $validated['faqs'] = $faqs;
            }
        }

        // Handle Conclusion Data (from separate fields)
        if ($request->filled('conclusion_title') || $request->filled('conclusion_content')) {
            $conclusionData = [
                'title' => $request->input('conclusion_title'),
                'content' => $request->input('conclusion_content'),
                'buttons' => [],
            ];
            
            // Add conclusion buttons
            if ($request->has('conclusion_btn_text') && is_array($request->conclusion_btn_text)) {
                foreach ($request->conclusion_btn_text as $index => $text) {
                    if (!empty($text)) {
                        $conclusionData['buttons'][] = [
                            'text' => $text,
                            'url' => $request->conclusion_btn_url[$index] ?? '#',
                            'color' => $request->conclusion_btn_color[$index] ?? 'g',
                        ];
                    }
                }
            }
            
            $validated['conclusion_data'] = $conclusionData;
        }

        // Handle Comparison Table (simplified format)
        if ($request->filled('comparison_headers') || $request->filled('comparison_rows')) {
            $headers = array_map('trim', explode(',', $request->comparison_headers ?? ''));
            $rowsText = $request->comparison_rows ?? '';
            $rows = [];
            
            foreach (explode("\n", $rowsText) as $line) {
                $line = trim($line);
                if (!empty($line)) {
                    $rows[] = array_map('trim', explode(',', $line));
                }
            }
            
            if (!empty($headers) && !empty($rows)) {
                $validated['comparison_table'] = [
                    'headers' => $headers,
                    'rows' => $rows,
                ];
            }
        }

        // Handle Sidebar Promos (from dynamic fields)
        if ($request->has('promo_name') && is_array($request->promo_name)) {
            $promos = [];
            foreach ($request->promo_name as $index => $name) {
                if (!empty($name)) {
                    $promos[] = [
                        'emoji' => $request->promo_emoji[$index] ?? '',
                        'name' => $name,
                        'description' => $request->promo_description[$index] ?? '',
                        'link_text' => $request->promo_link_text[$index] ?? '',
                        'link_url' => $request->promo_link_url[$index] ?? '',
                        'color' => $request->promo_color[$index] ?? 'g',
                    ];
                }
            }
            if (!empty($promos)) {
                $validated['sidebar_promos'] = $promos;
            }
        }

        // Handle Quick Links (from dynamic fields)
        if ($request->has('quick_link_text') && is_array($request->quick_link_text)) {
            $quickLinks = [];
            foreach ($request->quick_link_text as $index => $text) {
                if (!empty($text)) {
                    $quickLinks[] = [
                        'text' => $text,
                        'url' => $request->quick_link_url[$index] ?? '#',
                        'color' => $request->quick_link_color[$index] ?? 'g',
                    ];
                }
            }
            if (!empty($quickLinks)) {
                $validated['quick_links'] = $quickLinks;
            }
        }

        // Handle Related Posts IDs (comma-separated to array)
        if ($request->filled('related_posts_ids')) {
            $ids = array_map('trim', explode(',', $request->related_posts_ids));
            $ids = array_filter($ids, 'is_numeric');
            $validated['related_posts_ids'] = array_map('intval', $ids);
        }

        // Handle checkboxes
        $validated['is_beginner_friendly'] = $request->has('is_beginner_friendly');
        $validated['is_featured'] = $request->has('is_featured');

        // Update blog
        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully!');
    }
}
