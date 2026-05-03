@extends('admin.layouts.app')

@section('title', 'Create Category')
@section('page-title', 'Create Blog Category')
@section('page-subtitle', 'Add a new blog category')

@section('content')

<div class="max-w-2xl mx-auto">
    <form action="{{ route('admin.blog-categories.store') }}" method="POST">
        @csrf
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Category Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 @error('name') border-red-500 @enderror"
                    placeholder="e.g., Image Tools">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Slug <span class="text-gray-500 text-xs">(Leave empty to auto-generate)</span>
                </label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="image-tools">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Color <span class="text-red-500">*</span>
                </label>
                <div class="flex gap-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="color" value="g" {{ old('color', 'g') == 'g' ? 'checked' : '' }} class="mr-2" required>
                        <span class="w-8 h-8 bg-green-500 rounded-full"></span>
                        <span class="ml-2 text-sm">Green</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="color" value="c" {{ old('color') == 'c' ? 'checked' : '' }} class="mr-2">
                        <span class="w-8 h-8 bg-orange-500 rounded-full"></span>
                        <span class="ml-2 text-sm">Coral</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="color" value="b" {{ old('color') == 'b' ? 'checked' : '' }} class="mr-2">
                        <span class="w-8 h-8 bg-blue-500 rounded-full"></span>
                        <span class="ml-2 text-sm">Blue</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="color" value="a" {{ old('color') == 'a' ? 'checked' : '' }} class="mr-2">
                        <span class="w-8 h-8 bg-yellow-500 rounded-full"></span>
                        <span class="ml-2 text-sm">Amber</span>
                    </label>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Icon/Emoji</label>
                <input type="text" name="icon_emoji" value="{{ old('icon_emoji') }}" maxlength="10"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="🖼️">
                <p class="text-xs text-gray-500 mt-1">Single emoji character</p>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="Brief description of this category">{{ old('description') }}</textarea>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Order</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="0">
                <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
            </div>
            
            <div class="flex items-center space-x-3">
                <button type="submit" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Create Category
                </button>
                
                <a href="{{ route('admin.blog-categories.index') }}" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg transition-colors">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </a>
            </div>
            
        </div>
    </form>
</div>

@endsection
