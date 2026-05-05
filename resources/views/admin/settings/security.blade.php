@extends('admin.layouts.app')

@section('title', 'Admin Security')
@section('page-title', 'Admin Security')
@section('page-subtitle', 'Change admin username and password')

@section('content')

<form id="securityForm" action="{{ route('admin.settings.security.update') }}" method="POST">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Settings -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Admin Account Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-user-shield text-primary-600 mr-2"></i>
                    Admin Account Information
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Admin Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ $admin['name'] }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Enter admin name">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="name"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Admin Email (Username) <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" value="{{ $admin['email'] }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="admin@example.com">
                    <p class="text-xs text-gray-500 mt-1">This email is used for admin login</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="email"></p>
                </div>
            </div>
            
            <!-- Change Password -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-key text-primary-600 mr-2"></i>
                    Change Password
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Current Password
                    </label>
                    <input type="password" name="current_password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Enter current password">
                    <p class="text-xs text-gray-500 mt-1">Required only if changing password</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="current_password"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">New Password</label>
                    <input type="password" name="new_password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Enter new password">
                    <p class="text-xs text-gray-500 mt-1">Minimum 4 characters (leave empty to keep current password)</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="new_password"></p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Confirm new password">
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="new_password_confirmation"></p>
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
                    <i class="fas fa-save mr-2"></i>Update Admin Account
                </button>
                
                <button type="button" onclick="window.location.reload()" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-colors">
                    <i class="fas fa-undo mr-2"></i>Cancel
                </button>
                
                <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <div class="flex items-start space-x-2">
                        <i class="fas fa-exclamation-triangle text-yellow-500 mt-1"></i>
                        <div class="text-sm text-yellow-700">
                            <p class="font-semibold mb-1">Important:</p>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Remember your new credentials</li>
                                <li>You'll need to login again after password change</li>
                                <li>Use a strong password</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start space-x-2">
                        <i class="fas fa-shield-alt text-blue-500 mt-1"></i>
                        <div class="text-sm text-blue-700">
                            <p class="font-semibold mb-1">Password Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Use at least 4 characters</li>
                                <li>Mix uppercase & lowercase</li>
                                <li>Include numbers</li>
                                <li>Add special characters</li>
                                <li>Don't use common words</li>
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
console.log('Security settings script loaded');

document.getElementById('securityForm').addEventListener('submit', function(e) {
    e.preventDefault();
    console.log('Form submitted');
    
    // Clear all previous errors
    clearAllErrors();
    
    // Disable submit button
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Updating...';
    
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
            console.log('Account updated successfully!');
            showToast(data.message, 'success');
            clearAllErrors();
            
            // If password was changed, redirect to login after 3 seconds
            if (data.password_changed) {
                console.log('Password changed, redirecting to login in 3 seconds...');
                setTimeout(() => {
                    window.location.href = '{{ route("admin.login") }}';
                }, 3000);
            } else {
                // Just reload to show updated info
                console.log('Reloading page in 1.5 seconds...');
                setTimeout(() => {
                    window.location.reload();
                }, 1500);
            }
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
            showToast('An error occurred while updating credentials', 'error');
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
    
    document.querySelectorAll('input').forEach(el => {
        el.classList.remove('border-red-500', 'focus:ring-red-500');
        el.classList.add('border-gray-300', 'focus:ring-primary-500');
    });
}

// Clear error when user starts typing
document.querySelectorAll('input').forEach(input => {
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
