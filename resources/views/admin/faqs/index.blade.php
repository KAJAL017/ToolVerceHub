@extends('admin.layouts.app')

@section('title', 'FAQs')
@section('page-title', 'FAQs')
@section('page-subtitle', 'Manage frequently asked questions')

@section('content')

<div class="mb-6 flex justify-between items-center">
    <div>
        <p class="text-gray-600">Total FAQs: <span class="font-bold text-primary-600">{{ $faqs->count() }}</span></p>
    </div>
    <a href="{{ route('admin.faqs.create') }}" class="btn bg-primary-600 hover:bg-primary-700 text-white px-6 py-2.5 rounded-lg font-semibold transition-colors">
        <i class="fas fa-plus mr-2"></i>Add New FAQ
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Question</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($faqs as $faq)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-900">{{ Str::limit($faq->question, 80) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold
                            @if($faq->category == 'general') bg-gray-100 text-gray-800
                            @elseif($faq->category == 'tools') bg-green-100 text-green-800
                            @elseif($faq->category == 'games') bg-blue-100 text-blue-800
                            @else bg-amber-100 text-amber-800
                            @endif">
                            {{ ucfirst($faq->category) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $faq->display_order }}
                    </td>
                    <td class="px-6 py-4">
                        @if($faq->is_active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i> Active
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-800">
                                <i class="fas fa-times-circle mr-1"></i> Inactive
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-primary-600 hover:text-primary-800 transition-colors" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteFaq({{ $faq->id }})" class="text-red-600 hover:text-red-800 transition-colors" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="text-gray-400 text-4xl mb-3">❓</div>
                        <p class="text-gray-500 font-medium">No FAQs found</p>
                        <a href="{{ route('admin.faqs.create') }}" class="text-primary-600 hover:text-primary-700 font-semibold mt-2 inline-block">
                            Create your first FAQ
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Showing <span class="font-semibold text-gray-900">{{ $faqs->count() }}</span> of <span class="font-semibold text-gray-900">{{ $faqs->total() }}</span> FAQs
            </div>
            <div>
                {{ $faqs->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function deleteFaq(id) {
    showConfirmDialog({
        title: 'Delete FAQ',
        message: 'Are you sure you want to delete this FAQ? This action cannot be undone.',
        confirmText: 'Delete',
        type: 'danger'
    }).then(confirmed => {
        if (confirmed) {
            fetch(`/admin/faqs/${id}`, {
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
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred while deleting the FAQ', 'error');
            });
        }
    });
}
</script>
@endsection
