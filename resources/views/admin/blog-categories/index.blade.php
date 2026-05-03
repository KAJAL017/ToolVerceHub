@extends('admin.layouts.app')

@section('title', 'Blog Categories')
@section('page-title', 'Blog Categories')
@section('page-subtitle', 'Manage blog categories')

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
        <h3 class="text-lg font-bold text-gray-800">All Categories ({{ $categories->count() }})</h3>
    </div>
    <a href="{{ route('admin.blog-categories.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
        <i class="fas fa-plus mr-2"></i>
        Create New Category
    </a>
</div>

<!-- Categories Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($categories as $category)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center">
                    @if($category->icon_emoji)
                        <span class="text-3xl mr-3">{{ $category->icon_emoji }}</span>
                    @endif
                    <div>
                        <h4 class="text-lg font-bold text-gray-800">{{ $category->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $category->slug }}</p>
                    </div>
                </div>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                    {{ $category->color == 'g' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $category->color == 'c' ? 'bg-orange-100 text-orange-800' : '' }}
                    {{ $category->color == 'b' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $category->color == 'a' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                    {{ $category->blogs_count }} blogs
                </span>
            </div>
            
            @if($category->description)
                <p class="text-sm text-gray-600 mb-4">{{ Str::limit($category->description, 100) }}</p>
            @endif
            
            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <span class="text-xs text-gray-500">Order: {{ $category->order }}</span>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.blog-categories.edit', $category) }}" class="text-primary-600 hover:text-primary-900" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.blog-categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure? This will unlink all blogs from this category.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-3 bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
            <i class="fas fa-folder-open text-gray-300 text-5xl mb-4"></i>
            <p class="text-gray-500 text-lg font-medium">No categories found</p>
            <p class="text-gray-400 text-sm mt-1">Create your first category to organize your blogs</p>
            <a href="{{ route('admin.blog-categories.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                <i class="fas fa-plus mr-2"></i>
                Create Category
            </a>
        </div>
    @endforelse
</div>

@endsection
