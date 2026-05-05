<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogTagController;
use App\Http\Controllers\Admin\ToolCategoryController;
use App\Http\Controllers\Admin\ToolController;
use App\Http\Controllers\Admin\ToolTagController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Website\PageController as WebsitePageController;

// Website Routes
Route::get('/', function () {
    // Get tools with show_in_hero = true for hero banner (right side)
    $heroTools = \App\Models\Tool::with(['category', 'toolTags'])
        ->where('is_active', true)
        ->where('show_in_hero', true)
        ->orderBy('display_order')
        ->orderBy('name')
        ->get();
    
    // Get featured tools for "Our Products" section
    $featuredTools = \App\Models\Tool::with(['category', 'toolTags'])
        ->where('is_active', true)
        ->where('is_featured', true)
        ->orderBy('display_order')
        ->orderBy('name')
        ->get();
    
    // Get featured blogs for "Featured Blogs" section
    $featuredBlogs = \App\Models\Blog::with('category')
        ->where('status', 'published')
        ->where('is_featured', true)
        ->latest('published_date')
        ->limit(3)
        ->get();
    
    // Get categories with show_in_home = true for "Find Any Tool" section
    $homeCategories = \App\Models\ToolCategory::with(['tools' => function($query) {
            $query->where('is_active', true)
                  ->orderBy('display_order')
                  ->orderBy('name')
                  ->limit(5);
        }])
        ->where('is_active', true)
        ->where('show_in_home', true)
        ->orderBy('display_order')
        ->orderBy('name')
        ->get();
    
    // Get categories with show_in_built = true for "Built Section"
    $builtCategories = \App\Models\ToolCategory::with(['tools' => function($query) {
            $query->where('is_active', true)
                  ->orderBy('display_order')
                  ->orderBy('name')
                  ->limit(5);
        }])
        ->where('is_active', true)
        ->where('show_in_built', true)
        ->orderBy('display_order')
        ->orderBy('name')
        ->get();
    
    // Get categories for "Who It's Built For" section (same as builtCategories but with limit 3 tools)
    $useCaseCategories = \App\Models\ToolCategory::with(['tools' => function($query) {
            $query->where('is_active', true)
                  ->orderBy('display_order')
                  ->orderBy('name')
                  ->limit(3);
        }])
        ->where('is_active', true)
        ->where('show_in_built', true)
        ->orderBy('display_order')
        ->orderBy('name')
        ->get();
    
    // Get hero buttons settings
    $heroButtons = \App\Models\HeroButton::active()->ordered()->get();
    
    return view('website.home', compact('heroTools', 'featuredTools', 'featuredBlogs', 'homeCategories', 'builtCategories', 'useCaseCategories', 'heroButtons'));
})->name('home');

