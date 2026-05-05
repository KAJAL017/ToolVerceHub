@extends('admin.layouts.app')

@section('title', 'Tools')
@section('page-title', 'Tools')
@section('page-subtitle', 'Manage all tools')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="p-6 border-b border-gray-200">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-800">All Tools</h3>
                <p class="text-sm text-gray-500 mt-1">Manage your tools and platforms</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input 
                        type="text" 
                        id="searchInput" 
                        placeholder="Search tools..." 
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 w-64"
                    >
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <a href="{{ route('admin.tools.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Create New
                </a>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full" id="toolsTable">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="name">
                        <div class="flex items-center gap-2">
                            <span>Tool</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="category">
                        <div class="flex items-center gap-2">
                            <span>Category</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Description
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        URL
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
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
                @forelse($tools as $tool)
                <tr class="hover:bg-gray-50 transition-colors" data-name="{{ strtolower($tool->name) }}" data-category="{{ strtolower($tool->category->name ?? '') }}" data-description="{{ strtolower($tool->description ?? '') }}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br 
                                @if($tool->color == 'g') from-green-400 to-green-600
                                @elseif($tool->color == 'c') from-orange-400 to-orange-600
                                @elseif($tool->color == 'b') from-blue-400 to-blue-600
                                @else from-amber-400 to-amber-600
                                @endif
                                rounded-lg flex items-center justify-center text-2xl">
                                {{ $tool->icon ?? '🔧' }}
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-semibold text-gray-900">{{ $tool->name }}</div>
                                @if($tool->tool_count)
                                    <div class="text-xs text-gray-500">{{ $tool->tool_count }} tools</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($tool->category)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                @if($tool->category->color == 'g') bg-green-100 text-green-800
                                @elseif($tool->category->color == 'c') bg-orange-100 text-orange-800
                                @elseif($tool->category->color == 'b') bg-blue-100 text-blue-800
                                @else bg-amber-100 text-amber-800
                                @endif">
                                {{ $tool->category->name }}
                            </span>
                        @else
                            <span class="text-sm text-gray-400">No category</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-600 max-w-xs truncate">
                            {{ $tool->description ?? '—' }}
                        </div>
                        @if($tool->tags && count($tool->tags) > 0)
                            <div class="flex flex-wrap gap-1 mt-1">
                                @foreach(array_slice($tool->tags, 0, 3) as $tag)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-700">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                                @if(count($tool->tags) > 3)
                                    <span class="text-xs text-gray-400">+{{ count($tool->tags) - 3 }}</span>
                                @endif
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($tool->url)
                            <a href="{{ $tool->url }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm flex items-center gap-1">
                                <i class="fas fa-external-link-alt"></i>
                                <span>Visit</span>
                            </a>
                        @else
                            <span class="text-gray-400 text-sm">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex flex-col items-center gap-1">
                            @if($tool->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                    Inactive
                                </span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" 
                                   class="sr-only peer featured-toggle" 
                                   data-tool-id="{{ $tool->id }}"
                                   {{ $tool->is_featured ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-yellow-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-500"></div>
                        </label>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.tools.edit', $tool) }}" 
                               class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" 
                               title="Edit">
                                <i class="fas fa-edit text-sm"></i>
                            </a>
                            <button type="button" 
                                    onclick="handleDelete({{ $tool->id }}, '{{ $tool->name }}')"
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" 
                                    title="Delete">
                                <i class="fas fa-trash text-sm"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-tools text-gray-300 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No tools found</p>
                            <p class="text-gray-400 text-sm mt-1 mb-4">Create your first tool to get started</p>
                            <a href="{{ route('admin.tools.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>
                                Create Tool
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50" id="paginationSection">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Showing <span id="showingCount" class="font-semibold text-gray-900">{{ $tools->count() }}</span> of <span id="totalCount" class="font-semibold text-gray-900">{{ $tools->total() }}</span> tools
            </div>
            <div>
                {{ $tools->links() }}
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

    const table = document.getElementById('toolsTable');
    const tbody = table.querySelector('tbody');
    const searchInput = document.getElementById('searchInput');
    const showingCount = document.getElementById('showingCount');
    const totalCount = document.getElementById('totalCount');
    const paginationSection = document.getElementById('paginationSection');
    const sortHeaders = table.querySelectorAll('th[data-sort]');
    
    // All tools data from server for cross-page search
    const allToolsData = @json($allTools);
    
    let sortDirection = {};
    let allRows = Array.from(tbody.querySelectorAll('tr'));

    sortHeaders.forEach(header => {
        const column = header.getAttribute('data-sort');
        sortDirection[column] = 'asc';
        
        header.addEventListener('click', function() {
            const currentDirection = sortDirection[column];
            const newDirection = currentDirection === 'asc' ? 'desc' : 'asc';
            sortDirection[column] = newDirection;
            
            sortHeaders.forEach(h => {
                const icon = h.querySelector('i');
                if (icon) icon.className = 'fas fa-sort text-gray-400';
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
            } else if (column === 'category') {
                aValue = a.getAttribute('data-category');
                bValue = b.getAttribute('data-category');
            }
            
            if (typeof aValue === 'string') {
                return direction === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
            } else {
                return direction === 'asc' ? aValue - bValue : bValue - aValue;
            }
        });
        
        visibleRows.forEach(row => tbody.appendChild(row));
    }

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        let visibleCount = 0;
        let matchedToolIds = [];
        
        console.log('Searching for:', searchTerm);
        
        if (searchTerm !== '') {
            // Search in ALL tools data (cross-page search)
            matchedToolIds = allToolsData
                .filter(tool => {
                    return tool.name.includes(searchTerm) || 
                           tool.category.includes(searchTerm) || 
                           tool.description.includes(searchTerm);
                })
                .map(tool => tool.id);
            
            console.log('Matched tool IDs:', matchedToolIds);
            
            // If matches found but not on current page, load them via AJAX
            if (matchedToolIds.length > 0) {
                loadMatchedTools(matchedToolIds, searchTerm);
                return; // Exit here, loadMatchedTools will handle display
            }
        }
        
        // Get all rows on current page
        const allTableRows = tbody.querySelectorAll('tr');
        
        allTableRows.forEach(row => {
            // Skip empty state row
            if (row.querySelector('td[colspan]')) {
                return;
            }
            
            if (searchTerm === '') {
                // Show all rows when search is empty
                row.style.display = '';
                visibleCount++;
            } else {
                // Check if this row's tool is in matched IDs
                const name = (row.getAttribute('data-name') || '').toLowerCase();
                const category = (row.getAttribute('data-category') || '').toLowerCase();
                const description = (row.getAttribute('data-description') || '').toLowerCase();
                
                const matches = name.includes(searchTerm) || 
                              category.includes(searchTerm) || 
                              description.includes(searchTerm);
                
                if (matches) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            }
        });
        
        console.log('Visible count on current page:', visibleCount);
        
        // Update showing count
        if (showingCount) {
            showingCount.textContent = searchTerm === '' ? '{{ $tools->count() }}' : visibleCount;
        }
        
        // Update total count text when searching
        if (totalCount) {
            if (searchTerm !== '') {
                totalCount.textContent = visibleCount;
            } else {
                totalCount.textContent = '{{ $tools->total() }}';
            }
        }
        
        // Hide/show pagination based on search
        if (paginationSection) {
            if (searchTerm !== '') {
                paginationSection.style.display = 'none';
            } else {
                paginationSection.style.display = '';
            }
        }
        
        // Show "no results" message if no matches
        const noResultsRow = tbody.querySelector('.no-results-row');
        if (visibleCount === 0 && searchTerm !== '') {
            if (!noResultsRow) {
                const tr = document.createElement('tr');
                tr.className = 'no-results-row';
                tr.innerHTML = `
                    <td colspan="7" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-search text-gray-300 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No tools found for "${searchTerm}"</p>
                            <p class="text-gray-400 text-sm mt-1">Try adjusting your search terms</p>
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
            }
        } else if (noResultsRow) {
            noResultsRow.remove();
        }
    });
    
    // Function to load matched tools via AJAX
    async function loadMatchedTools(toolIds, searchTerm) {
        console.log('Loading tools:', toolIds);
        
        // Show loading state
        tbody.innerHTML = `
            <tr>
                <td colspan="7" class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center justify-center">
                        <i class="fas fa-spinner fa-spin text-primary-600 text-5xl mb-4"></i>
                        <p class="text-gray-500 text-lg font-medium">Searching across all pages...</p>
                    </div>
                </td>
            </tr>
        `;
        
        try {
            const response = await fetch(`{{ route('admin.tools.index') }}?search=${encodeURIComponent(searchTerm)}&all=1`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });
            
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            
            const data = await response.json();
            
            // Clear tbody
            tbody.innerHTML = '';
            
            if (data.tools && data.tools.length > 0) {
                // Render matched tools
                data.tools.forEach(tool => {
                    const row = createToolRow(tool);
                    tbody.appendChild(row);
                });
                
                // Update counts
                if (showingCount) showingCount.textContent = data.tools.length;
                if (totalCount) totalCount.textContent = data.tools.length;
                
                // Hide pagination
                if (paginationSection) paginationSection.style.display = 'none';
                
                // Re-attach event listeners for featured toggles
                attachFeaturedToggles();
            } else {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-search text-gray-300 text-5xl mb-4"></i>
                                <p class="text-gray-500 text-lg font-medium">No tools found for "${searchTerm}"</p>
                            </div>
                        </td>
                    </tr>
                `;
            }
        } catch (error) {
            console.error('Error loading tools:', error);
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-red-500 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">Error loading search results</p>
                            <p class="text-gray-400 text-sm mt-1">Please try again</p>
                        </div>
                    </td>
                </tr>
            `;
        }
    }
    
    // Function to create tool row HTML
    function createToolRow(tool) {
        const tr = document.createElement('tr');
        tr.className = 'hover:bg-gray-50 transition-colors';
        tr.setAttribute('data-name', tool.name.toLowerCase());
        tr.setAttribute('data-category', (tool.category?.name || '').toLowerCase());
        tr.setAttribute('data-description', (tool.description || '').toLowerCase());
        
        const colorClasses = {
            'g': 'from-green-400 to-green-600',
            'c': 'from-orange-400 to-orange-600',
            'b': 'from-blue-400 to-blue-600',
            'a': 'from-amber-400 to-amber-600'
        };
        
        const categoryColorClasses = {
            'g': 'bg-green-100 text-green-800',
            'c': 'bg-orange-100 text-orange-800',
            'b': 'bg-blue-100 text-blue-800',
            'a': 'bg-amber-100 text-amber-800'
        };
        
        tr.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br ${colorClasses[tool.color] || colorClasses['g']} rounded-lg flex items-center justify-center text-2xl">
                        ${tool.icon || '🔧'}
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-semibold text-gray-900">${tool.name}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                ${tool.category ? `<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold ${categoryColorClasses[tool.category.color] || categoryColorClasses['g']}">${tool.category.name}</span>` : '<span class="text-sm text-gray-400">No category</span>'}
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-600 max-w-xs truncate">${tool.description || '—'}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                ${tool.url ? `<a href="${tool.url}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm flex items-center gap-1"><i class="fas fa-external-link-alt"></i><span>Visit</span></a>` : '<span class="text-gray-400 text-sm">—</span>'}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold ${tool.is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'}">
                    ${tool.is_active ? 'Active' : 'Inactive'}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer featured-toggle" data-tool-id="${tool.id}" ${tool.is_featured ? 'checked' : ''}>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-yellow-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-500"></div>
                </label>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="flex items-center justify-center gap-2">
                    <a href="/admin/tools/${tool.id}/edit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Edit">
                        <i class="fas fa-edit text-sm"></i>
                    </a>
                    <button type="button" onclick="handleDelete(${tool.id}, '${tool.name}')" class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" title="Delete">
                        <i class="fas fa-trash text-sm"></i>
                    </button>
                </div>
            </td>
        `;
        
        return tr;
    }
    
    // Function to attach featured toggle event listeners
    function attachFeaturedToggles() {
        const featuredToggles = document.querySelectorAll('.featured-toggle');
        
        featuredToggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const toolId = this.getAttribute('data-tool-id');
                const isChecked = this.checked;
                
                this.disabled = true;
                
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                
                fetch(`{{ url('admin/tools') }}/${toolId}/toggle-featured`, {
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
                        this.checked = !isChecked;
                        this.disabled = false;
                        showToast(data.message || 'Failed to update featured status', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.checked = !isChecked;
                    this.disabled = false;
                    showToast('An error occurred while updating featured status', 'error');
                });
            });
        });
    }

    async function handleDelete(toolId, toolName) {
        const confirmed = await showConfirmDialog({
            title: 'Delete Tool',
            message: `Are you sure you want to delete "${toolName}"?`,
            confirmText: 'Yes, Delete',
            cancelText: 'Cancel',
            type: 'danger'
        });

        if (confirmed) {
            fetch(`{{ url('admin/tools') }}/${toolId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast(data.message, 'success');
                    setTimeout(() => location.reload(), 1000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred while deleting the tool', 'error');
            });
        }
    }

    window.handleDelete = handleDelete;

    // Featured toggle functionality
    const featuredToggles = document.querySelectorAll('.featured-toggle');
    
    featuredToggles.forEach(toggle => {
        toggle.addEventListener('change', function() {
            const toolId = this.getAttribute('data-tool-id');
            const isChecked = this.checked;
            
            // Disable toggle during request
            this.disabled = true;
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            
            fetch(`{{ url('admin/tools') }}/${toolId}/toggle-featured`, {
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
