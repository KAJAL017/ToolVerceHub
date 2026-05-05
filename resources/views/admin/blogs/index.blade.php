@extends('admin.layouts.app')

@section('title', 'Blogs')
@section('page-title', 'Blog Management')
@section('page-subtitle', 'Manage all blog posts')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    
    <div class="p-6 border-b border-gray-200">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h3 class="text-lg font-bold text-gray-800">All Blogs</h3>
                <p class="text-sm text-gray-500 mt-1">Manage your blog posts</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input 
                        type="text" 
                        id="searchInput" 
                        placeholder="Search blogs..." 
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 w-64"
                    >
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Create New
                </a>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full" id="blogsTable">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="title">
                        <div class="flex items-center gap-2">
                            <span>Title</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="category">
                        <div class="flex items-center gap-2">
                            <span>Category</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors" data-sort="author">
                        <div class="flex items-center gap-2">
                            <span>Author</span>
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
                            <span>Published</span>
                            <i class="fas fa-sort text-gray-400"></i>
                        </div>
                    </th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($blogs as $blog)
                <tr class="hover:bg-gray-50 transition-colors" 
                    data-title="{{ strtolower($blog->title) }}" 
                    data-category="{{ strtolower($blog->category->name ?? 'uncategorized') }}" 
                    data-author="{{ strtolower($blog->author_name) }}"
                    data-status="{{ strtolower($blog->status) }}"
                    data-date="{{ $blog->published_date->format('Y-m-d') }}">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($blog->featured_icon)
                                <span class="text-3xl mr-3">{{ $blog->featured_icon }}</span>
                            @elseif($blog->featured_image)
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="w-12 h-12 rounded-lg object-cover mr-3">
                            @elseif($blog->featured_image_emoji)
                                <span class="text-2xl mr-3">{{ $blog->featured_image_emoji }}</span>
                            @else
                                <div class="w-12 h-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-blog text-white"></i>
                                </div>
                            @endif
                            <div>
                                <div class="text-sm font-semibold text-gray-900">{{ Str::limit($blog->title, 50) }}</div>
                                <code class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded">{{ $blog->slug }}</code>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($blog->category)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-primary-100 text-primary-800">
                                {{ $blog->category->name }}
                            </span>
                        @else
                            <span class="text-gray-400 text-sm">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $blog->author_name }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                            {{ $blog->status == 'published' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $blog->status == 'draft' ? 'bg-gray-100 text-gray-800' : '' }}
                            {{ $blog->status == 'archived' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-600">{{ $blog->published_date->format('M d, Y') }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" 
                               class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" 
                               title="Edit">
                                <i class="fas fa-edit text-sm"></i>
                            </a>
                            <button type="button" 
                                    onclick="handleDelete({{ $blog->id }}, '{{ addslashes($blog->title) }}')"
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
                            <i class="fas fa-blog text-gray-300 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No blogs found</p>
                            <p class="text-gray-400 text-sm mt-1 mb-4">Create your first blog post to get started</p>
                            <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                                <i class="fas fa-plus mr-2"></i>
                                Create Blog
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
                Showing <span id="showingCount" class="font-semibold text-gray-900">{{ $blogs->count() }}</span> of <span id="totalCount" class="font-semibold text-gray-900">{{ $blogs->total() }}</span> blogs
            </div>
            @if($blogs->hasPages())
                <div>
                    {{ $blogs->links() }}
                </div>
            @endif
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

    const table = document.getElementById('blogsTable');
    if (!table) return;
    
    const tbody = table.querySelector('tbody');
    const searchInput = document.getElementById('searchInput');
    const showingCount = document.getElementById('showingCount');
    const sortHeaders = table.querySelectorAll('th[data-sort]');
    
    let sortDirection = {};
    let allRows = Array.from(tbody.querySelectorAll('tr[data-title]'));
    const totalOnPage = allRows.length;

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
        const visibleRows = Array.from(tbody.querySelectorAll('tr[data-title]:not([style*="display: none"])'));
        
        visibleRows.sort((a, b) => {
            let aValue, bValue;
            
            if (column === 'title') {
                aValue = a.getAttribute('data-title') || '';
                bValue = b.getAttribute('data-title') || '';
            } else if (column === 'category') {
                aValue = a.getAttribute('data-category') || '';
                bValue = b.getAttribute('data-category') || '';
            } else if (column === 'author') {
                aValue = a.getAttribute('data-author') || '';
                bValue = b.getAttribute('data-author') || '';
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
        
        const emptyRow = tbody.querySelector('tr:not([data-title])');
        tbody.innerHTML = '';
        visibleRows.forEach(row => tbody.appendChild(row));
        if (emptyRow && visibleRows.length === 0) {
            tbody.appendChild(emptyRow);
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            let visibleCount = 0;
            
            const noResultsRow = tbody.querySelector('.no-results-row');
            if (noResultsRow) {
                noResultsRow.remove();
            }
            
            allRows.forEach(row => {
                if (!row.hasAttribute('data-title')) return;
                
                const title = row.getAttribute('data-title') || '';
                const category = row.getAttribute('data-category') || '';
                const author = row.getAttribute('data-author') || '';
                const status = row.getAttribute('data-status') || '';
                
                const matches = title.includes(searchTerm) || 
                              category.includes(searchTerm) || 
                              author.includes(searchTerm) ||
                              status.includes(searchTerm);
                
                if (matches || searchTerm === '') {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            if (showingCount) {
                showingCount.textContent = visibleCount;
            }
            
            if (visibleCount === 0 && searchTerm !== '') {
                const newNoResultsRow = document.createElement('tr');
                newNoResultsRow.className = 'no-results-row';
                newNoResultsRow.innerHTML = `
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-search text-gray-300 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg font-medium">No results found</p>
                            <p class="text-gray-400 text-sm mt-1">Try adjusting your search terms</p>
                        </div>
                    </td>
                `;
                tbody.appendChild(newNoResultsRow);
            }
        });
    }

    async function handleDelete(blogId, blogTitle) {
        const confirmed = await showConfirmDialog({
            title: 'Delete Blog',
            message: `Are you sure you want to delete "${blogTitle}"? This action cannot be undone.`,
            confirmText: 'Yes, Delete',
            cancelText: 'Cancel',
            type: 'danger'
        });

        if (confirmed) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            
            fetch(`{{ url('admin/blogs') }}/${blogId}`, {
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
                    showToast(data.message || 'Blog deleted successfully!', 'success');
                    
                    const row = document.querySelector(`button[onclick*="${blogId}"]`).closest('tr');
                    if (row) {
                        row.style.opacity = '0';
                        row.style.transform = 'translateX(20px)';
                        row.style.transition = 'all 0.3s ease-out';
                        
                        setTimeout(() => {
                            row.remove();
                            allRows = allRows.filter(r => r !== row);
                            
                            const remainingRows = tbody.querySelectorAll('tr[data-title]');
                            
                            if (remainingRows.length === 0) {
                                tbody.innerHTML = `
                                    <tr>
                                        <td colspan="6" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <i class="fas fa-blog text-gray-300 text-5xl mb-4"></i>
                                                <p class="text-gray-500 text-lg font-medium">No blogs found</p>
                                                <p class="text-gray-400 text-sm mt-1 mb-4">Create your first blog post to get started</p>
                                                <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                                                    <i class="fas fa-plus mr-2"></i>
                                                    Create Blog
                                                </a>
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
                    showToast(data.message || 'Failed to delete blog', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred while deleting the blog', 'error');
            });
        }
    }

    window.handleDelete = handleDelete;
});
</script>
@endsection
