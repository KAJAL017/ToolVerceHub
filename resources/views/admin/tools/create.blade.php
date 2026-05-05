@extends('admin.layouts.app')

@section('title', 'Create Tool')
@section('page-title', 'Create New Tool')
@section('page-subtitle', 'Add a new tool')

@section('content')

<form id="toolForm" action="{{ route('admin.tools.store') }}" method="POST">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                    Basic Information
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tool Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="e.g., IMGConvertPro">
                    <p class="text-red-500 text-sm mt-1 hidden" id="error-name"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Slug <span class="text-gray-500 text-xs">(Leave empty to auto-generate)</span>
                    </label>
                    <input type="text" name="slug"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="imgconvertpro">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                    <select name="category_id" id="categorySelect" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Icon/Emoji</label>
                    <select name="icon" id="iconSelect" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">Select an icon...</option>
                        @foreach($icons as $icon)
                            <option value="{{ $icon->icon }}">{{ $icon->icon }} {{ $icon->name }} ({{ $icon->category }})</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Brief description of this tool"></textarea>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">URL</label>
                    <input type="text" name="url"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="https://example.com">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tool Tags</label>
                    <div class="custom-multi-select">
                        <select name="tool_tags[]" id="toolTagsSelect" multiple class="hidden">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        <div class="custom-select-trigger border border-gray-300 rounded-lg px-4 py-2 bg-white cursor-pointer relative" data-target="toolTagsSelect">
                            <div class="selected-tags-container flex flex-wrap gap-2 items-center min-h-[24px]" id="selectedTagsContainer">
                                <span class="text-gray-400 text-sm">Select tags...</span>
                            </div>
                            <i class="fas fa-chevron-down custom-select-arrow absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <div class="custom-select-dropdown">
                            <div class="custom-select-search">
                                <i class="fas fa-search"></i>
                                <input type="text" placeholder="Search tags..." class="search-input">
                            </div>
                            <div class="custom-select-options">
                                @foreach($tags as $tag)
                                    <div class="custom-select-option" data-value="{{ $tag->id }}">
                                        <input type="checkbox" class="mr-2">
                                        <span>{{ $tag->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Select multiple tags for this tool</p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tool Count</label>
                    <input type="text" name="tool_count"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="e.g., 80+">
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
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
                </div>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" class="w-5 h-5 text-yellow-500 border-gray-300 rounded focus:ring-yellow-500 focus:ring-2">
                        <span class="ml-3 text-sm font-semibold text-gray-700">
                            <i class="fas fa-star text-yellow-500 mr-1"></i>
                            Featured Tool
                        </span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-8">Featured tools will be displayed prominently</p>
                </div>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_free" class="w-5 h-5 text-green-500 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                        <span class="ml-3 text-sm font-semibold text-gray-700">
                            <i class="fas fa-dollar-sign text-green-500 mr-1"></i>
                            Free Tool
                        </span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-8">Mark this tool as free to use</p>
                </div>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="show_in_hero" class="w-5 h-5 text-purple-500 border-gray-300 rounded focus:ring-purple-500 focus:ring-2">
                        <span class="ml-3 text-sm font-semibold text-gray-700">
                            <i class="fas fa-rocket text-purple-500 mr-1"></i>
                            Show in Hero Section
                        </span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-8">Display this tool in the homepage hero section</p>
                </div>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" checked class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500 focus:ring-2">
                        <span class="ml-3 text-sm font-semibold text-gray-700">
                            <i class="fas fa-check-circle text-primary-600 mr-1"></i>
                            Active
                        </span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-8">Tool is visible on the website</p>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i>Create Tool
                </button>
                <a href="{{ route('admin.tools.index') }}" class="block w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition-colors mt-2">
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
// Initialize custom searchable selects
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('categorySelect');
    if (categorySelect && typeof window.initCustomSelect === 'function') {
        window.initCustomSelect(categorySelect);
    }
    
    const iconSelect = document.getElementById('iconSelect');
    if (iconSelect && typeof window.initCustomSelect === 'function') {
        window.initCustomSelect(iconSelect);
    }
    
    // Initialize multi-select for tool tags
    initMultiSelect('toolTagsSelect');
});

