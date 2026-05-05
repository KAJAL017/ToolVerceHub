@extends('admin.layouts.app')

@section('title', 'Create Tool Category')
@section('page-title', 'Create Tool Category')
@section('page-subtitle', 'Add a new tool category')

@section('content')

<form id="categoryForm" action="{{ route('admin.tool-categories.store') }}" method="POST">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                    Basic Information
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Category Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="e.g., Image Tools">
                    <p class="text-red-500 text-sm mt-1 hidden" id="error-name"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Slug <span class="text-gray-500 text-xs">(Leave empty to auto-generate)</span>
                    </label>
                    <input type="text" name="slug"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="image-tools">
                    <p class="text-red-500 text-sm mt-1 hidden" id="error-slug"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Icon/Emoji</label>
                    <select name="icon" id="iconSelect" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">Select an icon...</option>
                        @foreach($icons ?? [] as $icon)
                            <option value="{{ $icon->icon }}">{{ $icon->icon }} {{ $icon->name }} ({{ $icon->category }})</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Brief description of this category"></textarea>
                </div>
            </div>
        </div>
        
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-cog text-primary-600 mr-2"></i>
                    Settings
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Color Theme <span class="text-red-500">*</span>
                    </label>
                    <select name="color" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="g">Green</option>
                        <option value="c">Coral</option>
                        <option value="b">Blue</option>
                        <option value="a">Amber</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Display Order</label>
                    <input type="number" name="display_order" value="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="0">
                    <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
                </div>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" checked class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <span class="ml-2 text-sm font-semibold text-gray-700">Active</span>
                    </label>
                </div>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" class="w-5 h-5 text-yellow-500 border-gray-300 rounded focus:ring-yellow-500 focus:ring-2">
                        <span class="ml-3 text-sm font-semibold text-gray-700">
                            <i class="fas fa-star text-yellow-500 mr-1"></i>
                            Featured Category
                        </span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-8">Featured categories will be displayed prominently</p>
                </div>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="show_in_header" class="w-5 h-5 text-blue-500 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <span class="ml-3 text-sm font-semibold text-gray-700">
                            <i class="fas fa-bars text-blue-500 mr-1"></i>
                            Show in Header
                        </span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-8">Display this category in the header navigation</p>
                </div>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="show_in_home" class="w-5 h-5 text-green-500 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                        <span class="ml-3 text-sm font-semibold text-gray-700">
                            <i class="fas fa-home text-green-500 mr-1"></i>
                            Show in Home Page
                        </span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-8">Display this category on the home page</p>
                </div>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="show_in_built" class="w-5 h-5 text-purple-500 border-gray-300 rounded focus:ring-purple-500 focus:ring-2">
                        <span class="ml-3 text-sm font-semibold text-gray-700">
                            <i class="fas fa-tools text-purple-500 mr-1"></i>
                            Show in Built Section
                        </span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-8">Display this category in the built-in tools section</p>
                </div>
            </div>
                        </span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-8">Featured categories will be highlighted</p>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i>Create Category
                </button>
                <a href="{{ route('admin.tool-categories.index') }}" class="block w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition-colors mt-2">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </div>
        
    </div>
</form>

<div id="toast" class="fixed top-4 right-4 bg-primary-600 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
    <div class="flex items-center gap-2">
        <i class="fas fa-check-circle"></i>
        <span id="toast-message"></span>
    </div>
</div>

@endsection

@section('scripts')
<script>
// Initialize custom searchable select for icons
document.addEventListener('DOMContentLoaded', function() {
    const iconSelect = document.getElementById('iconSelect');
    if (iconSelect && typeof window.initCustomSelect === 'function') {
        window.initCustomSelect(iconSelect);
    }
});

document.getElementById('categoryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message);
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 1000);
        } else if (data.errors) {
            Object.keys(data.errors).forEach(key => {
                const errorElement = document.getElementById(`error-${key}`);
                if (errorElement) {
                    errorElement.textContent = data.errors[key][0];
                    errorElement.classList.remove('hidden');
                }
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while creating the category');
    });
});

function showToast(message) {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toast-message');
    toastMessage.textContent = message;
    toast.classList.remove('translate-x-full');
    setTimeout(() => {
        toast.classList.add('translate-x-full');
    }, 3000);
}

document.getElementById('name').addEventListener('input', function() {
    const errorElement = document.getElementById('error-name');
    if (errorElement) {
        errorElement.classList.add('hidden');
    }
});
</script>
@endsection
