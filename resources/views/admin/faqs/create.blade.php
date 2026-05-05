@extends('admin.layouts.app')

@section('title', 'Create FAQ')
@section('page-title', 'Create New FAQ')
@section('page-subtitle', 'Add a new frequently asked question')

@section('content')

<form id="faqForm" action="{{ route('admin.faqs.store') }}" method="POST">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-question-circle text-primary-600 mr-2"></i>
                    FAQ Content
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Question <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="question" id="question" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="e.g., How do I convert an image?">
                    <p class="text-red-500 text-sm mt-1 hidden" id="error-question"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Answer <span class="text-red-500">*</span>
                    </label>
                    <textarea name="answer" id="answer" rows="8" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Provide a detailed answer..."></textarea>
                    <p class="text-xs text-gray-500 mt-1">You can use HTML for formatting</p>
                    <p class="text-red-500 text-sm mt-1 hidden" id="error-answer"></p>
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
                        Category <span class="text-red-500">*</span>
                    </label>
                    <select name="category" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="general">General</option>
                        <option value="tools">Tools</option>
                        <option value="games">Games</option>
                        <option value="account">Account</option>
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
                        <input type="checkbox" name="is_active" checked class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <span class="ml-2 text-sm font-semibold text-gray-700">Active</span>
                    </label>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i>Create FAQ
                </button>
                <a href="{{ route('admin.faqs.index') }}" class="block w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition-colors mt-2">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </div>
        
    </div>
</form>

@endsection

@section('scripts')
<script>
document.getElementById('faqForm').addEventListener('submit', function(e) {
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
        showToast('An error occurred while creating the FAQ', 'error');
    });
});
</script>
@endsection
