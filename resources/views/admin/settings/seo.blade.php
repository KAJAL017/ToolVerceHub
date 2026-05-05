@extends('admin.layouts.app')

@section('title', 'SEO Settings')
@section('page-title', 'SEO Settings')
@section('page-subtitle', 'Optimize your website for search engines')

@section('content')

<form id="seoForm" action="{{ route('admin.settings.seo.update') }}" method="POST">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Settings -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Meta Tags -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-tags text-primary-600 mr-2"></i>
                    Meta Tags
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $settings['meta_title'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Your Website Title" autocomplete="off">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="meta_title"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Brief description of your website" autocomplete="off">{{ $settings['meta_description'] }}</textarea>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="meta_description"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ $settings['meta_keywords'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="keyword1, keyword2, keyword3" autocomplete="off">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="meta_keywords"></p>
                </div>
            </div>
            
            <!-- Open Graph (Facebook) -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fab fa-facebook text-primary-600 mr-2"></i>
                    Open Graph (Facebook)
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">OG Title</label>
                    <input type="text" name="og_title" value="{{ $settings['og_title'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Title for social media sharing" autocomplete="off">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="og_title"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">OG Description</label>
                    <textarea name="og_description" rows="2"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Description for social media sharing" autocomplete="off">{{ $settings['og_description'] }}</textarea>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="og_description"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">OG Image URL</label>
                    <input type="url" name="og_image" value="{{ $settings['og_image'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="https://example.com/image.jpg" autocomplete="off">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="og_image"></p>
                </div>
            </div>
            
            <!-- Twitter Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fab fa-twitter text-primary-600 mr-2"></i>
                    Twitter Card
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Twitter Card Type</label>
                    <select name="twitter_card" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="summary" {{ $settings['twitter_card'] == 'summary' ? 'selected' : '' }}>Summary</option>
                        <option value="summary_large_image" {{ $settings['twitter_card'] == 'summary_large_image' ? 'selected' : '' }}>Summary Large Image</option>
                    </select>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="twitter_card"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Twitter Site Handle</label>
                    <input type="text" name="twitter_site" value="{{ $settings['twitter_site'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="@yourusername" autocomplete="off">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="twitter_site"></p>
                </div>
            </div>
            
            <!-- Analytics & Webmaster Tools -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-chart-bar text-primary-600 mr-2"></i>
                    Analytics & Webmaster Tools
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fab fa-google text-blue-500 mr-1"></i>
                        Google Analytics ID
                    </label>
                    <input type="text" name="google_analytics_id" value="{{ $settings['google_analytics_id'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="G-XXXXXXXXXX or UA-XXXXXXXXX-X" autocomplete="off">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="google_analytics_id"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fab fa-google text-red-500 mr-1"></i>
                        Google Search Console Verification Code
                    </label>
                    <input type="text" name="google_search_console_code" value="{{ $settings['google_search_console_code'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="google-site-verification=xxxxx" autocomplete="off">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="google_search_console_code"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fab fa-microsoft text-blue-600 mr-1"></i>
                        Bing Webmaster Verification Code
                    </label>
                    <input type="text" name="bing_webmaster_code" value="{{ $settings['bing_webmaster_code'] }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="msvalidate.01=xxxxx" autocomplete="off">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="bing_webmaster_code"></p>
                </div>
            </div>
            
            <!-- Robots.txt -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-robot text-primary-600 mr-2"></i>
                    Robots.txt
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Robots.txt Content</label>
                    <textarea name="robots_txt" rows="8"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 font-mono text-sm"
                        placeholder="User-agent: *&#10;Allow: /&#10;Sitemap: https://example.com/sitemap.xml" autocomplete="off">{{ $settings['robots_txt'] }}</textarea>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="robots_txt"></p>
                </div>
            </div>
            
            <!-- SEO Features -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-cogs text-primary-600 mr-2"></i>
                    SEO Features
                </h3>
                
                <div class="space-y-4">
                    <label class="flex items-center cursor-pointer p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        <input type="checkbox" name="sitemap_enabled" {{ $settings['sitemap_enabled'] ? 'checked' : '' }} class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <div class="ml-3">
                            <span class="text-sm font-semibold text-gray-700">Enable XML Sitemap</span>
                            <p class="text-xs text-gray-500">Automatically generate sitemap for search engines</p>
                        </div>
                    </label>
                    
                    <label class="flex items-center cursor-pointer p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        <input type="checkbox" name="canonical_urls_enabled" {{ $settings['canonical_urls_enabled'] ? 'checked' : '' }} class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <div class="ml-3">
                            <span class="text-sm font-semibold text-gray-700">Enable Canonical URLs</span>
                            <p class="text-xs text-gray-500">Prevent duplicate content issues</p>
                        </div>
                    </label>
                </div>
            </div>
            
            <!-- Sitemap Management -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-sitemap text-primary-600 mr-2"></i>
                    Sitemap Management
                </h3>
                
                <div class="space-y-4">
                    <!-- Generate Sitemap Button -->
                    <button type="button" id="generateSitemapBtn" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center gap-2">
                        <i class="fas fa-sync-alt"></i>
                        Generate Sitemap.xml
                    </button>
                    
                    <!-- Download Sitemap Button -->
                    <a href="{{ asset('sitemap.xml') }}" download="sitemap.xml" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center gap-2 text-center">
                        <i class="fas fa-download"></i>
                        Download Sitemap.xml
                    </a>
                    
                    <!-- View on Website Button -->
                    <a href="{{ url('/sitemap.xml') }}" target="_blank" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors flex items-center justify-center gap-2 text-center">
                        <i class="fas fa-external-link-alt"></i>
                        View on Website
                    </a>
                    
                    <!-- Sitemap Info -->
                    <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                            <div class="text-sm text-blue-700">
                                <p class="font-semibold mb-1">Sitemap Info:</p>
                                <ul class="list-disc list-inside space-y-1 text-xs">
                                    <li>Location: /public/sitemap.xml</li>
                                    <li>Auto-updates when content changes</li>
                                    <li>Submit to Google Search Console</li>
                                    <li>Submit to Bing Webmaster Tools</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Last Generated -->
                    <div id="sitemapStatus" class="text-xs text-gray-500 text-center">
                        @if(file_exists(public_path('sitemap.xml')))
                            <i class="fas fa-check-circle text-green-500"></i>
                            Last generated: {{ date('M d, Y H:i', filemtime(public_path('sitemap.xml'))) }}
                        @else
                            <i class="fas fa-exclamation-circle text-yellow-500"></i>
                            Sitemap not generated yet
                        @endif
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
                    <i class="fas fa-save mr-2"></i>Save SEO Settings
                </button>
                
                <button type="button" onclick="window.location.reload()" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-colors">
                    <i class="fas fa-undo mr-2"></i>Reset Changes
                </button>
                
                <div class="mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <div class="flex items-start space-x-2">
                        <i class="fas fa-lightbulb text-green-500 mt-1"></i>
                        <div class="text-sm text-green-700">
                            <p class="font-semibold mb-1">SEO Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Keep titles under 60 characters</li>
                                <li>Write unique meta descriptions</li>
                                <li>Use relevant keywords naturally</li>
                                <li>Submit sitemap to search engines</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start space-x-2">
                        <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                        <div class="text-sm text-blue-700">
                            <p class="font-semibold mb-1">Quick Links:</p>
                            <ul class="space-y-2 text-xs mt-2">
                                <li><a href="https://search.google.com/search-console" target="_blank" class="text-blue-600 hover:underline flex items-center"><i class="fab fa-google mr-1"></i> Google Search Console</a></li>
                                <li><a href="https://www.bing.com/webmasters" target="_blank" class="text-blue-600 hover:underline flex items-center"><i class="fab fa-microsoft mr-1"></i> Bing Webmaster Tools</a></li>
                                <li><a href="https://analytics.google.com" target="_blank" class="text-blue-600 hover:underline flex items-center"><i class="fas fa-chart-line mr-1"></i> Google Analytics</a></li>
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
console.log('SEO settings script loaded');

document.getElementById('seoForm').addEventListener('submit', function(e) {
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
    
    document.querySelectorAll('input:not([type="checkbox"]), textarea, select').forEach(el => {
        el.classList.remove('border-red-500', 'focus:ring-red-500');
        el.classList.add('border-gray-300', 'focus:ring-primary-500');
    });
}

// Clear error when user starts typing
document.querySelectorAll('input:not([type="checkbox"]), textarea, select').forEach(input => {
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

// Sitemap generation
document.getElementById('generateSitemapBtn').addEventListener('click', function() {
    console.log('Generate sitemap button clicked');
    
    const btn = this;
    const originalHTML = btn.innerHTML;
    
    // Disable button and show loading
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';
    
    fetch('{{ route("admin.settings.sitemap.generate") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('Sitemap generation response:', data);
        
        btn.disabled = false;
        btn.innerHTML = originalHTML;
        
        if (data.success) {
            showToast(data.message, 'success');
            
            // Update sitemap status
            const statusDiv = document.getElementById('sitemapStatus');
            if (statusDiv && data.lastGenerated) {
                statusDiv.innerHTML = '<i class="fas fa-check-circle text-green-500"></i> Last generated: ' + data.lastGenerated;
            }
        } else {
            showToast(data.message || 'Failed to generate sitemap', 'error');
        }
    })
    .catch(error => {
        console.error('Sitemap generation error:', error);
        btn.disabled = false;
        btn.innerHTML = originalHTML;
        showToast('An error occurred while generating sitemap', 'error');
    });
});
</script>
@endsection
