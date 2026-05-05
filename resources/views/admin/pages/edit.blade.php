@extends('admin.layouts.app')

@section('title', 'Edit Page')
@section('page-title', 'Edit Page')
@section('page-subtitle', 'Update page content')

@section('content')

<form id="pageForm" action="{{ route('admin.pages.update', $page) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-file-alt text-primary-600 mr-2"></i>
                    Page Content
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Page Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" value="{{ $page->title }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="e.g., Privacy Policy">
                    <p class="text-red-500 text-sm mt-1 hidden" id="error-title"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Slug <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="slug" id="slug" value="{{ $page->slug }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="e.g., privacy-policy">
                    <p class="text-xs text-gray-500 mt-1">URL: {{ url('/') }}/<span id="slugPreview">{{ $page->slug }}</span></p>
                    <p class="text-red-500 text-sm mt-1 hidden" id="error-slug"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content" id="editor-content" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Enter page content...">{{ $page->content }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Use the rich text editor for formatting</p>
                    <p class="text-red-500 text-sm mt-1 hidden" id="error-content"></p>
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
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" {{ $page->is_active ? 'checked' : '' }} class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <span class="ml-2 text-sm font-semibold text-gray-700">Active</span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1">Make this page publicly visible</p>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-search text-primary-600 mr-2"></i>
                    SEO
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm"
                        placeholder="Brief description for search engines">{{ $page->meta_description }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ $page->meta_keywords }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm"
                        placeholder="keyword1, keyword2, keyword3">
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i>Update Page
                </button>
                <a href="{{ route('admin.pages.index') }}" class="block w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition-colors mt-2">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </div>
        
    </div>
</form>

@endsection

@section('styles')
<style>
    .tox-tinymce {
        border: 1px solid #d1d5db !important;
        border-radius: 0.5rem !important;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.2/tinymce.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // TinyMCE Full Configuration (Same as Blog)
    const fullEditorConfig = {
        height: 500,
        menubar: 'file edit view insert format tools table help',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons',
            'codesample'
        ],
        toolbar: 'undo redo | blocks fontsize | bold italic underline strikethrough | forecolor backcolor | ' +
                 'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
                 'table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | ' +
                 'tableinsertcolbefore tableinsertcolafter tabledeletecol | ' +
                 'link image media codesample | emoticons charmap | ' +
                 'removeformat code fullscreen | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px; line-height: 1.6; }' +
            'table { border-collapse: collapse; width: 100%; margin: 20px 0; }' +
            'table td, table th { border: 1px solid #ddd; padding: 12px; }' +
            'table th { background-color: #f3f4f6; font-weight: 600; text-align: left; }' +
            'table tr:nth-child(even) { background-color: #f9fafb; }' +
            'img { max-width: 100%; height: auto; }' +
            'code { background: #f3f4f6; padding: 2px 6px; border-radius: 3px; font-family: monospace; }' +
            'pre { background: #1e293b; color: #e2e8f0; padding: 16px; border-radius: 8px; overflow-x: auto; }',
        paste_data_images: true,
        paste_as_text: false,
        paste_enable_default_filters: false,
        paste_word_valid_elements: "table,tr,td,th,tbody,thead,tfoot,p,b,strong,i,em,h1,h2,h3,h4,h5,h6,ul,ol,li,a,img,code,pre",
        table_default_attributes: { border: '1' },
        table_default_styles: { 'border-collapse': 'collapse', 'width': '100%' },
        image_advtab: true,
        image_caption: true,
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        promotion: false,
        branding: false,
        statusbar: true,
        resize: true
    };

    // Initialize TinyMCE
    tinymce.init({
        ...fullEditorConfig,
        selector: '#editor-content',
        height: 500
    });
});

// Update slug preview
document.getElementById('slug').addEventListener('input', function() {
    document.getElementById('slugPreview').textContent = this.value || 'page-slug';
});

// Form submission
document.getElementById('pageForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get TinyMCE content
    if (tinymce.get('editor-content')) {
        document.querySelector('textarea[name="content"]').value = tinymce.get('editor-content').getContent();
    }
    
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
            showToast(data.message, 'success');
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
        showToast('An error occurred while updating the page', 'error');
    });
});
</script>
@endsection