function initMultiSelect(selectId) {
    const select = document.getElementById(selectId);
    if (!select) return;
    
    const container = select.closest('.custom-multi-select');
    const trigger = container.querySelector('.custom-select-trigger');
    const dropdown = container.querySelector('.custom-select-dropdown');
    const searchInput = container.querySelector('.search-input');
    const options = container.querySelectorAll('.custom-select-option');
    const selectedContainer = container.querySelector('.selected-tags-container');
    
    // Toggle dropdown
    trigger.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdown.classList.toggle('show');
        trigger.classList.toggle('active');
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!container.contains(e.target)) {
            dropdown.classList.remove('show');
            trigger.classList.remove('active');
        }
    });
    
    // Handle option selection
    options.forEach(option => {
        option.addEventListener('click', (e) => {
            e.stopPropagation();
            const checkbox = option.querySelector('input[type="checkbox"]');
            const value = option.dataset.value;
            const text = option.querySelector('span').textContent;
            
            checkbox.checked = !checkbox.checked;
            
            console.log('Tag clicked:', text, 'Checked:', checkbox.checked);
            
            if (checkbox.checked) {
                // Add to select
                const optionEl = select.querySelector(`option[value="${value}"]`);
                if (optionEl) optionEl.selected = true;
                
                // Add tag
                console.log('Adding tag:', value, text);
                addTag(value, text, selectedContainer, select);
            } else {
                // Remove from select
                const optionEl = select.querySelector(`option[value="${value}"]`);
                if (optionEl) optionEl.selected = false;
                
                // Remove tag
                console.log('Removing tag:', value);
                removeTag(value, selectedContainer);
            }
            
            updatePlaceholder(selectedContainer);
        });
    });
    
    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        options.forEach(option => {
            const text = option.querySelector('span').textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                option.classList.remove('hidden');
            } else {
                option.classList.add('hidden');
            }
        });
    });
}

function addTag(value, text, container, select) {
    console.log('addTag called with:', { value, text, container, select });
    
    // Remove placeholder if exists
    const placeholder = container.querySelector('.text-gray-400');
    if (placeholder) {
        console.log('Removing placeholder');
        placeholder.remove();
    }
    
    // Create tag element
    const tag = document.createElement('span');
    tag.className = 'selected-tag';
    tag.dataset.value = value;
    tag.innerHTML = `
        ${text}
        <i class="fas fa-times" onclick="removeTagClick(this, '${value}', 'toolTagsSelect')"></i>
    `;
    
    console.log('Tag element created:', tag);
    console.log('Appending to container:', container);
    container.appendChild(tag);
    console.log('Tag appended. Container children:', container.children.length);
}

function removeTag(value, container) {
    const tag = container.querySelector(`.selected-tag[data-value="${value}"]`);
    if (tag) tag.remove();
}

function removeTagClick(icon, value, selectId) {
    const select = document.getElementById(selectId);
    const container = select.closest('.custom-multi-select');
    const selectedContainer = container.querySelector('.selected-tags-container');
    const option = container.querySelector(`.custom-select-option[data-value="${value}"]`);
    
    // Uncheck checkbox
    if (option) {
        const checkbox = option.querySelector('input[type="checkbox"]');
        checkbox.checked = false;
    }
    
    // Remove from select
    const optionEl = select.querySelector(`option[value="${value}"]`);
    if (optionEl) optionEl.selected = false;
    
    // Remove tag
    removeTag(value, selectedContainer);
    updatePlaceholder(selectedContainer);
}

function updatePlaceholder(container) {
    const tags = container.querySelectorAll('.selected-tag');
    if (tags.length === 0) {
        const placeholder = document.createElement('span');
        placeholder.className = 'text-gray-400 text-sm';
        placeholder.textContent = 'Select tags...';
        container.appendChild(placeholder);
    }
}

window.removeTagClick = removeTagClick;

document.getElementById('toolForm').addEventListener('submit', function(e) {
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
        alert('An error occurred while creating the tool');
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
</script>
@endsection