Route::get('/blog', function () {
    $selectedCategory = request('category');
    $selectedTag = request('tag');
    
    // Get featured blog
    $featuredBlog = \App\Models\Blog::with('category')
        ->where('status', 'published')
        ->where('is_featured', true)
        ->when($selectedCategory, function($query) use ($selectedCategory) {
            return $query->whereHas('category', function($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        })
        ->when($selectedTag, function($query) use ($selectedTag) {
            // Search in JSON tags field
            return $query->whereJsonContains('tags', $selectedTag);
        })
        ->latest('published_date')
        ->first();
    
    // Get latest 6 blogs for grid (excluding featured)
    $latestBlogs = \App\Models\Blog::with('category')
        ->where('status', 'published')
        ->when($featuredBlog, function($query) use ($featuredBlog) {
            return $query->where('id', '!=', $featuredBlog->id);
        })
        ->when($selectedCategory, function($query) use ($selectedCategory) {
            return $query->whereHas('category', function($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        })
        ->when($selectedTag, function($query) use ($selectedTag) {
            // Search in JSON tags field
            return $query->whereJsonContains('tags', $selectedTag);
        })
        ->latest('published_date')
        ->take(6)
        ->get();
    
    // Get all published blogs for listing (excluding featured and latest 6)
    $excludeIds = collect([$featuredBlog?->id])->merge($latestBlogs->pluck('id'))->filter()->toArray();
    $moreBlogs = \App\Models\Blog::with('category')
        ->where('status', 'published')
        ->whereNotIn('id', $excludeIds)
        ->when($selectedCategory, function($query) use ($selectedCategory) {
            return $query->whereHas('category', function($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        })
        ->when($selectedTag, function($query) use ($selectedTag) {
            // Search in JSON tags field
            return $query->whereJsonContains('tags', $selectedTag);
        })
        ->latest('published_date')
        ->paginate(6);
    
    // Get all categories with blog count (for filter bar)
    $categories = \App\Models\BlogCategory::withCount(['blogs' => function($query) {
        $query->where('status', 'published');
    }])->get();
    
    // Get only FEATURED categories for sidebar
    $sidebarCategories = \App\Models\BlogCategory::where('is_featured', true)
        ->withCount(['blogs' => function($query) {
            $query->where('status', 'published');
        }])
        ->orderBy('name')
        ->get();
    
    // Get popular tags from BlogTag table
    $popularTags = \App\Models\BlogTag::where('is_featured', true)
        ->orderBy('name')
        ->limit(10)
        ->get();
    
    // Get free tools for sidebar
    $freeTools = \App\Models\Tool::where('is_free', true)
        ->where('is_active', true)
        ->orderBy('name')
        ->limit(6)
        ->get();
    
    return view('website.blog', compact('featuredBlog', 'latestBlogs', 'moreBlogs', 'categories', 'sidebarCategories', 'popularTags', 'freeTools', 'selectedCategory', 'selectedTag'));
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {
    $blog = \App\Models\Blog::where('slug', $slug)->where('status', 'published')->firstOrFail();
    
    // Get related posts
    $relatedPosts = collect(); // Initialize as empty collection
    
    if ($blog->related_posts_ids && is_array($blog->related_posts_ids) && count($blog->related_posts_ids) > 0) {
        $relatedPosts = \App\Models\Blog::whereIn('id', $blog->related_posts_ids)
            ->where('status', 'published')
            ->limit(3)
            ->get();
    }
    
    // If no related posts specified, get from same category
    if ($relatedPosts->isEmpty() && $blog->category_id) {
        $relatedPosts = \App\Models\Blog::where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->where('status', 'published')
            ->latest()
            ->limit(3)
            ->get();
    }
    
    return view('website.blog-post', compact('blog', 'relatedPosts'));
})->name('blog.post');

// Tools Page
Route::get('/tools', function () {
    $selectedCategory = request('category');
    $selectedTag = request('tag');
    $showFreeOnly = request('free') === 'true'; // Check if free filter is active
    
    // Get featured tool
    $featuredTool = \App\Models\Tool::with('category')
        ->where('is_active', true)
        ->where('is_featured', true)
        ->when($showFreeOnly, function($query) {
            return $query->where('is_free', true);
        })
        ->when($selectedCategory, function($query) use ($selectedCategory) {
            return $query->whereHas('category', function($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        })
        ->when($selectedTag, function($query) use ($selectedTag) {
            return $query->whereHas('toolTags', function($q) use ($selectedTag) {
                $q->where('slug', $selectedTag);
            });
        })
        ->latest()
        ->first();
    
    // Get latest 6 tools for grid (excluding featured)
    $latestTools = \App\Models\Tool::with('category')
        ->where('is_active', true)
        ->when($showFreeOnly, function($query) {
            return $query->where('is_free', true);
        })
        ->when($featuredTool, function($query) use ($featuredTool) {
            return $query->where('id', '!=', $featuredTool->id);
        })
        ->when($selectedCategory, function($query) use ($selectedCategory) {
            return $query->whereHas('category', function($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        })
        ->when($selectedTag, function($query) use ($selectedTag) {
            return $query->whereHas('toolTags', function($q) use ($selectedTag) {
                $q->where('slug', $selectedTag);
            });
        })
        ->latest()
        ->take(6)
        ->get();
    
    // Get all active tools for listing (excluding featured and latest 6)
    $excludeIds = collect([$featuredTool?->id])->merge($latestTools->pluck('id'))->filter()->toArray();
    $moreTools = \App\Models\Tool::with('category')
        ->where('is_active', true)
        ->when($showFreeOnly, function($query) {
            return $query->where('is_free', true);
        })
        ->whereNotIn('id', $excludeIds)
        ->when($selectedCategory, function($query) use ($selectedCategory) {
            return $query->whereHas('category', function($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        })
        ->when($selectedTag, function($query) use ($selectedTag) {
            return $query->whereHas('toolTags', function($q) use ($selectedTag) {
                $q->where('slug', $selectedTag);
            });
        })
        ->latest()
        ->paginate(6);
    
    // Get all categories with tool count (for filter bar)
    $categories = \App\Models\ToolCategory::withCount(['tools' => function($query) use ($showFreeOnly) {
        $query->where('is_active', true);
        if ($showFreeOnly) {
            $query->where('is_free', true);
        }
    }])->get();
    
    // Get only FEATURED categories for sidebar
    $sidebarCategories = \App\Models\ToolCategory::where('is_featured', true)
        ->withCount(['tools' => function($query) use ($showFreeOnly) {
            $query->where('is_active', true);
            if ($showFreeOnly) {
                $query->where('is_free', true);
            }
        }])
        ->orderBy('name')
        ->get();
    
    // Get popular tags from ToolTag table
    $popularTags = \App\Models\ToolTag::where('is_featured', true)
        ->orderBy('name')
        ->limit(10)
        ->get();
    
    // Get free tools for sidebar
    $freeTools = \App\Models\Tool::where('is_free', true)
        ->where('is_active', true)
        ->orderBy('name')
        ->limit(6)
        ->get();
    
    return view('website.tools', compact('featuredTool', 'latestTools', 'moreTools', 'categories', 'sidebarCategories', 'popularTags', 'freeTools', 'selectedCategory', 'selectedTag', 'showFreeOnly'));
})->name('tools');


// About Page
Route::get('/about', function () {
    // Get 3 featured tool categories
    $featuredCategories = \App\Models\ToolCategory::where('is_featured', true)
        ->where('is_active', true)
        ->withCount('tools')
        ->orderBy('name')
        ->take(3)
        ->get();
    
    return view('website.about', compact('featuredCategories'));
})->name('about');

// Contact Page
Route::get('/contact', function () {
    // Get social media settings
    $settings = \App\Models\Setting::where('group', 'social_media')->get();
    
    // Format data by platform
    $socialMedia = [];
    $platforms = ['facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pinterest', 'tiktok', 'github'];
    
    foreach ($platforms as $platform) {
        $active = $settings->where('key', $platform . '_active')->first();
        $url = $settings->where('key', $platform . '_url')->first();
        
        $socialMedia[$platform] = [
            'active' => $active ? (bool)$active->value : false,
            'url' => $url ? $url->value : ''
        ];
    }
    
    // Get contact emails
    $contactEmail = \App\Models\Setting::where('key', 'contact_email')->value('value') ?? 'hello@toolversehub.com';
    $supportEmail = \App\Models\Setting::where('key', 'support_email')->value('value') ?? 'support@toolversehub.com';
    
    return view('website.contact', compact('socialMedia', 'contactEmail', 'supportEmail'));
})->name('contact');

// Contact Form Submission
Route::post('/contact/submit', [App\Http\Controllers\Website\ContactController::class, 'submit'])->name('contact.submit');

// Blog Search API
Route::get('/api/blog/search', function () {
    $query = request('q');
    
    if (!$query || strlen($query) < 3) {
        return response()->json([]);
    }
    
    $blogs = \App\Models\Blog::with('category')
        ->where('status', 'published')
        ->where(function($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%')
              ->orWhere('meta_description', 'like', '%' . $query . '%')
              ->orWhere('tldr_summary', 'like', '%' . $query . '%');
        })
        ->limit(5)
        ->get()
        ->map(function($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'slug' => $blog->slug,
                'category' => $blog->category ? $blog->category->name : null,
                'category_icon' => $blog->category ? $blog->category->icon_emoji : '📁',
                'excerpt' => \Illuminate\Support\Str::limit(strip_tags($blog->tldr_summary ?? $blog->meta_description ?? ''), 80),
                'url' => route('blog.post', $blog->slug),
            ];
        });
    
    return response()->json($blogs);
})->name('blog.search');

// Tools Search API
Route::get('/api/tools/search', function () {
    $query = request('q');
    
    if (!$query || strlen($query) < 3) {
        return response()->json([]);
    }
    
    $tools = \App\Models\Tool::with('category')
        ->where('is_active', true)
        ->where(function($q) use ($query) {
            $q->where('name', 'like', '%' . $query . '%')
              ->orWhere('description', 'like', '%' . $query . '%');
        })
        ->limit(5)
        ->get()
        ->map(function($tool) {
            return [
                'id' => $tool->id,
                'title' => $tool->name,
                'slug' => $tool->slug,
                'category' => $tool->category ? $tool->category->name : null,
                'category_icon' => $tool->category ? $tool->category->icon : '🔧',
                'excerpt' => \Illuminate\Support\Str::limit($tool->description ?? '', 80),
                'url' => $tool->url ?? '#',
            ];
        });
    
    return response()->json($tools);
})->name('tools.search');

// Guides Page
Route::get('/guides', function () {
    return view('website.guides');
})->name('guides');

// FAQ Page
Route::get('/faq', function () {
    $faqs = \App\Models\Faq::active()->ordered()->get()->groupBy('category');
    return view('website.faq', compact('faqs'));
})->name('faq');

// Static Pages (Privacy, Terms, Cookies)
Route::get('/{slug}', [WebsitePageController::class, 'show'])->name('page.show');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    
    // Protected Admin Routes (require login)
    Route::middleware(['web'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/test', function () {
            return view('admin.test');
        })->name('test');
        
        // Blog Management
        Route::resource('blogs', BlogController::class);
        
        // Blog Category Management
        Route::resource('blog-categories', BlogCategoryController::class);
        Route::post('blog-categories/{blogCategory}/toggle-featured', [BlogCategoryController::class, 'toggleFeatured'])->name('blog-categories.toggle-featured');
        
        // Blog Tag Management
        Route::resource('blog-tags', BlogTagController::class);
        Route::post('blog-tags/{blogTag}/toggle-featured', [BlogTagController::class, 'toggleFeatured'])->name('blog-tags.toggle-featured');
        
        // Tool Category Management
        Route::resource('tool-categories', ToolCategoryController::class);
        Route::post('tool-categories/{toolCategory}/toggle-featured', [ToolCategoryController::class, 'toggleFeatured'])->name('tool-categories.toggle-featured');
        
        // Tool Management
        Route::resource('tools', ToolController::class);
        Route::post('tools/{tool}/toggle-featured', [ToolController::class, 'toggleFeatured'])->name('tools.toggle-featured');
        
        // Tool Tag Management
        Route::resource('tool-tags', ToolTagController::class);
        Route::post('tool-tags/{toolTag}/toggle-featured', [ToolTagController::class, 'toggleFeatured'])->name('tool-tags.toggle-featured');
        
        // Page Management
        Route::resource('pages', AdminPageController::class);
        
        // FAQ Management
        Route::resource('faqs', AdminFaqController::class);
        
        // Contact Messages Management
        Route::get('contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
        Route::get('contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contacts.show');
        Route::post('contacts/{contact}/toggle-read', [\App\Http\Controllers\Admin\ContactController::class, 'toggleRead'])->name('contacts.toggle-read');
        Route::delete('contacts/{contact}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');
        Route::post('contacts/bulk-action', [\App\Http\Controllers\Admin\ContactController::class, 'bulkAction'])->name('contacts.bulk-action');
        
        // Settings
        Route::get('/settings/general', [SettingsController::class, 'general'])->name('settings.general');
        Route::post('/settings/general', [SettingsController::class, 'updateGeneral'])->name('settings.general.update');
        Route::get('/settings/homepage', [SettingsController::class, 'homepage'])->name('settings.homepage');
        Route::post('/settings/homepage', [SettingsController::class, 'updateHomepage'])->name('settings.homepage.update');
        
        // Hero Button Management Routes
        Route::post('/settings/hero-buttons', [SettingsController::class, 'storeHeroButton'])->name('settings.hero-buttons.store');
        Route::put('/settings/hero-buttons/{id}', [SettingsController::class, 'updateHeroButton'])->name('settings.hero-buttons.update');
        Route::delete('/settings/hero-buttons/{id}', [SettingsController::class, 'deleteHeroButton'])->name('settings.hero-buttons.delete');
        Route::post('/settings/hero-buttons/{id}/toggle', [SettingsController::class, 'toggleHeroButton'])->name('settings.hero-buttons.toggle');
        
        Route::get('/settings/advertisements', [SettingsController::class, 'advertisements'])->name('settings.advertisements');
        Route::post('/settings/advertisements', [SettingsController::class, 'updateAdvertisements'])->name('settings.advertisements.update');
        Route::get('/settings/seo', [SettingsController::class, 'seo'])->name('settings.seo');
        Route::post('/settings/seo', [SettingsController::class, 'updateSeo'])->name('settings.seo.update');
        Route::post('/settings/sitemap/generate', [SettingsController::class, 'generateSitemap'])->name('settings.sitemap.generate');
        Route::get('/settings/security', [SettingsController::class, 'security'])->name('settings.security');
        Route::post('/settings/security', [SettingsController::class, 'updateSecurity'])->name('settings.security.update');
        Route::get('/settings/social-media', [SettingsController::class, 'socialMedia'])->name('settings.social-media');
        Route::post('/settings/social-media', [SettingsController::class, 'updateSocialMedia'])->name('settings.social-media.update');
    });
});
