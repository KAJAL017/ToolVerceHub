<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        // Check credentials
        if ($request->email === 'super@gmail.com' && $request->password === '2580') {
            // Store admin session
            session([
                'admin_logged_in' => true,
                'admin_email' => $request->email,
                'admin_name' => 'Super Admin'
            ]);
            
            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    /**
     * Show admin dashboard.
     */
    public function dashboard()
    {
        // Check if admin is logged in
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please login first']);
        }
        
        // Get dynamic statistics
        $stats = [
            'total_blogs' => \App\Models\Blog::count(),
            'published_blogs' => \App\Models\Blog::where('status', 'published')->count(),
            'draft_blogs' => \App\Models\Blog::where('status', 'draft')->count(),
            'total_categories' => \App\Models\BlogCategory::count(),
            'total_tags' => \App\Models\BlogTag::count(),
            'total_tools' => \App\Models\Tool::count(),
            'active_tools' => \App\Models\Tool::where('is_active', true)->count(),
            'total_tool_categories' => \App\Models\ToolCategory::count(),
            'total_faqs' => \App\Models\Faq::count(),
            'active_faqs' => \App\Models\Faq::where('is_active', true)->count(),
            'total_pages' => \App\Models\Page::count(),
            'total_contacts' => \App\Models\ContactSubmission::count(),
            'unread_contacts' => \App\Models\ContactSubmission::where('is_read', false)->count(),
        ];
        
        // Get recent blogs
        $recentBlogs = \App\Models\Blog::with('category')
            ->latest()
            ->take(5)
            ->get();
        
        // Get popular blogs (featured ones)
        $popularBlogs = \App\Models\Blog::where('is_featured', true)
            ->where('status', 'published')
            ->latest('published_date')
            ->take(5)
            ->get();
        
        // Get blog categories with count
        $categoriesWithCount = \App\Models\BlogCategory::withCount('blogs')
            ->orderBy('blogs_count', 'desc')
            ->take(5)
            ->get();
        
        // Get tool categories with count
        $toolCategoriesWithCount = \App\Models\ToolCategory::withCount('tools')
            ->orderBy('tools_count', 'desc')
            ->take(5)
            ->get();
        
        // Monthly blog stats (last 6 months)
        $monthlyStats = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $count = \App\Models\Blog::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $monthlyStats[] = [
                'month' => $date->format('M'),
                'count' => $count,
                'percentage' => $count > 0 ? min(($count / max($stats['total_blogs'], 1)) * 100, 100) : 0
            ];
        }
        
        // Get recent contact submissions
        $recentContacts = \App\Models\ContactSubmission::latest()
            ->take(5)
            ->get();
        
        // FAQ stats by category
        $faqsByCategory = \App\Models\Faq::selectRaw('category, count(*) as count')
            ->where('is_active', true)
            ->groupBy('category')
            ->get();
        
        // Share unread contacts count with view
        view()->share('unreadContactsCount', $stats['unread_contacts']);
        
        return view('admin.dashboard', compact(
            'stats',
            'recentBlogs',
            'popularBlogs',
            'categoriesWithCount',
            'toolCategoriesWithCount',
            'monthlyStats',
            'recentContacts',
            'faqsByCategory'
        ));
    }
    
    /**
     * Handle admin logout.
     */
    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_email', 'admin_name']);
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}
