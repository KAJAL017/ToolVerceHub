@extends('admin.layouts.app')

@section('title', 'General Settings')
@section('page-title', 'General Settings')
@section('page-subtitle', 'Manage your website general settings')

@section('content')

<form id="settingsForm" action="{{ route('admin.settings.general.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Settings -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Website Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-globe text-primary-600 mr-2"></i>
                    Website Information
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Website Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="website_name" value="{{ $settings['website_name'] }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="e.g., ToolHub">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="website_name"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Website Description</label>
                    <textarea name="website_description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="A brief description of your website">{{ $settings['website_description'] }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Short description that appears in search results and meta tags</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="website_description"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Website URL (Base URL) <span class="text-red-500">*</span>
                    </label>
                    <input type="url" name="website_url" value="{{ $settings['website_url'] }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="https://example.com">
                    <p class="text-xs text-gray-500 mt-1">
                        <i class="fas fa-info-circle text-primary-500"></i>
                        <strong>Important:</strong> Enter the full URL (with https://). This is required for the sitemap.
                    </p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="website_url"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Footer Text</label>
                    <input type="text" name="footer_text" value="{{ $settings['footer_text'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="© 2026 Your Company. All rights reserved.">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="footer_text"></p>
                </div>
            </div>
            
            <!-- Branding -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-palette text-primary-600 mr-2"></i>
                    Branding
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Logo</label>
                    
                    @if($settings['logo_url'])
                    <div class="mb-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
                        <img src="{{ $settings['logo_url'] }}" alt="Current Logo" style="max-height:60px;max-width:200px">
                        <p class="text-xs text-gray-500 mt-2">Current logo</p>
                    </div>
                    @endif
                    
                    <input type="file" name="logo" accept="image/*" id="logoInput"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <p class="text-xs text-gray-500 mt-1">Upload a new logo (PNG, JPG, SVG - Max 2MB)</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="logo"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Favicon</label>
                    
                    @if($settings['favicon_url'])
                    <div class="mb-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
                        <img src="{{ $settings['favicon_url'] }}" alt="Current Favicon" style="max-height:32px;max-width:32px">
                        <p class="text-xs text-gray-500 mt-2">Current favicon</p>
                    </div>
                    @endif
                    
                    <input type="file" name="favicon" accept="image/x-icon,image/png,image/jpeg" id="faviconInput"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <p class="text-xs text-gray-500 mt-1">Upload a new favicon (ICO, PNG - Max 1MB, recommended 32x32px)</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="favicon"></p>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-envelope text-primary-600 mr-2"></i>
                    Contact Information
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="contact@example.com">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="contact_email"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Support Email</label>
                    <input type="email" name="support_email" value="{{ $settings['support_email'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="support@example.com">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="support_email"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Admin Email</label>
                    <input type="email" name="admin_email" value="{{ $settings['admin_email'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="admin@example.com">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="admin_email"></p>
                </div>
            </div>
            
            </div>
            
        </div>
        
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-save text-primary-600 mr-2"></i>
                    Save Changes
                </h3>
                
                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors mb-3">
                    <i class="fas fa-save mr-2"></i>Save General Settings
                </button>
                
                <button type="button" onclick="window.location.reload()" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-colors">
                    <i class="fas fa-undo mr-2"></i>Reset Changes
                </button>
                
                <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start space-x-2">
                        <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                        <div class="text-sm text-blue-700">
                            <p class="font-semibold mb-1">Quick Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Website URL must include https://</li>
                                <li>Logo and favicon can be local paths or CDN URLs</li>
                                <li>Changes take effect immediately</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</form>

@endsection

@section('scripts')
<script>
console.log('Settings form script loaded');

document.getElementById('settingsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    console.log('Form submitted');
    
    // Clear all previous errors
    clearAllErrors();
    
    // Disable submit button
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
    
    const formData = new FormData(this);
    
    // Log form data
    console.log('Form data:');
    for (let [key, value] of formData.entries()) {
        console.log(key + ': ' + value);
    }
    
    console.log('Sending request to:', this.action);
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(response => {
        console.log('Response status:', response.status);
        console.log('Response ok:', response.ok);
        
        // Check if response is ok
        if (!response.ok) {
            return response.json().then(data => {
                console.log('Error response data:', data);
                throw { status: response.status, data: data };
            });
        }
        return response.json();
    })
    .then(data => {
        console.log('Success response data:', data);
        
        // Re-enable submit button
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        
        if (data.success) {
            console.log('Settings saved successfully!');
            showToast(data.message, 'success');
            // Clear all error states
            clearAllErrors();
            
            // Reload page after 1.5 seconds to show updated values
            console.log('Reloading page in 1.5 seconds...');
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else if (data.errors) {
            console.log('Validation errors:', data.errors);
            // Display validation errors below each field
            Object.keys(data.errors).forEach(fieldName => {
                const errorMessages = data.errors[fieldName];
                showFieldError(fieldName, errorMessages[0]);
            });
            
            // Also show first error in toast
            const firstError = Object.values(data.errors)[0][0];
            showToast(firstError, 'error');
        } else if (data.message) {
            console.log('Error message:', data.message);
            showToast(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Catch error:', error);
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        
        // Handle validation errors (422)
        if (error.status === 422 && error.data && error.data.errors) {
            console.log('422 Validation errors:', error.data.errors);
            Object.keys(error.data.errors).forEach(fieldName => {
                const errorMessages = error.data.errors[fieldName];
                showFieldError(fieldName, errorMessages[0]);
            });
            const firstError = Object.values(error.data.errors)[0][0];
            showToast(firstError, 'error');
        } else if (error.data && error.data.message) {
            console.log('Error message from catch:', error.data.message);
            showToast(error.data.message, 'error');
        } else {
            console.log('Generic error');
            showToast('An error occurred while saving settings', 'error');
        }
    });
});

// Function to show field error
function showFieldError(fieldName, errorMessage) {
    console.log('Showing error for field:', fieldName, 'Message:', errorMessage);
    // Find the error message element
    const errorElement = document.querySelector(`.error-message[data-field="${fieldName}"]`);
    if (errorElement) {
        errorElement.textContent = errorMessage;
        errorElement.classList.remove('hidden');
    }
    
    // Add error styling to input
    const inputElement = document.querySelector(`[name="${fieldName}"]`);
    if (inputElement) {
        inputElement.classList.add('border-red-500', 'focus:ring-red-500');
        inputElement.classList.remove('border-gray-300', 'focus:ring-primary-500');
    }
}

// Function to clear all errors
function clearAllErrors() {
    console.log('Clearing all errors');
    // Hide all error messages
    document.querySelectorAll('.error-message').forEach(el => {
        el.classList.add('hidden');
        el.textContent = '';
    });
    
    // Remove error styling from all inputs
    document.querySelectorAll('input, textarea').forEach(el => {
        el.classList.remove('border-red-500', 'focus:ring-red-500');
        el.classList.add('border-gray-300', 'focus:ring-primary-500');
    });
}

// Clear error when user starts typing
document.querySelectorAll('input, textarea').forEach(input => {
    input.addEventListener('input', function() {
        const fieldName = this.getAttribute('name');
        const errorElement = document.querySelector(`.error-message[data-field="${fieldName}"]`);
        if (errorElement && !errorElement.classList.contains('hidden')) {
            errorElement.classList.add('hidden');
            errorElement.textContent = '';
            this.classList.remove('border-red-500', 'focus:ring-red-500');
            this.classList.add('border-gray-300', 'focus:ring-primary-500');
        }
    });
});

console.log('All event listeners attached');
</script>
@endsection
