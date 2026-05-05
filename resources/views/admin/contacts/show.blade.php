@extends('admin.layouts.app')

@section('title', 'Contact Message Details')
@section('page-title', 'Contact Message Details')
@section('page-subtitle', 'View contact form submission')

@section('content')

{{-- Back Button --}}
<div class="mb-6">
    <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800 transition-colors">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Contact Messages
    </a>
</div>

{{-- Message Details Card --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    {{-- Header --}}
    <div class="p-6 border-b border-gray-200 {{ !$contact->is_read ? 'bg-blue-50' : '' }}">
        <div class="flex items-start justify-between">
            <div class="flex items-center">
                <div class="w-16 h-16 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-user text-white text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 flex items-center">
                        {{ $contact->name }}
                        @if(!$contact->is_read)
                            <span class="ml-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                Unread
                            </span>
                        @else
                            <span class="ml-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                <i class="fas fa-check mr-1"></i>
                                Read
                            </span>
                        @endif
                    </h1>
                    <p class="text-gray-600 mt-1">{{ $contact->email }}</p>
                    @if($contact->phone)
                        <p class="text-gray-500 text-sm mt-1">
                            <i class="fas fa-phone mr-1"></i>
                            {{ $contact->phone }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="toggleRead({{ $contact->id }}, {{ $contact->is_read ? 'false' : 'true' }})" 
                        class="inline-flex items-center px-4 py-2 {{ $contact->is_read ? 'bg-orange-600 hover:bg-orange-700' : 'bg-green-600 hover:bg-green-700' }} text-white font-semibold rounded-lg transition-colors">
                    <i class="fas fa-{{ $contact->is_read ? 'envelope' : 'envelope-open' }} mr-2"></i>
                    {{ $contact->is_read ? 'Mark as Unread' : 'Mark as Read' }}
                </button>
                <button onclick="handleDelete({{ $contact->id }}, '{{ addslashes($contact->name) }}')" 
                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition-colors">
                    <i class="fas fa-trash mr-2"></i>
                    Delete
                </button>
            </div>
        </div>
    </div>
    
    {{-- Message Content --}}
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            {{-- Main Message --}}
            <div class="lg:col-span-3">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Subject</h3>
                    <p class="text-gray-800 text-lg">{{ $contact->subject }}</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Message</h3>
                    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <p class="text-gray-800 leading-relaxed whitespace-pre-wrap text-base">{{ $contact->message }}</p>
                    </div>
                </div>
                
                {{-- Additional Message Info --}}
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg p-4 border border-gray-200">
                        <h4 class="text-md font-semibold text-gray-900 mb-3">Contact Information</h4>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-user text-gray-400 w-5 mr-3"></i>
                                <span class="text-gray-800">{{ $contact->name }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-gray-400 w-5 mr-3"></i>
                                <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:text-blue-800">{{ $contact->email }}</a>
                            </div>
                            @if($contact->phone)
                            <div class="flex items-center">
                                <i class="fas fa-phone text-gray-400 w-5 mr-3"></i>
                                <a href="tel:{{ $contact->phone }}" class="text-blue-600 hover:text-blue-800">{{ $contact->phone }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg p-4 border border-gray-200">
                        <h4 class="text-md font-semibold text-gray-900 mb-3">Technical Details</h4>
                        <div class="space-y-3">
                            @if($contact->ip_address)
                            <div class="flex items-center">
                                <i class="fas fa-globe text-gray-400 w-5 mr-3"></i>
                                <span class="text-gray-800 font-mono text-sm">{{ $contact->ip_address }}</span>
                            </div>
                            @endif
                            @if($contact->user_agent)
                            <div class="flex items-start">
                                <i class="fas fa-desktop text-gray-400 w-5 mr-3 mt-1"></i>
                                <span class="text-gray-800 text-sm">{{ Str::limit($contact->user_agent, 80) }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Sidebar Info --}}
            <div class="lg:col-span-1">
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Message Details</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-gray-600">Received</label>
                            <p class="text-gray-900 mt-1">
                                {{ $contact->created_at->format('F j, Y') }}
                                <br>
                                <span class="text-sm text-gray-500">{{ $contact->created_at->format('g:i A') }}</span>
                            </p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-600">Time Ago</label>
                            <p class="text-gray-900 mt-1">{{ $contact->created_at->diffForHumans() }}</p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-600">Status</label>
                            <p class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $contact->is_read ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $contact->is_read ? 'Read' : 'Unread' }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                
                {{-- Quick Actions --}}
                <div class="bg-white rounded-lg p-4 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                    
                    <div class="space-y-3">
                        <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject) }}" 
                           class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-reply mr-2"></i>
                            Reply via Email
                        </a>
                        
                        @if($contact->phone)
                        <a href="tel:{{ $contact->phone }}" 
                           class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-phone mr-2"></i>
                            Call {{ $contact->phone }}
                        </a>
                        @endif
                        
                        <button onclick="copyToClipboard('{{ $contact->email }}')" 
                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-copy mr-2"></i>
                            Copy Email
                        </button>
                        
                        <button onclick="copyToClipboard('{{ addslashes($contact->message) }}')" 
                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition-colors">
                            <i class="fas fa-clipboard mr-2"></i>
                            Copy Message
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        showToast('{{ session('success') }}', 'success');
    @endif

    @if(session('error'))
        showToast('{{ session('error') }}', 'error');
    @endif
});

async function toggleRead(contactId, newStatus) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    
    try {
        const response = await fetch(`{{ url('admin/contacts') }}/${contactId}/toggle-read`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken ? csrfToken.content : '',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            showToast(data.message, 'success');
            setTimeout(() => {
                location.reload(); // Reload to update the UI
            }, 1000);
        } else {
            showToast(data.message || 'Failed to update status', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('An error occurred while updating the status', 'error');
    }
}

async function handleDelete(contactId, contactName) {
    const confirmed = await showConfirmDialog({
        title: 'Delete Contact Message',
        message: `Are you sure you want to delete the message from "${contactName}"? This action cannot be undone.`,
        confirmText: 'Yes, Delete',
        cancelText: 'Cancel',
        type: 'danger'
    });

    if (confirmed) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        
        try {
            const response = await fetch(`{{ url('admin/contacts') }}/${contactId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken ? csrfToken.content : '',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                showToast(data.message || 'Contact message deleted successfully!', 'success');
                setTimeout(() => {
                    window.location.href = '{{ route('admin.contacts.index') }}';
                }, 1500);
            } else {
                showToast(data.message || 'Failed to delete contact message', 'error');
            }
        } catch (error) {
            console.error('Error:', error);
            showToast('An error occurred while deleting the contact message', 'error');
        }
    }
}

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        showToast('Email address copied to clipboard!', 'success');
    }, function(err) {
        console.error('Could not copy text: ', err);
        showToast('Failed to copy email address', 'error');
    });
}
</script>
@endsection