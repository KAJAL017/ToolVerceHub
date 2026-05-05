@extends('admin.layouts.app')

@section('title', 'Edit Tool Tag')
@section('page-title', 'Edit Tool Tag')
@section('page-subtitle', 'Update tag details')

@section('content')

<form id="tagForm" method="POST">
    @csrf
    @method('PUT')
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Tag Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $toolTag->name) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                placeholder="e.g., Free">
            <p class="text-red-500 text-sm mt-1 hidden" id="error-name"></p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Slug <span class="text-gray-500 text-xs">(Leave empty to auto-generate)</span>
            </label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $toolTag->slug) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                placeholder="free">
            <p class="text-red-500 text-sm mt-1 hidden" id="error-slug"></p>
        </div>
        
        <div class="mb-4">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $toolTag->is_featured) ? 'checked' : '' }}
                    class="w-5 h-5 text-yellow-500 border-gray-300 rounded focus:ring-yellow-500 focus:ring-2">
                <span class="ml-3 text-sm font-semibold text-gray-700">
                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                    Featured Tag
                </span>
            </label>
            <p class="text-xs text-gray-500 mt-1 ml-8">Featured tags will be displayed prominently on the website</p>
        </div>
        
        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-600">
                <strong>Tools with this tag:</strong> {{ $toolTag->tools()->count() }}
            </p>
        </div>
        
        <div class="flex items-center space-x-3">
            <button type="submit" id="submitBtn" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-lg transition-colors">
                <i class="fas fa-save mr-2"></i>
                <span id="btnText">Update Tag</span>
            </button>
            
            <a href="{{ route('admin.tool-tags.index') }}" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg transition-colors">
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
    const form = document.getElementById('tagForm');
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    
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
        
        fetch('{{ route("admin.tool-tags.update", $toolTag) }}', {
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
                window.location.href = '{{ route("admin.tool-tags.index") }}?success=' + encodeURIComponent(data.message || 'Tag updated successfully!');
            } else if (data.errors) {
                Object.keys(data.errors).forEach(field => {
                    showError(field, data.errors[field][0]);
                });
                
                submitBtn.disabled = false;
                btnText.textContent = 'Update Tag';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('An error occurred. Please try again.', 'error');
            
            submitBtn.disabled = false;
            btnText.textContent = 'Update Tag';
        });
    });
});
</script>
@endsection
