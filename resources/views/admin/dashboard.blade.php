@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back! Here\'s what\'s happening with your platform today.')

@section('content')

{{-- Stats Cards Row 1 --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    
    {{-- Total Blogs Card --}}
    <a href="{{ route('admin.blogs.index') }}" class="group bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-blog text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium opacity-90">Total Blogs</p>
                <h3 class="text-4xl font-bold mt-1">{{ $stats['total_blogs'] }}</h3>
            </div>
        </div>
        <div class="flex items-center justify-between pt-4 border-t border-white border-opacity-20">
            <span class="text-sm opacity-90">
                <i class="fas fa-check-circle mr-1"></i>{{ $stats['published_blogs'] }} Published
            </span>
            <span class="text-sm opacity-90">
                <i class="fas fa-file-alt mr-1"></i>{{ $stats['draft_blogs'] }} Drafts
            </span>
        </div>
    </a>
    
    {{-- Total Tools Card --}}
    <a href="{{ route('admin.tools.index') }}" class="group bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-toolbox text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium opacity-90">Total Tools</p>
                <h3 class="text-4xl font-bold mt-1">{{ $stats['total_tools'] }}</h3>
            </div>
        </div>
        <div class="flex items-center justify-between pt-4 border-t border-white border-opacity-20">
            <span class="text-sm opacity-90">
                <i class="fas fa-toggle-on mr-1"></i>{{ $stats['active_tools'] }} Active
            </span>
            <span class="text-sm opacity-90">
                <i class="fas fa-layer-group mr-1"></i>{{ $stats['total_tool_categories'] }} Categories
            </span>
        </div>
    </a>
    
    {{-- Categories Card --}}
    <a href="{{ route('admin.blog-categories.index') }}" class="group bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-folder text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium opacity-90">Categories</p>
                <h3 class="text-4xl font-bold mt-1">{{ $stats['total_categories'] }}</h3>
            </div>
        </div>
        <div class="flex items-center justify-between pt-4 border-t border-white border-opacity-20">
            <span class="text-sm opacity-90">
                <i class="fas fa-newspaper mr-1"></i>Blog Categories
            </span>
            <span class="text-sm opacity-90">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </span>
        </div>
    </a>
    
    {{-- Tags Card --}}
    <a href="{{ route('admin.blog-tags.index') }}" class="group bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-tags text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium opacity-90">Total Tags</p>
                <h3 class="text-4xl font-bold mt-1">{{ $stats['total_tags'] }}</h3>
            </div>
        </div>
        <div class="flex items-center justify-between pt-4 border-t border-white border-opacity-20">
            <span class="text-sm opacity-90">
                <i class="fas fa-tag mr-1"></i>Blog Tags
            </span>
            <span class="text-sm opacity-90">
                Manage <i class="fas fa-arrow-right ml-1"></i>
            </span>
        </div>
    </a>
    
</div>

{{-- Stats Cards Row 2 - New Widgets --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    {{-- FAQs Card --}}
    <a href="{{ route('admin.faqs.index') }}" class="group bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-question-circle text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium opacity-90">Total FAQs</p>
                <h3 class="text-4xl font-bold mt-1">{{ $stats['total_faqs'] }}</h3>
            </div>
        </div>
        <div class="flex items-center justify-between pt-4 border-t border-white border-opacity-20">
            <span class="text-sm opacity-90">
                <i class="fas fa-check-circle mr-1"></i>{{ $stats['active_faqs'] }} Active
            </span>
            <span class="text-sm opacity-90">
                <i class="fas fa-list mr-1"></i>{{ $faqsByCategory->count() }} Categories
            </span>
        </div>
    </a>
    
    {{-- Pages Card --}}
    <a href="{{ route('admin.pages.index') }}" class="group bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-file-alt text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium opacity-90">Total Pages</p>
                <h3 class="text-4xl font-bold mt-1">{{ $stats['total_pages'] }}</h3>
            </div>
        </div>
        <div class="flex items-center justify-between pt-4 border-t border-white border-opacity-20">
            <span class="text-sm opacity-90">
                <i class="fas fa-globe mr-1"></i>Legal & Static
            </span>
            <span class="text-sm opacity-90">
                Manage <i class="fas fa-arrow-right ml-1"></i>
            </span>
        </div>
    </a>
    
    {{-- Contact Submissions Card --}}
    <a href="{{ route('admin.contacts.index') }}" class="group bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1 cursor-pointer">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-envelope text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium opacity-90">Contact Forms</p>
                <h3 class="text-4xl font-bold mt-1">{{ $stats['total_contacts'] }}</h3>
            </div>
        </div>
        <div class="flex items-center justify-between pt-4 border-t border-white border-opacity-20">
            <span class="text-sm opacity-90">
                <i class="fas fa-envelope-open mr-1"></i>{{ $stats['unread_contacts'] }} Unread
            </span>
            <span class="text-sm opacity-90">
                <i class="fas fa-check-double mr-1"></i>{{ $stats['total_contacts'] - $stats['unread_contacts'] }} Read
            </span>
        </div>
    </a>
    
    {{-- Quick Actions Card --}}
    <div class="group bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-white transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                <i class="fas fa-bolt text-2xl"></i>
            </div>
            <div class="text-right">
                <p class="text-sm font-medium opacity-90">Quick Actions</p>
                <h3 class="text-2xl font-bold mt-1">Shortcuts</h3>
            </div>
        </div>
        <div class="flex items-center justify-between pt-4 border-t border-white border-opacity-20">
            <a href="{{ route('admin.blogs.create') }}" class="text-sm opacity-90 hover:opacity-100 transition-opacity">
                <i class="fas fa-plus mr-1"></i>New Blog
            </a>
            <a href="{{ route('admin.tools.create') }}" class="text-sm opacity-90 hover:opacity-100 transition-opacity">
                <i class="fas fa-plus mr-1"></i>New Tool
            </a>
        </div>
    </div>
    
</div>

{{-- Charts and Analytics Row --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    
    {{-- Monthly Blog Statistics --}}
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-chart-line text-primary-600 mr-3"></i>
                    Content Growth
                </h3>
                <p class="text-sm text-gray-500 mt-1">Monthly blog creation statistics</p>
            </div>
            <div class="flex items-center space-x-2">
                <span class="px-3 py-1 bg-primary-50 text-primary-600 rounded-lg text-sm font-semibold">
                    Last 6 Months
                </span>
            </div>
        </div>
        
        <div class="space-y-4">
            @foreach($monthlyStats as $stat)
            <div class="flex items-center space-x-4">
                <span class="text-sm font-semibold text-gray-700 w-12">{{ $stat['month'] }}</span>
                <div class="flex-1 bg-gray-100 rounded-full h-10 overflow-hidden relative">
                    <div class="bg-gradient-to-r from-primary-500 to-primary-600 h-full rounded-full flex items-center justify-end pr-4 transition-all duration-500" 
                         style="width: {{ $stat['percentage'] }}%;">
                        @if($stat['count'] > 0)
                        <span class="text-sm font-bold text-white">{{ $stat['count'] }} {{ Str::plural('blog', $stat['count']) }}</span>
                        @endif
                    </div>
                    @if($stat['count'] == 0)
                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-sm text-gray-400">No blogs</span>
                    @endif
                </div>
                <span class="text-sm font-semibold text-gray-600 w-16 text-right">{{ number_format($stat['percentage'], 1) }}%</span>
            </div>
            @endforeach
        </div>
        
        <div class="mt-6 pt-6 border-t border-gray-100 grid grid-cols-3 gap-4">
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-800">{{ $stats['total_blogs'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Total Blogs</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-green-600">{{ $stats['published_blogs'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Published</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-orange-600">{{ $stats['draft_blogs'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Drafts</p>
            </div>
        </div>
    </div>
    
    {{-- Top Blog Categories --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-fire text-orange-500 mr-3"></i>
                    Top Categories
                </h3>
                <p class="text-sm text-gray-500 mt-1">Most popular categories</p>
            </div>
        </div>
        
        <div class="space-y-4">
            @forelse($categoriesWithCount as $index => $category)
            <div class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition-colors">
                <div class="w-10 h-10 rounded-lg flex items-center justify-center text-white font-bold text-sm
                    {{ $index == 0 ? 'bg-gradient-to-br from-yellow-400 to-yellow-500' : '' }}
                    {{ $index == 1 ? 'bg-gradient-to-br from-gray-300 to-gray-400' : '' }}
                    {{ $index == 2 ? 'bg-gradient-to-br from-orange-400 to-orange-500' : '' }}
                    {{ $index > 2 ? 'bg-gradient-to-br from-blue-400 to-blue-500' : '' }}">
                    #{{ $index + 1 }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-800 truncate">{{ $category->name }}</p>
                    <p class="text-xs text-gray-500">{{ $category->blogs_count }} {{ Str::plural('blog', $category->blogs_count) }}</p>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center justify-center w-8 h-8 bg-primary-50 text-primary-600 rounded-lg text-xs font-bold">
                        {{ $category->blogs_count }}
                    </span>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <i class="fas fa-folder-open text-gray-300 text-4xl mb-3"></i>
                <p class="text-sm text-gray-500">No categories yet</p>
            </div>
            @endforelse
        </div>
        
        @if($categoriesWithCount->count() > 0)
        <div class="mt-6 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.blog-categories.index') }}" class="flex items-center justify-center text-sm font-semibold text-primary-600 hover:text-primary-700 transition-colors">
                View All Categories
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        @endif
    </div>
    
</div>

{{-- FAQ Statistics & Recent Contacts Row --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    
    {{-- FAQ Statistics by Category --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-question-circle text-indigo-500 mr-3"></i>
                    FAQ Statistics
                </h3>
                <p class="text-sm text-gray-500 mt-1">Questions by category</p>
            </div>
            <a href="{{ route('admin.faqs.index') }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700 transition-colors">
                Manage FAQs <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        
        <div class="space-y-4">
            @forelse($faqsByCategory as $faqCategory)
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gradient-to-br from-indigo-100 to-indigo-200 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-{{ $faqCategory->category == 'general' ? 'info-circle' : ($faqCategory->category == 'tools' ? 'wrench' : ($faqCategory->category == 'games' ? 'gamepad' : 'user')) }} text-indigo-600 text-xl"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-semibold text-gray-700 capitalize">{{ $faqCategory->category }}</span>
                        <span class="text-sm font-bold text-indigo-600">{{ $faqCategory->count }} FAQs</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                        <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 h-full rounded-full transition-all duration-500" 
                             style="width: {{ ($faqCategory->count / max($stats['total_faqs'], 1)) * 100 }}%;"></div>
                    </div>
                </div>
                <span class="text-xs font-semibold text-gray-500 w-12 text-right">
                    {{ number_format(($faqCategory->count / max($stats['total_faqs'], 1)) * 100, 0) }}%
                </span>
            </div>
            @empty
            <div class="text-center py-12">
                <i class="fas fa-question-circle text-gray-300 text-5xl mb-4"></i>
                <p class="text-sm text-gray-500 mb-4">No FAQs yet</p>
                <a href="{{ route('admin.faqs.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors text-sm font-semibold">
                    <i class="fas fa-plus mr-2"></i>Create First FAQ
                </a>
            </div>
            @endforelse
        </div>
        
        @if($faqsByCategory->count() > 0)
        <div class="mt-6 pt-4 border-t border-gray-100 grid grid-cols-2 gap-4">
            <div class="text-center">
                <p class="text-2xl font-bold text-gray-800">{{ $stats['total_faqs'] }}</p>
                <p class="text-xs text-gray-500 mt-1">Total FAQs</p>
            </div>
            <div class="text-center">
                <p class="text-2xl font-bold text-green-600">{{ $stats['active_faqs'] }}</p>
                <p class="text-xs text-gray-500 mt-1">Active FAQs</p>
            </div>
        </div>
        @endif
    </div>
    
    {{-- Recent Contact Submissions --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-envelope text-teal-500 mr-3"></i>
                    Recent Contacts
                </h3>
                <p class="text-sm text-gray-500 mt-1">Latest contact submissions</p>
            </div>
            @if($stats['unread_contacts'] > 0)
            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-bold">
                {{ $stats['unread_contacts'] }} New
            </span>
            @endif
        </div>
        
        <div class="space-y-3">
            @forelse($recentContacts as $contact)
            <div class="flex items-start space-x-3 p-3 rounded-xl hover:bg-gray-50 transition-colors group border border-gray-100">
                <div class="w-10 h-10 bg-gradient-to-br from-teal-100 to-teal-200 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-teal-600"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between mb-1">
                        <h4 class="text-sm font-semibold text-gray-800 truncate">{{ $contact->name }}</h4>
                        @if(!$contact->is_read)
                        <span class="inline-block w-2 h-2 bg-red-500 rounded-full"></span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-600 truncate mb-1">{{ $contact->subject }}</p>
                    <div class="flex items-center space-x-3 text-xs text-gray-400">
                        <span><i class="fas fa-envelope mr-1"></i>{{ Str::limit($contact->email, 20) }}</span>
                        <span><i class="fas fa-clock mr-1"></i>{{ $contact->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-12">
                <i class="fas fa-inbox text-gray-300 text-5xl mb-4"></i>
                <p class="text-sm text-gray-500">No contact submissions yet</p>
            </div>
            @endforelse
        </div>
        
        @if($recentContacts->count() > 0)
        <div class="mt-6 pt-4 border-t border-gray-100">
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="text-center">
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['total_contacts'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">Total Contacts</p>
                </div>
                <div class="text-center">
                    <p class="text-2xl font-bold text-red-600">{{ $stats['unread_contacts'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">Unread</p>
                </div>
            </div>
        </div>
        @endif
    </div>
    
</div>

{{-- Recent Content and Tools Row --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    
    {{-- Recent Blogs --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-clock text-blue-500 mr-3"></i>
                    Recent Blogs
                </h3>
                <p class="text-sm text-gray-500 mt-1">Latest blog posts</p>
            </div>
            <a href="{{ route('admin.blogs.index') }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700 transition-colors">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        
        <div class="space-y-3">
            @forelse($recentBlogs as $blog)
            <div class="flex items-start space-x-3 p-3 rounded-xl hover:bg-gray-50 transition-colors group">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-lg flex items-center justify-center flex-shrink-0 text-2xl">
                    {{ $blog->featured_icon ?? '📝' }}
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="text-sm font-semibold text-gray-800 truncate group-hover:text-primary-600 transition-colors">
                        {{ $blog->title }}
                    </h4>
                    <div class="flex items-center space-x-3 mt-1">
                        @if($blog->category)
                        <span class="text-xs text-gray-500">
                            <i class="fas fa-folder mr-1"></i>{{ $blog->category->name }}
                        </span>
                        @endif
                        <span class="text-xs text-gray-400">
                            <i class="fas fa-clock mr-1"></i>{{ $blog->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                <div>
                    <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full
                        {{ $blog->status == 'published' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                        {{ ucfirst($blog->status) }}
                    </span>
                </div>
            </div>
            @empty
            <div class="text-center py-12">
                <i class="fas fa-file-alt text-gray-300 text-5xl mb-4"></i>
                <p class="text-sm text-gray-500 mb-4">No blogs yet</p>
                <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors text-sm font-semibold">
                    <i class="fas fa-plus mr-2"></i>Create First Blog
                </a>
            </div>
            @endforelse
        </div>
    </div>
    
    {{-- Top Tool Categories --}}
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-wrench text-green-500 mr-3"></i>
                    Tool Categories
                </h3>
                <p class="text-sm text-gray-500 mt-1">Categories by tool count</p>
            </div>
            <a href="{{ route('admin.tool-categories.index') }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700 transition-colors">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        
        <div class="space-y-3">
            @forelse($toolCategoriesWithCount as $category)
            <div class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition-colors group">
                <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-lg flex items-center justify-center flex-shrink-0 text-2xl">
                    {{ $category->icon ?? '🛠️' }}
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="text-sm font-semibold text-gray-800 truncate group-hover:text-primary-600 transition-colors">
                        {{ $category->name }}
                    </h4>
                    <p class="text-xs text-gray-500 mt-1">
                        <i class="fas fa-tools mr-1"></i>{{ $category->tools_count }} {{ Str::plural('tool', $category->tools_count) }}
                    </p>
                </div>
                <div>
                    <span class="inline-flex items-center justify-center w-10 h-10 bg-green-50 text-green-600 rounded-lg font-bold text-sm">
                        {{ $category->tools_count }}
                    </span>
                </div>
            </div>
            @empty
            <div class="text-center py-12">
                <i class="fas fa-toolbox text-gray-300 text-5xl mb-4"></i>
                <p class="text-sm text-gray-500 mb-4">No tool categories yet</p>
                <a href="{{ route('admin.tool-categories.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors text-sm font-semibold">
                    <i class="fas fa-plus mr-2"></i>Create First Category
                </a>
            </div>
            @endforelse
        </div>
    </div>
    
</div>

{{-- Featured Blogs --}}
@if($popularBlogs->count() > 0)
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-star text-yellow-500 mr-3"></i>
                Featured Blogs
            </h3>
            <p class="text-sm text-gray-500 mt-1">Your featured content</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700 transition-colors">
            Manage Blogs <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
        @foreach($popularBlogs as $blog)
        <div class="group bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-4 hover:shadow-lg transition-all duration-300 border border-gray-200">
            <div class="text-center mb-3">
                <div class="w-16 h-16 bg-white rounded-xl flex items-center justify-center mx-auto text-4xl shadow-sm">
                    {{ $blog->featured_icon ?? '📄' }}
                </div>
            </div>
            <h4 class="text-sm font-semibold text-gray-800 text-center mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                {{ $blog->title }}
            </h4>
            <div class="flex items-center justify-center space-x-2 text-xs text-gray-500">
                @if($blog->read_time)
                <span><i class="fas fa-clock mr-1"></i>{{ $blog->read_time }} min</span>
                @endif
                @if($blog->category)
                <span>•</span>
                <span>{{ $blog->category->name }}</span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

{{-- Platform Overview Statistics --}}
<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-chart-pie text-purple-500 mr-3"></i>
                Platform Overview
            </h3>
            <p class="text-sm text-gray-500 mt-1">Complete statistics at a glance</p>
        </div>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        {{-- Blogs Overview --}}
        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl border border-blue-200">
            <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-blog text-white text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-blue-600">{{ $stats['total_blogs'] }}</p>
            <p class="text-xs text-gray-600 mt-1">Total Blogs</p>
            <div class="mt-2 pt-2 border-t border-blue-200">
                <p class="text-xs text-green-600 font-semibold">{{ $stats['published_blogs'] }} Published</p>
            </div>
        </div>
        
        {{-- Tools Overview --}}
        <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-xl border border-green-200">
            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-toolbox text-white text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-green-600">{{ $stats['total_tools'] }}</p>
            <p class="text-xs text-gray-600 mt-1">Total Tools</p>
            <div class="mt-2 pt-2 border-t border-green-200">
                <p class="text-xs text-green-600 font-semibold">{{ $stats['active_tools'] }} Active</p>
            </div>
        </div>
        
        {{-- Categories Overview --}}
        <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl border border-purple-200">
            <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-folder text-white text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-purple-600">{{ $stats['total_categories'] + $stats['total_tool_categories'] }}</p>
            <p class="text-xs text-gray-600 mt-1">All Categories</p>
            <div class="mt-2 pt-2 border-t border-purple-200">
                <p class="text-xs text-purple-600 font-semibold">{{ $stats['total_categories'] }} Blog + {{ $stats['total_tool_categories'] }} Tool</p>
            </div>
        </div>
        
        {{-- FAQs Overview --}}
        <div class="text-center p-4 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-xl border border-indigo-200">
            <div class="w-12 h-12 bg-indigo-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-question-circle text-white text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-indigo-600">{{ $stats['total_faqs'] }}</p>
            <p class="text-xs text-gray-600 mt-1">Total FAQs</p>
            <div class="mt-2 pt-2 border-t border-indigo-200">
                <p class="text-xs text-green-600 font-semibold">{{ $stats['active_faqs'] }} Active</p>
            </div>
        </div>
        
        {{-- Pages Overview --}}
        <div class="text-center p-4 bg-gradient-to-br from-pink-50 to-pink-100 rounded-xl border border-pink-200">
            <div class="w-12 h-12 bg-pink-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-file-alt text-white text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-pink-600">{{ $stats['total_pages'] }}</p>
            <p class="text-xs text-gray-600 mt-1">Static Pages</p>
            <div class="mt-2 pt-2 border-t border-pink-200">
                <p class="text-xs text-pink-600 font-semibold">Legal & Info</p>
            </div>
        </div>
        
        {{-- Contacts Overview --}}
        <div class="text-center p-4 bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl border border-teal-200">
            <div class="w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-envelope text-white text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-teal-600">{{ $stats['total_contacts'] }}</p>
            <p class="text-xs text-gray-600 mt-1">Contact Forms</p>
            <div class="mt-2 pt-2 border-t border-teal-200">
                <p class="text-xs text-red-600 font-semibold">{{ $stats['unread_contacts'] }} Unread</p>
            </div>
        </div>
    </div>
    
    {{-- Content Distribution Chart --}}
    <div class="mt-8 pt-6 border-t border-gray-100">
        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-chart-bar text-gray-600 mr-2"></i>
            Content Distribution
        </h4>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Blog Status Distribution --}}
            <div>
                <p class="text-sm font-semibold text-gray-700 mb-3">Blog Status</p>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs font-medium text-gray-600">Published</span>
                                <span class="text-xs font-bold text-green-600">{{ $stats['published_blogs'] }}</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 h-full rounded-full" 
                                     style="width: {{ $stats['total_blogs'] > 0 ? ($stats['published_blogs'] / $stats['total_blogs']) * 100 : 0 }}%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs font-medium text-gray-600">Drafts</span>
                                <span class="text-xs font-bold text-orange-600">{{ $stats['draft_blogs'] }}</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-gradient-to-r from-orange-500 to-orange-600 h-full rounded-full" 
                                     style="width: {{ $stats['total_blogs'] > 0 ? ($stats['draft_blogs'] / $stats['total_blogs']) * 100 : 0 }}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Tool Status Distribution --}}
            <div>
                <p class="text-sm font-semibold text-gray-700 mb-3">Tool Status</p>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs font-medium text-gray-600">Active Tools</span>
                                <span class="text-xs font-bold text-green-600">{{ $stats['active_tools'] }}</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 h-full rounded-full" 
                                     style="width: {{ $stats['total_tools'] > 0 ? ($stats['active_tools'] / $stats['total_tools']) * 100 : 0 }}%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs font-medium text-gray-600">Inactive Tools</span>
                                <span class="text-xs font-bold text-gray-600">{{ $stats['total_tools'] - $stats['active_tools'] }}</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-gradient-to-r from-gray-400 to-gray-500 h-full rounded-full" 
                                     style="width: {{ $stats['total_tools'] > 0 ? (($stats['total_tools'] - $stats['active_tools']) / $stats['total_tools']) * 100 : 0 }}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
