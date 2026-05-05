@extends('admin.layouts.app')

@section('title', 'Advertisement Settings')
@section('page-title', 'Advertisement Settings')
@section('page-subtitle', 'Manage your website advertisements and ad codes')

@section('content')

<form id="adsForm" action="{{ route('admin.settings.advertisements.update') }}" method="POST">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Settings -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Advertisement Status -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-toggle-on text-primary-600 mr-2"></i>
                    Advertisement Status
                </h3>
                
                <div class="space-y-4">
                    <label class="flex items-center cursor-pointer p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        <input type="checkbox" name="ads_enabled" {{ $settings['ads_enabled'] ? 'checked' : '' }} class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <div class="ml-3">
                            <span class="text-sm font-semibold text-gray-700">Enable Advertisements</span>
                            <p class="text-xs text-gray-500">Turn on/off all advertisements on your website</p>
                        </div>
                    </label>
                    
                    <label class="flex items-center cursor-pointer p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        <input type="checkbox" name="google_adsense_enabled" {{ $settings['google_adsense_enabled'] ? 'checked' : '' }} class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <div class="ml-3">
                            <span class="text-sm font-semibold text-gray-700">Enable Google AdSense</span>
                            <p class="text-xs text-gray-500">Use Google AdSense for automatic ad placement</p>
                        </div>
                    </label>
                </div>
            </div>
            
            <!-- Google AdSense -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fab fa-google text-primary-600 mr-2"></i>
                    Google AdSense
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">AdSense Client ID</label>
                    <input type="text" name="google_adsense_client_id" value="{{ $settings['google_adsense_client_id'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="ca-pub-XXXXXXXXXXXXXXXX">
                    <p class="text-xs text-gray-500 mt-1">Your Google AdSense publisher ID</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="google_adsense_client_id"></p>
                </div>
            </div>
            
            <!-- Ad Placement Codes -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-code text-primary-600 mr-2"></i>
                    Ad Placement Codes
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-arrow-up text-blue-500 mr-1"></i>
                        Header Ad Code
                    </label>
                    <textarea name="header_ad_code" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 font-mono text-sm"
                        placeholder="<script>...</script>">{{ $settings['header_ad_code'] }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Ad code that appears at the top of pages</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="header_ad_code"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-arrow-right text-green-500 mr-1"></i>
                        Sidebar Ad Code
                    </label>
                    <textarea name="sidebar_ad_code" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 font-mono text-sm"
                        placeholder="<script>...</script>">{{ $settings['sidebar_ad_code'] }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Ad code that appears in the sidebar</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="sidebar_ad_code"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-align-center text-purple-500 mr-1"></i>
                        In-Content Ad Code
                    </label>
                    <textarea name="in_content_ad_code" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 font-mono text-sm"
                        placeholder="<script>...</script>">{{ $settings['in_content_ad_code'] }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Ad code that appears within content (blog posts, articles)</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="in_content_ad_code"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-arrow-down text-orange-500 mr-1"></i>
                        Footer Ad Code
                    </label>
                    <textarea name="footer_ad_code" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 font-mono text-sm"
                        placeholder="<script>...</script>">{{ $settings['footer_ad_code'] }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Ad code that appears at the bottom of pages</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="footer_ad_code"></p>
                </div>
            </div>
            
            <!-- Popup Ads -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-window-restore text-primary-600 mr-2"></i>
                    Popup Advertisements
                </h3>
                
                <div class="mb-4">
                    <label class="flex items-center cursor-pointer p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        <input type="checkbox" name="popup_ad_enabled" {{ $settings['popup_ad_enabled'] ? 'checked' : '' }} class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <div class="ml-3">
                            <span class="text-sm font-semibold text-gray-700">Enable Popup Ads</span>
                            <p class="text-xs text-gray-500">Show popup advertisements to visitors</p>
                        </div>
                    </label>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Popup Ad Code</label>
                    <textarea name="popup_ad_code" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 font-mono text-sm"
                        placeholder="<script>...</script>">{{ $settings['popup_ad_code'] }}</textarea>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="popup_ad_code"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Popup Delay (seconds)</label>
                    <input type="number" name="popup_delay" value="{{ $settings['popup_delay'] }}" min="0" max="60"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="5">
                    <p class="text-xs text-gray-500 mt-1">Delay before showing popup (0 = immediate)</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="popup_delay"></p>
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
                    <i class="fas fa-save mr-2"></i>Save Ad Settings
                </button>
                
                <button type="button" onclick="window.location.reload()" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-colors">
                    <i class="fas fa-undo mr-2"></i>Reset Changes
                </button>
                
                <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <div class="flex items-start space-x-2">
                        <i class="fas fa-exclamation-triangle text-yellow-500 mt-1"></i>
                        <div class="text-sm text-yellow-700">
                            <p class="font-semibold mb-1">Important:</p>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Test ad codes before deploying</li>
                                <li>Follow ad network policies</li>
                                <li>Don't place too many ads</li>
                                <li>Ensure mobile responsiveness</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start space-x-2">
                        <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                        <div class="text-sm text-blue-700">
                            <p class="font-semibold mb-1">Ad Placement Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Header: Best for banners</li>
                                <li>Sidebar: Good for vertical ads</li>
                                <li>In-Content: High engagement</li>
                                <li>Footer: Less intrusive</li>
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
console.log('Advertisement settings script loaded');

document.getElementById('adsForm').addEventListener('submit', function(e) {
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
        console.log(key + ': ' + (value.length > 50 ? value.substring(0, 50) + '...' : value));
    }
    
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
            clearAllErrors();
            
            // Reload page after 1.5 seconds
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
            
            // Show first error in toast
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
    
    // Add error styling to input/textarea
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
    
    // Remove error styling from all inputs and textareas
    document.querySelectorAll('input:not([type="checkbox"]), textarea').forEach(el => {
        el.classList.remove('border-red-500', 'focus:ring-red-500');
        el.classList.add('border-gray-300', 'focus:ring-primary-500');
    });
}

// Clear error when user starts typing
document.querySelectorAll('input:not([type="checkbox"]), textarea').forEach(input => {
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
