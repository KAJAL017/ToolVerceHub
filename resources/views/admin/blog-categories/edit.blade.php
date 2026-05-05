@extends('admin.layouts.app')

@section('title', 'Edit Category')
@section('page-title', 'Edit Blog Category')
@section('page-subtitle', 'Update category details')

@section('content')

<form id="categoryForm" method="POST">
    @csrf
    @method('PUT')
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        
        <div class="mb-4 flex justify-end">
            <button type="button" id="demoBtn" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold rounded-lg transition-colors">
                <i class="fas fa-magic mr-2"></i>Fill Demo Data
            </button>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Category Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $blogCategory->name) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                placeholder="e.g., Image Tools">
            <p class="text-red-500 text-sm mt-1 hidden" id="error-name"></p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Slug <span class="text-gray-500 text-xs">(Leave empty to auto-generate)</span>
            </label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $blogCategory->slug) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                placeholder="image-tools">
            <p class="text-red-500 text-sm mt-1 hidden" id="error-slug"></p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                placeholder="Brief description of this category">{{ old('description', $blogCategory->description) }}</textarea>
            <p class="text-red-500 text-sm mt-1 hidden" id="error-description"></p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Icon Emoji <span class="text-gray-500 text-xs">(Optional)</span>
            </label>
            <select name="icon_emoji" id="iconSelect" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option value="">Select an icon...</option>
                @foreach($icons as $icon)
                    <option value="{{ $icon->icon }}" {{ old('icon_emoji', $blogCategory->icon_emoji) == $icon->icon ? 'selected' : '' }}>
                        {{ $icon->icon }} {{ $icon->name }} ({{ $icon->category }})
                    </option>
                @endforeach
            </select>
            <p class="text-xs text-gray-500 mt-1">Choose an emoji icon for this category</p>
            <p class="text-red-500 text-sm mt-1 hidden" id="error-icon_emoji"></p>
        </div>
        
        <div class="mb-4">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $blogCategory->is_featured) ? 'checked' : '' }}
                    class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                <span class="ml-3 text-sm font-semibold text-gray-700">
                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                    Featured Category
                </span>
            </label>
            <p class="text-xs text-gray-500 mt-1 ml-8">Featured categories will be highlighted on the blog page</p>
        </div>
        
        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-600">
                <strong>Blogs in this category:</strong> {{ $blogCategory->blogs()->count() }}
            </p>
        </div>
        
        <div class="flex items-center space-x-3">
            <button type="submit" id="submitBtn" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-lg transition-colors">
                <i class="fas fa-save mr-2"></i>
                <span id="btnText">Update Category</span>
            </button>
            
            <a href="{{ route('admin.blog-categories.index') }}" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg transition-colors">
                <i class="fas fa-times mr-2"></i>
                Cancel
            </a>
        </div>
        
    </div>
</form>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize custom searchable select for icons
    const iconSelect = document.getElementById('iconSelect');
    if (iconSelect && typeof window.initCustomSelect === 'function') {
        window.initCustomSelect(iconSelect);
    }
    
    const form = document.getElementById('categoryForm');
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    const descriptionInput = document.getElementById('description');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const demoBtn = document.getElementById('demoBtn');
    
    const demoData = [
        {
            name: 'Image Tools',
            slug: 'image-tools',
            description: 'Tools for image editing, conversion, and optimization'
        },
        {
            name: 'PDF Utilities',
            slug: 'pdf-utilities',
            description: 'PDF conversion, merging, splitting, and editing tools'
        },
        {
            name: 'Text Converters',
            slug: 'text-converters',
            description: 'Text formatting, case conversion, and encoding tools'
        },
        {
            name: 'Developer Tools',
            slug: 'developer-tools',
            description: 'Code formatters, validators, and development utilities'
        },
        {
            name: 'SEO Tools',
            slug: 'seo-tools',
            description: 'Search engine optimization and website analysis tools'
        }
    ];
    
    demoBtn.addEventListener('click', function() {
        const randomDemo = demoData[Math.floor(Math.random() * demoData.length)];
        nameInput.value = randomDemo.name;
        slugInput.value = randomDemo.slug;
        descriptionInput.value = randomDemo.description;
        nameInput.dispatchEvent(new Event('input'));
    });
    
    let manuallyEdited = false;
    
    slugInput.addEventListener('input', function() {
        if (this.value !== '') {
            manuallyEdited = true;
        }
    });
    
    nameInput.addEventListener('input', function() {
        if (!manuallyEdited) {
            const slug = generateSlug(this.value);
            slugInput.value = slug;
        }
    });
    
    function generateSlug(text) {
        return text
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .replace(/^-+|-+$/g, '');
    }
    
    function clearErrors() {
        document.querySelectorAll('[id^="error-"]').forEach(el => {
            el.textContent = '';
            el.classList.add('hidden');
        });
        document.querySelectorAll('input, textarea').forEach(el => {
            el.classList.remove('border-red-500');
        });
    }
    
    function showError(field, message) {
        const errorEl = document.getElementById('error-' + field);
        const inputEl = document.getElementById(field);
        
        if (errorEl && inputEl) {
            errorEl.textContent = message;
            errorEl.classList.remove('hidden');
            inputEl.classList.add('border-red-500');
        }
    }
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        clearErrors();
        
        submitBtn.disabled = true;
        btnText.textContent = 'Updating...';
        
        const formData = new FormData(form);
        
        fetch('{{ route("admin.blog-categories.update", $blogCategory) }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route("admin.blog-categories.index") }}?success=' + encodeURIComponent(data.message || 'Category updated successfully!');
            } else if (data.errors) {
                Object.keys(data.errors).forEach(field => {
                    showError(field, data.errors[field][0]);
                });
                
                submitBtn.disabled = false;
                btnText.textContent = 'Update Category';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('An error occurred. Please try again.', 'error');
            
            submitBtn.disabled = false;
            btnText.textContent = 'Update Category';
        });
    });
});
</script>
@endsection



