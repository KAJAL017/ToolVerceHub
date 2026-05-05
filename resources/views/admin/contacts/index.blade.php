@extends('admin.layouts.app')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')
@section('page-subtitle', 'Manage contact form submissions')

@section('content')

{{-- Statistics Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4 mb-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-envelope text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
                <p class="text-sm text-gray-500">Total Messages</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-envelope-open text-red-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-2xl font-bold text-gray-900">{{ $stats['unread'] }}</p>
                <p class="text-sm text-gray-500">Unread</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-2xl font-bold text-gray-900">{{ $stats['read'] }}</p>
                <p class="text-sm text-gray-500">Read</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar-day text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-2xl font-bold text-gray-900">{{ $stats['today'] }}</p>
                <p class="text-sm text-gray-500">Today</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar-week text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-2xl font-bold text-gray-900">{{ $stats['this_week'] }}</p>
                <p class="text-sm text-gray-500">This Week</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar-alt text-indigo-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-2xl font-bold text-gray-900">{{ $stats['this_month'] }}</p>
                <p class="text-sm text-gray-500">This Month</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="p-6 border-b border-gray-200">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-800">All Contact Messages</h3>
                <p class="text-sm text-gray-500 mt-1">Manage contact form submissions</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <select id="statusFilter" class="pl-10 pr-8 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">All Status</option>
                        <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                    </select>
                    <i class="fas fa-filter absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <div class="relative">
                    <input 
                        type="text" 
                        id="searchInput" 
                        placeholder="Search messages..." 
                        value="{{ request('search') }}"
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 w-64"
                    >
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <div class="flex items-center gap-2">
                    <button id="bulkActionBtn" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors disabled:opacity-50" disabled>
                        <i class="fas fa-tasks mr-2"></i>
                        Bulk Actions
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full" id="contactsTable">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left">
                        <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="name">
                        <div class="flex items-center gap-2">
                            <span>Contact Info</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="subject">
                        <div class="flex items-center gap-2">
                            <span>Subject</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="status">
                        <div class="flex items-center gap-2">
                            <span>Status</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="date">
                        <div class="flex items-center gap-2">
                            <span>Received</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($contacts as $contact)
                <tr class="hover:bg-gray-50 transition-colors {{ !$contact->is_read ? 'bg-blue-50' : '' }}" 
                    data-name="{{ strtolower($contact->name) }}" 
                    data-email="{{ strtolower($contact->email) }}" 
                    data-subject="{{ strtolower($contact->subject) }}"
                    data-status="{{ $contact->is_read ? 'read' : 'unread' }}"
                    data-date="{{ $contact->created_at->format('Y-m-d') }}">
                    <td class="px-6 py-4">
                        <input type="checkbox" class="contact-checkbox rounded border-gray-300 text-primary-600 focus:ring-primary-500" value="{{ $contact->id }}">
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <div>
                                <div class="text-sm font-semibold text-gray-900 flex items-center">
                                    {{ $contact->name }}
                                    @if(!$contact->is_read)
                                        <span class="ml-2 w-2 h-2 bg-red-500 rounded-full"></span>
                                    @endif
                                </div>
                                <div class="text-sm text-gray-500">{{ $contact->email }}</div>
                                @if($contact->phone)
                                    <div class="text-xs text-gray-400">{{ $contact->phone }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ Str::limit($contact->subject, 50) }}</div>
                        <div class="text-sm text-gray-500">{{ Str::limit($contact->message, 80) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                            {{ $contact->is_read ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $contact->is_read ? 'Read' : 'Unread' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-600">{{ $contact->created_at->format('M d, Y') }}</div>
                        <div class="text-xs text-gray-400">{{ $contact->created_at->format('h:i A') }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.contacts.show', $contact) }}" 
                               class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" 
                               title="View">
                                <i class="fas fa-eye text-sm"></i>
                            </a>
                            <button type="button" 
                                    onclick="toggleRead({{ $contact->id }}, {{ $contact->is_read ? 'false' : 'true' }})"
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg {{ $contact->is_read ? 'bg-orange-50 text-orange-600 hover:bg-orange-100' : 'bg-green-50 text-green-600 hover:bg-green-100' }} transition-colors" 
                                    title="{{ $contact->is_read ? 'Mark as Unread' : 'Mark as Read' }}">
                                <i class="fas fa-{{ $contact->is_read ? 'envelope' : 'envelope-open' }} text-sm"></i>
                            </button>
                            <button type="button" 
                                    onclick="handleDelete({{ $contact->id }}, '{{ addslashes($contact->name) }}')"
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" 
                                    title="Delete">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-inbox text-gray-300 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No contact messages found</p>
                            <p class="text-gray-400 text-sm mt-1">Contact messages will appear here when submitted</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Showing <span id="showingCount" class="font-semibold text-gray-900">{{ $contacts->count() }}</span> of <span id="totalCount" class="font-semibold text-gray-900">{{ $contacts->total() }}</span> messages
            </div>
            @if($contacts->hasPages())
                <div>
                    {{ $contacts->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>

</div>

{{-- Bulk Actions Modal --}}
<div id="bulkModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Bulk Actions</h3>
            <div class="space-y-3">
                <button onclick="bulkAction('mark_read')" class="w-full text-left px-4 py-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-envelope-open text-green-600 mr-3"></i>
                    Mark as Read
                </button>
                <button onclick="bulkAction('mark_unread')" class="w-full text-left px-4 py-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-envelope text-orange-600 mr-3"></i>
                    Mark as Unread
                </button>
                <button onclick="bulkAction('delete')" class="w-full text-left px-4 py-2 hover:bg-gray-100 rounded-lg transition-colors text-red-600">
                    <i class="fas fa-trash mr-3"></i>
                    Delete Selected
                </button>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button onclick="closeBulkModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">Cancel</button>
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

    const table = document.getElementById('contactsTable');
    if (!table) return;
    
    const tbody = table.querySelector('tbody');
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const showingCount = document.getElementById('showingCount');
    const sortHeaders = table.querySelectorAll('th[data-sort]');
    const selectAll = document.getElementById('selectAll');
    const bulkActionBtn = document.getElementById('bulkActionBtn');
    
    let sortDirection = {};
    let allRows = Array.from(tbody.querySelectorAll('tr[data-name]'));
    const totalOnPage = allRows.length;

    // Bulk selection
    selectAll?.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.contact-checkbox');
        checkboxes.forEach(cb => {
            if (!cb.closest('tr').style.display || cb.closest('tr').style.display !== 'none') {
                cb.checked = this.checked;
            }
        });
        updateBulkButton();
    });

    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('contact-checkbox')) {
            updateBulkButton();
        }
    });

    function updateBulkButton() {
        const checkedBoxes = document.querySelectorAll('.contact-checkbox:checked');
        bulkActionBtn.disabled = checkedBoxes.length === 0;
        
        if (checkedBoxes.length > 0) {
            bulkActionBtn.textContent = `Actions (${checkedBoxes.length})`;
        } else {
            bulkActionBtn.textContent = 'Bulk Actions';
        }
    }

    bulkActionBtn?.addEventListener('click', function() {
        const checkedBoxes = document.querySelectorAll('.contact-checkbox:checked');
        if (checkedBoxes.length > 0) {
            document.getElementById('bulkModal').classList.remove('hidden');
        }
    });

    // Sorting
    sortHeaders.forEach(header => {
        const column = header.getAttribute('data-sort');
        sortDirection[column] = 'asc';
        
        header.addEventListener('click', function() {
            const currentDirection = sortDirection[column];
            const newDirection = currentDirection === 'asc' ? 'desc' : 'asc';
            sortDirection[column] = newDirection;
            
            sortHeaders.forEach(h => {
                const icon = h.querySelector('i');
                if (icon) {
                    icon.className = 'fas fa-sort text-gray-400';
                }
            });
            
            const icon = header.querySelector('i');
            if (icon) {
                icon.className = newDirection === 'asc' ? 'fas fa-sort-up text-primary-600' : 'fas fa-sort-down text-primary-600';
            }
            
            sortTable(column, newDirection);
        });
    });

    function sortTable(column, direction) {
        const visibleRows = Array.from(tbody.querySelectorAll('tr[data-name]:not([style*="display: none"])'));
        
        visibleRows.sort((a, b) => {
            let aValue, bValue;
            
            if (column === 'name') {
                aValue = a.getAttribute('data-name') || '';
                bValue = b.getAttribute('data-name') || '';
            } else if (column === 'subject') {
                aValue = a.getAttribute('data-subject') || '';
                bValue = b.getAttribute('data-subject') || '';
            } else if (column === 'status') {
                aValue = a.getAttribute('data-status') || '';
                bValue = b.getAttribute('data-status') || '';
            } else if (column === 'date') {
                aValue = a.getAttribute('data-date') || '';
                bValue = b.getAttribute('data-date') || '';
            }
            
            return direction === 'asc' 
                ? aValue.localeCompare(bValue)
                : bValue.localeCompare(aValue);
        });
        
        const emptyRow = tbody.querySelector('tr:not([data-name])');
        tbody.innerHTML = '';
        visibleRows.forEach(row => tbody.appendChild(row));
        if (emptyRow && visibleRows.length === 0) {
            tbody.appendChild(emptyRow);
        }
    }

    // Search and filter
    function filterContacts() {
        const searchTerm = searchInput?.value.toLowerCase().trim() || '';
        const statusValue = statusFilter?.value || '';
        let visibleCount = 0;
        
        const noResultsRow = tbody.querySelector('.no-results-row');
        if (noResultsRow) {
            noResultsRow.remove();
        }
        
        allRows.forEach(row => {
            if (!row.hasAttribute('data-name')) return;
            
            const name = row.getAttribute('data-name') || '';
            const email = row.getAttribute('data-email') || '';
            const subject = row.getAttribute('data-subject') || '';
            const status = row.getAttribute('data-status') || '';
            
            const matchesSearch = searchTerm === '' || 
                                name.includes(searchTerm) || 
                                email.includes(searchTerm) || 
                                subject.includes(searchTerm);
            
            const matchesStatus = statusValue === '' || status === statusValue;
            
            if (matchesSearch && matchesStatus) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        
        if (showingCount) {
            showingCount.textContent = visibleCount;
        }
        
        if (visibleCount === 0 && (searchTerm !== '' || statusValue !== '')) {
            const newNoResultsRow = document.createElement('tr');
            newNoResultsRow.className = 'no-results-row';
            newNoResultsRow.innerHTML = `
                <td colspan="6" class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center justify-center">
                        <i class="fas fa-search text-gray-300 text-5xl mb-4"></i>
                        <p class="text-gray-500 text-lg font-medium">No results found</p>
                        <p class="text-gray-400 text-sm mt-1">Try adjusting your search terms or filters</p>
                    </div>
                </td>
            `;
            tbody.appendChild(newNoResultsRow);
        }
        
        updateBulkButton();
    }

    searchInput?.addEventListener('input', filterContacts);
    statusFilter?.addEventListener('change', filterContacts);

    // Functions
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
                location.reload(); // Reload to update the UI
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
                    
                    const row = document.querySelector(`button[onclick*="${contactId}"]`).closest('tr');
                    if (row) {
                        row.style.opacity = '0';
                        row.style.transform = 'translateX(20px)';
                        row.style.transition = 'all 0.3s ease-out';
                        
                        setTimeout(() => {
                            row.remove();
                            allRows = allRows.filter(r => r !== row);
                            
                            const remainingRows = tbody.querySelectorAll('tr[data-name]');
                            
                            if (remainingRows.length === 0) {
                                tbody.innerHTML = `
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <i class="fas fa-inbox text-gray-300 text-5xl mb-4"></i>
                                                <p class="text-gray-500 text-lg font-medium">No contact messages found</p>
                                                <p class="text-gray-400 text-sm mt-1">Contact messages will appear here when submitted</p>
                                            </div>
                                        </td>
                                    </tr>
                                `;
                            }
                            
                            if (showingCount) {
                                showingCount.textContent = remainingRows.length;
                            }
                        }, 300);
                    }
                } else {
                    showToast(data.message || 'Failed to delete contact message', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('An error occurred while deleting the contact message', 'error');
            }
        }
    }

    async function bulkAction(action) {
        const checkedBoxes = document.querySelectorAll('.contact-checkbox:checked');
        const ids = Array.from(checkedBoxes).map(cb => cb.value);
        
        if (ids.length === 0) return;
        
        let confirmMessage = '';
        switch (action) {
            case 'mark_read':
                confirmMessage = `Mark ${ids.length} message(s) as read?`;
                break;
            case 'mark_unread':
                confirmMessage = `Mark ${ids.length} message(s) as unread?`;
                break;
            case 'delete':
                confirmMessage = `Delete ${ids.length} message(s)? This action cannot be undone.`;
                break;
        }
        
        const confirmed = await showConfirmDialog({
            title: 'Bulk Action',
            message: confirmMessage,
            confirmText: 'Yes, Continue',
            cancelText: 'Cancel',
            type: action === 'delete' ? 'danger' : 'warning'
        });
        
        if (confirmed) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            
            try {
                const response = await fetch('{{ route('admin.contacts.bulk-action') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken ? csrfToken.content : '',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        action: action,
                        ids: ids
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showToast(data.message, 'success');
                    location.reload(); // Reload to update the UI
                } else {
                    showToast(data.message || 'Bulk action failed', 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showToast('An error occurred during bulk action', 'error');
            }
        }
        
        closeBulkModal();
    }

    function closeBulkModal() {
        document.getElementById('bulkModal').classList.add('hidden');
    }

    // Make functions global
    window.toggleRead = toggleRead;
    window.handleDelete = handleDelete;
    window.bulkAction = bulkAction;
    window.closeBulkModal = closeBulkModal;
});
</script>
@endsection