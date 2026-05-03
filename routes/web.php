<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;

// Website Routes
Route::get('/', function () {
    return view('website.home');
})->name('home');

Route::get('/blog', function () {
    $blogs = \App\Models\Blog::with('category')
        ->where('status', 'published')
        ->latest('published_date')
        ->paginate(9);
    
    return view('website.blog', compact('blogs'));
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
    });
});
