@extends('admin.layouts.app')

@section('title', 'Tool Tags')
@section('page-title', 'Tool Tags')
@section('page-subtitle', 'Manage tool tags')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="p-6 border-b border-gray-200">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-800">All Tool Tags</h3>
                <p class="text-sm text-gray-500 mt-1">Manage your tool tags</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input 
                        type="text" 
                        id="searchInput" 
                        placeholder="Search tags..." 
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 w-64"
                    >
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <a href="{{ route('admin.tool-tags.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Create New
                </a>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full" id="tagsTable">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="name">
                        <div class="flex items-center gap-2">
                            <span>Name</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="slug">
                        <div class="flex items-center gap-2">
                            <span>Slug</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="tools_count">
                        <div class="flex items-center justify-center gap-2">
                            <span>Tools</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <div class="flex items-center justify-center gap-2">
                            <i class="fas fa-star text-yellow-500"></i>
                            <span>Featured</span>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($tags as $tag)
                <tr class="hover:bg-gray-50 transition-colors" data-name="{{ strtolower($tag->name) }}" data-slug="{{ strtolower($tag->slug) }}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-sm">{{ strtoupper(substr($tag->name, 0, 2)) }}</span>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-semibold text-gray-900">{{ $tag->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <code class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-xs font-mono">{{ $tag->slug }}</code>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-primary-100 text-primary-800">
                            <i class="fas fa-tools mr-1"></i>
                            {{ $tag->tools_count }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" 
                                   class="sr-only peer featured-toggle" 
                                   data-tag-id="{{ $tag->id }}"
                                   {{ $tag->is_featured ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-yellow-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-500"></div>
                        </label>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.tool-tags.edit', $tag) }}" 
                               class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" 
                               title="Edit">
                                <i class="fas fa-edit text-sm"></i>
                            </a>
                            <button type="button" 
                                    onclick="handleDelete({{ $tag->id }}, '{{ $tag->name }}')"
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" 
                                    title="Delete">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-tags text-gray-300 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No tags found</p>
                            <p class="text-gray-400 text-sm mt-1 mb-4">Create your first tag to organize your tools</p>
                            <a href="{{ route('admin.tool-tags.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>
                                Create Tag
                            </a>
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
                Showing <span id="showingCount" class="font-semibold text-gray-900">{{ $tags->count() }}</span> of <span class="font-semibold text-gray-900">{{ $tags->total() }}</span> tags
            </div>
            <div>
                {{ $tags->links() }}
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const successMessage = urlParams.get('success');
    const errorMessage = urlParams.get('error');
    
    if (successMessage) {
        showToast(decodeURIComponent(successMessage), 'success');
        window.history.replaceState({}, document.title, window.location.pathname);
    }
    
    if (errorMessage) {
        showToast(decodeURIComponent(errorMessage), 'error');
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    @if(session('success'))
        showToast('{{ session('success') }}', 'success');
    @endif

    @if(session('error'))
        showToast('{{ session('error') }}', 'error');
    @endif

    const table = document.getElementById('tagsTable');
    const tbody = table.querySelector('tbody');
    const searchInput = document.getElementById('searchInput');
    const showingCount = document.getElementById('showingCount');
    const sortHeaders = table.querySelectorAll('th[data-sort]');
    
    let sortDirection = {};
    let allRows = Array.from(tbody.querySelectorAll('tr'));
    const totalCount = allRows.length;

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
        const visibleRows = Array.from(tbody.querySelectorAll('tr:not([style*="display: none"])'));
        
        visibleRows.sort((a, b) => {
            let aValue, bValue;
            
            if (column === 'name') {
                aValue = a.getAttribute('data-name');
                bValue = b.getAttribute('data-name');
            } else if (column === 'slug') {
                aValue = a.getAttribute('data-slug');
                bValue = b.getAttribute('data-slug');
            } else if (column === 'tools_count') {
                aValue = parseInt(a.querySelector('td:nth-child(3) span').textContent.trim());
                bValue = parseInt(b.querySelector('td:nth-child(3) span').textContent.trim());
            }
            
            if (typeof aValue === 'string') {
                return direction === 'asc' 
                    ? aValue.localeCompare(bValue)
                    : bValue.localeCompare(aValue);
            } else {
                return direction === 'asc' 
                    ? aValue - bValue
                    : bValue - aValue;
            }
        });
        
        visibleRows.forEach(row => tbody.appendChild(row));
    }

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        let visibleCount = 0;
        
        allRows.forEach(row => {
            const name = row.getAttribute('data-name') || '';
            const slug = row.getAttribute('data-slug') || '';
            
            const matches = name.includes(searchTerm) || 
                          slug.includes(searchTerm);
            
            if (matches || searchTerm === '') {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        
        showingCount.textContent = visibleCount;
        
        if (visibleCount === 0 && searchTerm !== '') {
            if (!tbody.querySelector('.no-results-row')) {
                const noResultsRow = document.createElement('tr');
                noResultsRow.className = 'no-results-row';
                noResultsRow.innerHTML = `
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-search text-gray-300 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No results found</p>
                            <p class="text-gray-400 text-sm mt-1">Try adjusting your search terms</p>
                        </div>
                    </td>
                `;
                tbody.appendChild(noResultsRow);
            }
        } else {
            const noResultsRow = tbody.querySelector('.no-results-row');
            if (noResultsRow) {
                noResultsRow.remove();
            }
        }
    });

    async function handleDelete(tagId, tagName) {
        const confirmed = await showConfirmDialog({
            title: 'Delete Tool Tag',
            message: `Are you sure you want to delete "${tagName}"? This will unlink all tools from this tag.`,
            confirmText: 'Yes, Delete',
            cancelText: 'Cancel',
            type: 'danger'
        });

        if (confirmed) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            
            fetch(`{{ url('admin/tool-tags') }}/${tagId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken ? csrfToken.content : '',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message || 'Tag deleted successfully!', 'success');
                    
                    const row = document.querySelector(`button[onclick*="${tagId}"]`).closest('tr');
                    if (row) {
                        row.style.opacity = '0';
                        row.style.transform = 'translateX(20px)';
                        row.style.transition = 'all 0.3s ease-out';
                        
                        setTimeout(() => {
                            row.remove();
                            
                            const tbody = document.querySelector('#tagsTable tbody');
                            const remainingRows = tbody.querySelectorAll('tr:not(.no-results-row)');
                            
                            if (remainingRows.length === 0) {
                                tbody.innerHTML = `
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <i class="fas fa-tags text-gray-300 text-5xl mb-4"></i>
                                                <p class="text-gray-500 text-lg font-medium">No tags found</p>
                                                <p class="text-gray-400 text-sm mt-1 mb-4">Create your first tag to organize your tools</p>
                                                <a href="{{ route('admin.tool-tags.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                                                    <i class="fas fa-plus mr-2"></i>
                                                    Create Tag
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                `;
                            }
                            
                            const showingCount = document.getElementById('showingCount');
                            if (showingCount) {
                                showingCount.textContent = remainingRows.length;
                            }
                        }, 300);
                    }
                } else {
                    showToast(data.message || 'Failed to delete tag', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred while deleting the tag', 'error');
            });
        }
    }

    window.handleDelete = handleDelete;

    // Featured toggle functionality
    const featuredToggles = document.querySelectorAll('.featured-toggle');
    
    featuredToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const tagId = this.getAttribute('data-tag-id');
            const isChecked = this.checked;
            
            // Disable toggle during request
            this.disabled = true;
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            
            fetch(`{{ url('admin/tool-tags') }}/${tagId}/toggle-featured`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken ? csrfToken.content : '',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    this.disabled = false;
                } else {
                    // Revert toggle on error
                    this.checked = !isChecked;
                    this.disabled = false;
                    showToast(data.message || 'Failed to update featured status', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Revert toggle on error
                this.checked = !isChecked;
                this.disabled = false;
                showToast('An error occurred while updating featured status', 'error');
            });
        });
    });
});
</script>
@endsection
