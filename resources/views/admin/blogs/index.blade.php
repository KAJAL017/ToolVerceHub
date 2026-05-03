@extends('admin.layouts.app')

@section('title', 'Blogs')
@section('page-title', 'Blog Management')
@section('page-subtitle', 'Manage all blog posts')

@section('content')

<!-- Success/Error Messages -->
@if(session('success'))
    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg fade-in">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
            <p class="text-green-700 font-medium">{{ session('success') }}</p>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg fade-in">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3"></i>
            <p class="text-red-700 font-medium">{{ session('error') }}</p>
        </div>
    </div>
@endif

<!-- Header Actions -->
<div class="mb-6 flex items-center justify-between">
    <div>
        <h3 class="text-lg font-bold text-gray-800">All Blogs ({{ $blogs->total() }})</h3>
    </div>
    <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
        <i class="fas fa-plus mr-2"></i>
        Create New Blog
    </a>
</div>

<!-- Filters -->
<div class="mb-6 bg-white rounded-xl shadow-sm border border-gray-200 p-4">
    <form method="GET" action="{{ route('admin.blogs.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Search -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search blogs..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
        </div>
        
        <!-- Status Filter -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option value="">All Status</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>
        
        <!-- Category Filter -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <select name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <!-- Filter Button -->
        <div class="flex items-end">
            <button type="submit" class="w-full px-4 py-2 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded-lg transition-colors">
                <i class="fas fa-filter mr-2"></i>
                Filter
            </button>
        </div>
    </form>
</div>

<!-- Blogs Table -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Published</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Views</th>
                    <th class="px-6 py-3 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($blogs as $blog)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            #{{ $blog->id }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($blog->featured_image_emoji)
                                    <span class="text-2xl mr-3">{{ $blog->featured_image_emoji }}</span>
                                @endif
                                <div>
                                    <div class="text-sm font-semibold text-gray-900">{{ Str::limit($blog->title, 50) }}</div>
                                    <div class="text-xs text-gray-500">{{ $blog->slug }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($blog->category)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                    {{ $blog->category_color == 'g' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $blog->category_color == 'c' ? 'bg-orange-100 text-orange-800' : '' }}
                                    {{ $blog->category_color == 'b' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $blog->category_color == 'a' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                    {{ $blog->category->name }}
                                </span>
                            @else
                                <span class="text-gray-400 text-sm">No category</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $blog->author_name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                {{ $blog->status == 'published' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $blog->status == 'draft' ? 'bg-gray-100 text-gray-800' : '' }}
                                {{ $blog->status == 'archived' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($blog->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $blog->published_date->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ number_format($blog->views_count) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-primary-600 hover:text-primary-900" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-inbox text-gray-300 text-5xl mb-4"></i>
                                <p class="text-gray-500 text-lg font-medium">No blogs found</p>
                                <p class="text-gray-400 text-sm mt-1">Create your first blog post to get started</p>
                                <a href="{{ route('admin.blogs.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                                    <i class="fas fa-plus mr-2"></i>
                                    Create Blog
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    @if($blogs->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $blogs->links() }}
        </div>
    @endif
</div>

@endsection
