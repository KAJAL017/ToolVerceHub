@extends('admin.layouts.app')

@section('title', 'Social Media Settings')
@section('page-title', 'Social Media Settings')
@section('page-subtitle', 'Manage social media links')

@section('content')

<form id="socialMediaForm" action="{{ route('admin.settings.social-media.update') }}" method="POST">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Settings -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Social Media Links -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-share-alt text-primary-600 mr-2"></i>
                    Social Media Links
                </h3>
                
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-sm font-semibold text-gray-700 flex items-center">
                                <i class="fab fa-facebook text-blue-600 mr-2"></i>Facebook
                            </label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="facebook_active" {{ $settings['facebook_active'] ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            </label>
                        </div>
                        <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="https://facebook.com/yourpage">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="facebook_url"></p>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-sm font-semibold text-gray-700 flex items-center">
                                <i class="fab fa-twitter text-blue-400 mr-2"></i>Twitter/X
                            </label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="twitter_active" {{ $settings['twitter_active'] ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            </label>
                        </div>
                        <input type="url" name="twitter_url" value="{{ $settings['twitter_url'] }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="https://twitter.com/yourhandle">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="twitter_url"></p>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-sm font-semibold text-gray-700 flex items-center">
                                <i class="fab fa-instagram text-pink-600 mr-2"></i>Instagram
                            </label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="instagram_active" {{ $settings['instagram_active'] ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            </label>
                        </div>
                        <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="https://instagram.com/yourprofile">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="instagram_url"></p>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-sm font-semibold text-gray-700 flex items-center">
                                <i class="fab fa-linkedin text-blue-700 mr-2"></i>LinkedIn
                            </label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="linkedin_active" {{ $settings['linkedin_active'] ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            </label>
                        </div>
                        <input type="url" name="linkedin_url" value="{{ $settings['linkedin_url'] }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="https://linkedin.com/company/yourcompany">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="linkedin_url"></p>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-sm font-semibold text-gray-700 flex items-center">
                                <i class="fab fa-youtube text-red-600 mr-2"></i>YouTube
                            </label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="youtube_active" {{ $settings['youtube_active'] ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            </label>
                        </div>
                        <input type="url" name="youtube_url" value="{{ $settings['youtube_url'] }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="https://youtube.com/@yourchannel">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="youtube_url"></p>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-sm font-semibold text-gray-700 flex items-center">
                                <i class="fab fa-pinterest text-red-700 mr-2"></i>Pinterest
                            </label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="pinterest_active" {{ $settings['pinterest_active'] ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            </label>
                        </div>
                        <input type="url" name="pinterest_url" value="{{ $settings['pinterest_url'] }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="https://pinterest.com/yourprofile">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="pinterest_url"></p>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-sm font-semibold text-gray-700 flex items-center">
                                <i class="fab fa-tiktok text-gray-900 mr-2"></i>TikTok
                            </label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="tiktok_active" {{ $settings['tiktok_active'] ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            </label>
                        </div>
                        <input type="url" name="tiktok_url" value="{{ $settings['tiktok_url'] }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="https://tiktok.com/@yourhandle">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="tiktok_url"></p>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-sm font-semibold text-gray-700 flex items-center">
                                <i class="fab fa-github text-gray-800 mr-2"></i>GitHub
                            </label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="github_active" {{ $settings['github_active'] ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                            </label>
                        </div>
                        <input type="url" name="github_url" value="{{ $settings['github_url'] }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="https://github.com/yourusername">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="github_url"></p>
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
                    <i class="fas fa-save mr-2"></i>Save Social Media Links
                </button>
                
                <button type="button" onclick="window.location.reload()" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-colors">
                    <i class="fas fa-undo mr-2"></i>Cancel
                </button>
                
                <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start space-x-2">
                        <i class="fas fa-lightbulb text-blue-500 mt-1"></i>
                        <div class="text-sm text-blue-700">
                            <p class="font-semibold mb-1">Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Use complete URLs with https://</li>
                                <li>Test links after saving</li>
                                <li>Keep profiles active</li>
                                <li>Use consistent branding</li>
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
console.log('Social media settings script loaded');

document.getElementById('socialMediaForm').addEventListener('submit', function(e) {
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
    
    console.log('Sending request...');
    
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
        
        if (!response.ok) {
            return response.json().then(data => {
                console.log('Error response:', data);
                throw { status: response.status, data: data };
            });
        }
        return response.json();
    })
    .then(data => {
        console.log('Success response:', data);
        
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
            Object.keys(data.errors).forEach(fieldName => {
                const errorMessages = data.errors[fieldName];
                showFieldError(fieldName, errorMessages[0]);
            });
            
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
        
        if (error.status === 422 && error.data && error.data.errors) {
            console.log('422 Validation errors:', error.data.errors);
            Object.keys(error.data.errors).forEach(fieldName => {
                const errorMessages = error.data.errors[fieldName];
                showFieldError(fieldName, errorMessages[0]);
            });
            const firstError = Object.values(error.data.errors)[0][0];
            showToast(firstError, 'error');
        } else if (error.data && error.data.message) {
            console.log('Error message:', error.data.message);
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
    
    const errorElement = document.querySelector(`.error-message[data-field="${fieldName}"]`);
    if (errorElement) {
        errorElement.textContent = errorMessage;
        errorElement.classList.remove('hidden');
    }
    
    const inputElement = document.querySelector(`[name="${fieldName}"]`);
    if (inputElement) {
        inputElement.classList.add('border-red-500', 'focus:ring-red-500');
        inputElement.classList.remove('border-gray-300', 'focus:ring-primary-500');
    }
}

// Function to clear all errors
function clearAllErrors() {
    console.log('Clearing all errors');
    
    document.querySelectorAll('.error-message').forEach(el => {
        el.classList.add('hidden');
        el.textContent = '';
    });
    
    document.querySelectorAll('input[type="url"]').forEach(el => {
        el.classList.remove('border-red-500', 'focus:ring-red-500');
        el.classList.add('border-gray-300', 'focus:ring-primary-500');
    });
}

// Clear error when user starts typing
document.querySelectorAll('input[type="url"]').forEach(input => {
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
