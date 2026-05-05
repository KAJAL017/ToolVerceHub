@extends('admin.layouts.app')

@section('title', 'Edit Blog')
@section('page-title', 'Edit Blog')
@section('page-subtitle', 'Update blog post')

@section('content')

<div class="mb-4 flex justify-end">
    <button type="button" id="fillDemoBtn" class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
        <i class="fas fa-magic mr-2"></i>
        Fill Demo Data
    </button>
</div>

<form id="blogEditForm" action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        
                <div class="lg:col-span-2 space-y-6">
            
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                    Basic Information
                </h3>
                
                                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title', $blog->title) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 @error('title') border-red-500 @enderror"
                        placeholder="Enter blog title">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Slug <span class="text-gray-500 text-xs">(Leave empty to auto-generate)</span>
                    </label>
                    <input type="text" name="slug" value="{{ old('slug', $blog->slug) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 @error('slug') border-red-500 @enderror"
                        placeholder="blog-post-url">
                    @error('slug')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                    <select name="category_id" id="categorySelect" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Featured Image or Icon</label>
                    <p class="text-xs text-gray-500 mb-3">Choose either an image OR an icon/emoji (not both)</p>
                    
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Upload Image</label>
                            @if($blog->featured_image)
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="Featured" class="w-full h-32 object-cover rounded-lg mb-2">
                            @endif
                            <input type="file" name="featured_image" id="featuredImageInput" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        </div>
                        
                        <div class="text-center text-gray-400 text-sm">OR</div>
                        
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Choose Icon/Emoji</label>
                            @if($blog->featured_icon)
                                <div class="mb-2 text-4xl">{{ $blog->featured_icon }}</div>
                            @endif
                            <select name="featured_icon" id="featuredIconInput" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                                <option value="">Select an icon...</option>
                                @foreach($icons as $icon)
                                    <option value="{{ $icon->icon }}" {{ old('featured_icon', $blog->featured_icon) == $icon->icon ? 'selected' : '' }}>
                                        {{ $icon->icon }} {{ $icon->name }} ({{ $icon->category }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center">
                        <i class="fas fa-search text-primary-600 mr-2"></i>
                        SEO & Meta Information
                    </h3>
                    <button type="button" id="autoFillSeoBtn" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold rounded-lg transition-colors">
                        <i class="fas fa-magic mr-2"></i>Auto-Fill SEO
                    </button>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" id="metaTitle" value="{{ old('meta_title', $blog->meta_title) }}" maxlength="60"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="SEO title (max 60 chars)">
                    <p class="text-xs text-gray-500 mt-1">Leave empty to use blog title</p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" id="metaDescription" rows="3" maxlength="160"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="SEO description (max 160 chars)">{{ old('meta_description', $blog->meta_description) }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">SEO Keywords</label>
                    <input type="text" name="seo_keywords" id="seoKeywords" value="{{ old('seo_keywords', $blog->seo_keywords) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="keyword1, keyword2, keyword3">
                </div>
            </div>
            
        </div>
        
        <div class="space-y-6">
            
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-calendar text-primary-600 mr-2"></i>
                    Publishing
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="draft" {{ old('status', $blog->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $blog->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status', $blog->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Published Date <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="published_date" value="{{ old('published_date', $blog->published_date ? $blog->published_date->format('Y-m-d') : date('Y-m-d')) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Read Time (minutes) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="read_time" value="{{ old('read_time', $blog->read_time) }}" min="1" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
            </div>
            
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-star text-primary-600 mr-2"></i>
                    Features
                </h3>
                
                <div class="space-y-3">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }}
                            class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <span class="ml-2 text-sm font-medium text-gray-700">Featured on Homepage</span>
                    </label>
                    
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_beginner_friendly" value="1" {{ old('is_beginner_friendly', $blog->is_beginner_friendly) ? 'checked' : '' }}
                            class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <span class="ml-2 text-sm font-medium text-gray-700">Beginner Friendly</span>
                    </label>
                </div>
            </div>
            
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="space-y-3">
                    <button type="submit" id="submitBtn" class="w-full px-4 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-lg transition-colors">
                        <i class="fas fa-save mr-2"></i>
                        <span id="btnText">Update Blog</span>
                    </button>
                    </button>
                    
                    <a href="{{ route('admin.blogs.index') }}" class="block w-full px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg text-center transition-colors">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                </div>
            </div>
            
        </div>
        
    </div>
    
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-file-alt text-primary-600 mr-2"></i>
            Content
        </h3>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">TL;DR Summary</label>
            <textarea id="editor-tldr" name="tldr_summary" class="w-full">{{ old('tldr_summary', $blog->tldr_summary) }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Short summary that appears at the top of the blog post</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Main Content <span class="text-red-500">*</span>
            </label>
            <textarea id="editor-content" name="content" class="w-full">{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-1">Use the rich text editor for formatting</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Key Facts</label>
            <textarea id="editor-key-facts" name="key_facts" class="w-full">{{ old('key_facts', $blog->key_facts ? implode("\n", $blog->key_facts) : '') }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Add key facts as bullet points or numbered list</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
            <select name="tags[]" id="tagsSelect" multiple class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                @foreach($tags as $tag)
                    <option value="{{ $tag->name }}" {{ $blog->tags && in_array($tag->name, $blog->tags) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            <p class="text-xs text-gray-500 mt-1">Select multiple tags</p>
        </div>
    </div>
    
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-user text-primary-600 mr-2"></i>
            Author Information
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Author Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="author_name" value="{{ old('author_name', $blog->author_name) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Author Avatar</label>
                @if($blog->author_avatar)
                    <img src="{{ asset('storage/' . $blog->author_avatar) }}" alt="Avatar" class="w-16 h-16 rounded-full mb-2">
                @endif
                <input type="file" name="author_avatar" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>
        </div>
        
        <div class="mt-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Author Bio</label>
            <textarea id="editor-author-bio" name="author_bio" class="w-full">{{ old('author_bio', $blog->author_bio) }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Short bio about the author (max 500 chars)</p>
        </div>
    </div>
    
        <div class="space-y-6 mb-6">
        
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-link text-primary-600 mr-2"></i>
                Additional SEO
            </h3>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Canonical URL</label>
                <input type="text" name="canonical_url" value="{{ old('canonical_url', $blog->canonical_url) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="https://example.com/blog/post-url">
                <p class="text-xs text-gray-500 mt-1">Leave empty to use default URL</p>
            </div>
        </div>
        
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-tags text-primary-600 mr-2"></i>
                Badges
            </h3>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Primary Badge</label>
                    <input type="text" name="badge_primary" value="{{ old('badge_primary', $blog->badges['primary'] ?? '') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="📸 Image Tools Guide">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Secondary Badge</label>
                    <input type="text" name="badge_secondary" value="{{ old('badge_secondary', $blog->badges['secondary'] ?? '') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Beginner Friendly">
                </div>
            </div>
        </div>
        
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-list text-primary-600 mr-2"></i>
                Table of Contents
            </h3>
            
            <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                <p class="text-sm text-blue-800 mb-2"><strong>💡 How TOC Works:</strong></p>
                <ul class="text-sm text-blue-700 space-y-1 ml-4">
                    <li>• <strong>ID:</strong> URL-friendly identifier (e.g., "what-is-compression")</li>
                    <li>• <strong>Title:</strong> Exact heading text from your content</li>
                    <li>• JavaScript will automatically link TOC to matching headings</li>
                    <li>• <strong>Manual Method:</strong> In content editor, click "Code" button and add: <code class="bg-white px-1">&lt;h2 id="your-id"&gt;Heading&lt;/h2&gt;</code></li>
                </ul>
            </div>
            
            <div id="toc-container">
                @if($blog->table_of_contents && count($blog->table_of_contents) > 0)
                    @foreach($blog->table_of_contents as $toc)
                    <div class="toc-item mb-3 p-3 bg-gray-50 rounded-lg">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-3">
                                <input type="text" name="toc_id[]" value="{{ $toc['id'] ?? '' }}" placeholder="section-1"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                            </div>
                            <div class="col-span-8">
                                <input type="text" name="toc_title[]" value="{{ $toc['title'] ?? '' }}" placeholder="Section Title"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                            </div>
                            <div class="col-span-1">
                                <button type="button" onclick="removeTocItem(this)" class="w-full px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="toc-item mb-3 p-3 bg-gray-50 rounded-lg">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-3">
                                <input type="text" name="toc_id[]" placeholder="section-1"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                            </div>
                            <div class="col-span-8">
                                <input type="text" name="toc_title[]" placeholder="Section Title"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                            </div>
                            <div class="col-span-1">
                                <button type="button" onclick="removeTocItem(this)" class="w-full px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <button type="button" onclick="addTocItem()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add TOC Item
            </button>
        </div>
        
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-sidebar text-primary-600 mr-2"></i>
                Sidebar Elements
            </h3>
            
                        <div class="mb-6">
                <h4 class="text-md font-semibold text-gray-700 mb-3">Sidebar Promos</h4>
                <div id="sidebar-promos-container">
                    @if($blog->sidebar_promos && count($blog->sidebar_promos) > 0)
                        @foreach($blog->sidebar_promos as $index => $promo)
                        <div class="promo-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <div class="flex justify-between items-center mb-3">
                                <h6 class="font-semibold text-gray-700 text-sm">Promo #{{ $index + 1 }}</h6>
                                <button type="button" onclick="removeSidebarPromo(this)" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                    <i class="fas fa-times"></i> Remove
                                </button>
                            </div>
                            <div class="space-y-2">
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="text" name="promo_emoji[]" value="{{ $promo['emoji'] ?? '' }}" placeholder="🖼️"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                    <input type="text" name="promo_name[]" value="{{ $promo['name'] ?? '' }}" placeholder="Product Name"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                </div>
                                <textarea name="promo_description[]" rows="2" placeholder="Description"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">{{ $promo['description'] ?? '' }}</textarea>
                                <div class="grid grid-cols-3 gap-2">
                                    <input type="text" name="promo_link_text[]" value="{{ $promo['link_text'] ?? '' }}" placeholder="Try Free"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                    <input type="text" name="promo_link_url[]" value="{{ $promo['link_url'] ?? '' }}" placeholder="https://example.com"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                    <select name="promo_color[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                        <option value="g" {{ ($promo['color'] ?? 'g') == 'g' ? 'selected' : '' }}>Green</option>
                                        <option value="c" {{ ($promo['color'] ?? '') == 'c' ? 'selected' : '' }}>Coral</option>
                                        <option value="b" {{ ($promo['color'] ?? '') == 'b' ? 'selected' : '' }}>Blue</option>
                                        <option value="a" {{ ($promo['color'] ?? '') == 'a' ? 'selected' : '' }}>Amber</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" onclick="addSidebarPromo()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 text-sm">
                    <i class="fas fa-plus mr-2"></i>Add Promo
                </button>
            </div>
            
                        <div>
                <h4 class="text-md font-semibold text-gray-700 mb-3">Quick Links</h4>
                <div id="quick-links-container">
                    @if($blog->quick_links && count($blog->quick_links) > 0)
                        @foreach($blog->quick_links as $index => $link)
                        <div class="quick-link-item mb-3 p-3 bg-gray-50 rounded-lg">
                            <div class="flex justify-between items-center mb-2">
                                <h6 class="font-semibold text-gray-700 text-sm">Link #{{ $index + 1 }}</h6>
                                <button type="button" onclick="removeQuickLink(this)" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <input type="text" name="quick_link_text[]" value="{{ $link['text'] ?? '' }}" placeholder="Link Text"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                <input type="text" name="quick_link_url[]" value="{{ $link['url'] ?? '' }}" placeholder="https://example.com"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                <select name="quick_link_color[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                    <option value="g" {{ ($link['color'] ?? 'g') == 'g' ? 'selected' : '' }}>Green</option>
                                    <option value="c" {{ ($link['color'] ?? '') == 'c' ? 'selected' : '' }}>Coral</option>
                                    <option value="b" {{ ($link['color'] ?? '') == 'b' ? 'selected' : '' }}>Blue</option>
                                    <option value="a" {{ ($link['color'] ?? '') == 'a' ? 'selected' : '' }}>Amber</option>
                                </select>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                <button type="button" onclick="addQuickLink()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 text-sm">
                    <i class="fas fa-plus mr-2"></i>Add Link
                </button>
            </div>
        </div>
        
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-toolbox text-primary-600 mr-2"></i>
                Tool Boxes
            </h3>
            
            <div id="toolbox-container">
                @if($blog->tool_boxes && count($blog->tool_boxes) > 0)
                    @foreach($blog->tool_boxes as $index => $toolbox)
                    <div class="toolbox-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex justify-between items-center mb-3">
                            <h6 class="font-semibold text-gray-700 text-sm">Tool Box #{{ $index + 1 }}</h6>
                            <button type="button" onclick="removeToolBox(this)" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                <i class="fas fa-times"></i> Remove
                            </button>
                        </div>
                        <div class="space-y-2">
                            <div class="grid grid-cols-2 gap-2">
                                <input type="text" name="toolbox_emoji[]" value="{{ $toolbox['emoji'] ?? '' }}" placeholder="🔧"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                <input type="text" name="toolbox_title[]" value="{{ $toolbox['title'] ?? '' }}" placeholder="Tool Name"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                            </div>
                            <textarea name="toolbox_description[]" rows="2" placeholder="Description"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">{{ $toolbox['description'] ?? '' }}</textarea>
                            <div class="grid grid-cols-3 gap-2">
                                <input type="text" name="toolbox_button_text[]" value="{{ $toolbox['button_text'] ?? '' }}" placeholder="Use Tool"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                <input type="text" name="toolbox_button_url[]" value="{{ $toolbox['button_url'] ?? '' }}" placeholder="https://example.com"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                <select name="toolbox_color[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                    <option value="g" {{ ($toolbox['color'] ?? 'g') == 'g' ? 'selected' : '' }}>Green</option>
                                    <option value="c" {{ ($toolbox['color'] ?? '') == 'c' ? 'selected' : '' }}>Coral</option>
                                    <option value="b" {{ ($toolbox['color'] ?? '') == 'b' ? 'selected' : '' }}>Blue</option>
                                    <option value="a" {{ ($toolbox['color'] ?? '') == 'a' ? 'selected' : '' }}>Amber</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <button type="button" onclick="addToolBox()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add Tool Box
            </button>
        </div>
        
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-shoe-prints text-primary-600 mr-2"></i>
                Step-by-Step Guide
            </h3>
            
            <div id="steps-container">
                @if($blog->steps && count($blog->steps) > 0)
                    @foreach($blog->steps as $index => $step)
                    <div class="step-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex justify-between items-center mb-3">
                            <h6 class="font-semibold text-gray-700 text-sm">Step #{{ $index + 1 }}</h6>
                            <button type="button" onclick="removeStep(this)" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                <i class="fas fa-times"></i> Remove
                            </button>
                        </div>
                        <div class="space-y-2">
                            <div class="grid grid-cols-4 gap-2">
                                <input type="text" name="step_number[]" value="{{ $step['number'] ?? '' }}" placeholder="1"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                <input type="text" name="step_title[]" value="{{ $step['title'] ?? '' }}" placeholder="Step Title" class="col-span-3 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                            </div>
                            <textarea name="step_description[]" rows="2" placeholder="Step description"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">{{ $step['description'] ?? '' }}</textarea>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <button type="button" onclick="addStep()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add Step
            </button>
        </div>
        
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-exclamation-circle text-primary-600 mr-2"></i>
                Callout Boxes
            </h3>
            
            <div id="callouts-container">
                @if($blog->callouts && count($blog->callouts) > 0)
                    @foreach($blog->callouts as $index => $callout)
                    <div class="callout-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex justify-between items-center mb-3">
                            <h6 class="font-semibold text-gray-700 text-sm">Callout #{{ $index + 1 }}</h6>
                            <button type="button" onclick="removeCallout(this)" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                <i class="fas fa-times"></i> Remove
                            </button>
                        </div>
                        <div class="space-y-2">
                            <select name="callout_type[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                                <option value="info" {{ ($callout['type'] ?? 'info') == 'info' ? 'selected' : '' }}>Info</option>
                                <option value="warning" {{ ($callout['type'] ?? '') == 'warning' ? 'selected' : '' }}>Warning</option>
                                <option value="success" {{ ($callout['type'] ?? '') == 'success' ? 'selected' : '' }}>Success</option>
                                <option value="tip" {{ ($callout['type'] ?? '') == 'tip' ? 'selected' : '' }}>Tip</option>
                            </select>
                            <input type="text" name="callout_title[]" value="{{ $callout['title'] ?? '' }}" placeholder="Callout Title"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                            <textarea name="callout_content[]" rows="3" placeholder="Callout content"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">{{ $callout['content'] ?? '' }}</textarea>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <button type="button" onclick="addCallout()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add Callout
            </button>
        </div>
        
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-question-circle text-primary-600 mr-2"></i>
                FAQs
            </h3>
            
            <div id="faqs-container">
                @if($blog->faqs && count($blog->faqs) > 0)
                    @foreach($blog->faqs as $index => $faq)
                    <div class="faq-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                        <div class="flex justify-between items-center mb-3">
                            <h6 class="font-semibold text-gray-700 text-sm">FAQ #{{ $index + 1 }}</h6>
                            <button type="button" onclick="removeFaq(this)" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                <i class="fas fa-times"></i> Remove
                            </button>
                        </div>
                        <div class="space-y-2">
                            <input type="text" name="faq_question[]" value="{{ $faq['question'] ?? '' }}" placeholder="Question"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                            <textarea name="faq_answer[]" rows="3" placeholder="Answer"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">{{ $faq['answer'] ?? '' }}</textarea>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            <button type="button" onclick="addFaq()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add FAQ
            </button>
        </div>
        
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-flag-checkered text-primary-600 mr-2"></i>
                Conclusion Section
            </h3>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Conclusion Title</label>
                <input type="text" name="conclusion_title" value="{{ old('conclusion_title', $blog->conclusion_data['title'] ?? '') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="Ready to Start?">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Conclusion Content</label>
                <textarea id="editor-conclusion" name="conclusion_content" class="w-full">{{ old('conclusion_content', $blog->conclusion_data['content'] ?? '') }}</textarea>
            </div>
            
            <div id="conclusion-buttons-container"></div>
            <button type="button" onclick="addConclusionButton()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add Button
            </button>
        </div>
        
    </div>
</form>

@endsection

@section('styles')
<style>
    .tox-tinymce {
        border: 1px solid #d1d5db !important;
        border-radius: 0.5rem !important;
    }
    .editor-wrapper {
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.2/tinymce.min.js"></script>
<script>
    function fillDemoData() {
        document.querySelector('input[name="title"]').value = 'Advanced JavaScript Techniques for Modern Developers';
        document.querySelector('input[name="slug"]').value = 'advanced-javascript-techniques-modern-developers';
        document.querySelector('input[name="author_name"]').value = 'Jane Doe';
        document.querySelector('input[name="published_date"]').value = '2026-05-03';
        document.querySelector('input[name="read_time"]').value = '20';
        document.querySelector('select[name="status"]').value = 'published';
        
        const categorySelect = document.querySelector('select[name="category_id"]');
        if (categorySelect && categorySelect.options.length > 1) {
            categorySelect.selectedIndex = 1;
            const event = new Event('change', { bubbles: true });
            categorySelect.dispatchEvent(event);
        }
        
        const iconSelect = document.querySelector('select[name="featured_icon"]');
        if (iconSelect && iconSelect.options.length > 1) {
            iconSelect.selectedIndex = 2;
            const event = new Event('change', { bubbles: true });
            iconSelect.dispatchEvent(event);
        }
        
        if (typeof tinymce !== 'undefined' && tinymce.get('editor-content')) {
            tinymce.get('editor-content').setContent(`
                <h2>Introduction to Advanced JavaScript</h2>
                <p>JavaScript has become one of the most powerful programming languages. This guide covers advanced techniques that every modern developer should know.</p>
                
                <h2>Async/Await Patterns</h2>
                <p>Modern JavaScript uses async/await for handling asynchronous operations:</p>
                <pre><code>async function fetchData() {
    const response = await fetch('/api/data');
    const data = await response.json();
    return data;
}</code></pre>
                
                <h2>Closures and Scope</h2>
                <p>Understanding closures is crucial for writing efficient JavaScript code. Closures allow functions to access variables from outer scopes.</p>
                
                <h2>Performance Optimization</h2>
                <p>Optimize your JavaScript code by using techniques like debouncing, throttling, and lazy loading.</p>
                
                <h2>Conclusion</h2>
                <p>Mastering these advanced JavaScript techniques will make you a more effective developer. Keep practicing and exploring new patterns!</p>
            `);
        }
        
        document.querySelector('input[name="meta_title"]').value = 'Advanced JavaScript Techniques | Modern Development Guide';
        document.querySelector('textarea[name="meta_description"]').value = 'Master advanced JavaScript techniques including async/await, closures, and performance optimization. Complete guide for modern developers.';
        document.querySelector('input[name="seo_keywords"]').value = 'javascript, programming, async await, closures, web development, tutorial';
        
        const tldrInput = document.querySelector('textarea[name="tldr_summary"]');
        if (tldrInput) {
            tldrInput.value = 'Learn advanced JavaScript patterns including async/await, closures, and performance optimization techniques.';
        }
        
        const badgePrimary = document.querySelector('input[name="badge_primary"]');
        if (badgePrimary) badgePrimary.value = 'Advanced';
        
        const badgeSecondary = document.querySelector('input[name="badge_secondary"]');
        if (badgeSecondary) badgeSecondary.value = 'Expert Level';
        
        const addPromoBtn = document.querySelector('button[onclick*="addPromo"]');
        if (addPromoBtn) {
            addPromoBtn.click();
            setTimeout(() => {
                const promoInputs = document.querySelectorAll('input[name="promo_name[]"]');
                if (promoInputs.length > 0) {
                    const lastIndex = promoInputs.length - 1;
                    document.querySelectorAll('input[name="promo_emoji[]"]')[lastIndex].value = '📚';
                    document.querySelectorAll('input[name="promo_name[]"]')[lastIndex].value = 'JavaScript Masterclass';
                    document.querySelectorAll('textarea[name="promo_description[]"]')[lastIndex].value = 'Deep dive into advanced JavaScript concepts';
                    document.querySelectorAll('input[name="promo_link_text[]"]')[lastIndex].value = 'Learn More';
                    document.querySelectorAll('input[name="promo_link_url[]"]')[lastIndex].value = '#';
                }
            }, 100);
        }
        
        const addLinkBtn = document.querySelector('button[onclick*="addQuickLink"]');
        if (addLinkBtn) {
            addLinkBtn.click();
            setTimeout(() => {
                const linkInputs = document.querySelectorAll('input[name="quick_link_text[]"]');
                if (linkInputs.length > 0) {
                    const lastIndex = linkInputs.length - 1;
                    document.querySelectorAll('input[name="quick_link_text[]"]')[lastIndex].value = 'Code Examples';
                    document.querySelectorAll('input[name="quick_link_url[]"]')[lastIndex].value = '#';
                }
            }, 100);
        }
        
        const addToolboxBtn = document.querySelector('button[onclick*="addToolBox"]');
        if (addToolboxBtn) {
            addToolboxBtn.click();
            setTimeout(() => {
                const toolboxInputs = document.querySelectorAll('input[name="toolbox_title[]"]');
                if (toolboxInputs.length > 0) {
                    const lastIndex = toolboxInputs.length - 1;
                    document.querySelectorAll('input[name="toolbox_emoji[]"]')[lastIndex].value = '⚡';
                    document.querySelectorAll('input[name="toolbox_title[]"]')[lastIndex].value = 'Performance Tools';
                    document.querySelectorAll('textarea[name="toolbox_description[]"]')[lastIndex].value = 'Tools to optimize JavaScript performance';
                    document.querySelectorAll('input[name="toolbox_button_text[]"]')[lastIndex].value = 'Explore Tools';
                    document.querySelectorAll('input[name="toolbox_button_url[]"]')[lastIndex].value = '#';
                }
            }, 100);
        }
        
        const addStepBtn = document.querySelector('button[onclick*="addStep"]');
        if (addStepBtn) {
            addStepBtn.click();
            setTimeout(() => {
                const stepInputs = document.querySelectorAll('input[name="step_title[]"]');
                if (stepInputs.length > 0) {
                    const lastIndex = stepInputs.length - 1;
                    document.querySelectorAll('input[name="step_number[]"]')[lastIndex].value = '1';
                    document.querySelectorAll('input[name="step_title[]"]')[lastIndex].value = 'Master Async/Await';
                    document.querySelectorAll('textarea[name="step_description[]"]')[lastIndex].value = 'Learn how to handle asynchronous operations effectively';
                }
            }, 100);
        }
        
        const addCalloutBtn = document.querySelector('button[onclick*="addCallout"]');
        if (addCalloutBtn) {
            addCalloutBtn.click();
            setTimeout(() => {
                const calloutInputs = document.querySelectorAll('textarea[name="callout_content[]"]');
                if (calloutInputs.length > 0) {
                    const lastIndex = calloutInputs.length - 1;
                    document.querySelectorAll('select[name="callout_type[]"]')[lastIndex].value = 'warning';
                    document.querySelectorAll('input[name="callout_icon[]"]')[lastIndex].value = '⚠️';
                    document.querySelectorAll('textarea[name="callout_content[]"]')[lastIndex].value = 'Warning: Avoid callback hell by using async/await patterns!';
                }
            }, 100);
        }
        
        const addFaqBtn = document.querySelector('button[onclick*="addFaq"]');
        if (addFaqBtn) {
            addFaqBtn.click();
            setTimeout(() => {
                const faqInputs = document.querySelectorAll('input[name="faq_question[]"]');
                if (faqInputs.length > 0) {
                    const lastIndex = faqInputs.length - 1;
                    document.querySelectorAll('input[name="faq_question[]"]')[lastIndex].value = 'What is a closure in JavaScript?';
                    document.querySelectorAll('textarea[name="faq_answer[]"]')[lastIndex].value = 'A closure is a function that has access to variables in its outer scope, even after the outer function has returned.';
                }
            }, 100);
        }
        
        setTimeout(() => {
            if (typeof showToast === 'function') {
                showToast('Demo data filled successfully! Check all sections.', 'success');
            }
        }, 500);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializePage);
    } else {
        initializePage();
    }
    
    function initializePage() {
        const fillDemoBtn = document.getElementById('fillDemoBtn');
        if (fillDemoBtn) {
            fillDemoBtn.addEventListener('click', fillDemoData);
        }
        
        const categorySelect = document.getElementById('categorySelect');
        if (categorySelect) {
            initCustomSelect(categorySelect);
        }
        
        const tagsSelect = document.getElementById('tagsSelect');
        if (tagsSelect) {
            initCustomMultiSelect(tagsSelect);
        }

        const iconSelect = document.getElementById('featuredIconInput');
        if (iconSelect) {
            initCustomSelect(iconSelect);
        }

        const featuredImageInput = document.getElementById('featuredImageInput');
        const featuredIconInput = document.getElementById('featuredIconInput');
        
        if (featuredImageInput && featuredIconInput) {
            if (featuredIconInput.value.trim() !== '') {
                featuredImageInput.disabled = true;
                featuredImageInput.classList.add('bg-gray-100', 'cursor-not-allowed');
            }
            
            featuredImageInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    featuredIconInput.value = '';
                    featuredIconInput.disabled = true;
                    const wrapper = featuredIconInput.closest('.custom-select');
                    if (wrapper) {
                        wrapper.style.opacity = '0.5';
                        wrapper.style.pointerEvents = 'none';
                    }
                } else {
                    featuredIconInput.disabled = false;
                    const wrapper = featuredIconInput.closest('.custom-select');
                    if (wrapper) {
                        wrapper.style.opacity = '1';
                        wrapper.style.pointerEvents = 'auto';
                    }
                }
            });
            
            featuredIconInput.addEventListener('change', function() {
                if (this.value.trim() !== '') {
                    featuredImageInput.disabled = true;
                    featuredImageInput.classList.add('bg-gray-100', 'cursor-not-allowed');
                } else {
                    featuredImageInput.disabled = false;
                    featuredImageInput.classList.remove('bg-gray-100', 'cursor-not-allowed');
                }
            });
        }

        const autoFillSeoBtn = document.getElementById('autoFillSeoBtn');
        if (autoFillSeoBtn) {
            autoFillSeoBtn.addEventListener('click', function() {
                const title = document.querySelector('input[name="title"]').value;
                const slug = document.querySelector('input[name="slug"]').value;
                
                if (!title) {
                    showToast('Please enter a title first', 'warning');
                    return;
                }

                const metaTitle = title.substring(0, 60);
                document.getElementById('metaTitle').value = metaTitle;

                const metaDescription = `Learn about ${title}. Complete guide and tutorial.`.substring(0, 160);
                document.getElementById('metaDescription').value = metaDescription;

                const keywords = title.toLowerCase()
                    .replace(/[^\w\s]/g, '')
                    .split(/\s+/)
                    .filter(word => word.length > 3)
                    .slice(0, 5)
                    .join(', ');
                document.getElementById('seoKeywords').value = keywords;

                showToast('SEO fields auto-filled successfully!', 'success');
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const fullEditorConfig = {
            height: 500,
            menubar: 'file edit view insert format tools table help',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons',
                'codesample'
            ],
            toolbar: 'undo redo | blocks fontsize | bold italic underline strikethrough | forecolor backcolor | ' +
                     'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
                     'table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | ' +
                     'tableinsertcolbefore tableinsertcolafter tabledeletecol | ' +
                     'link image media codesample | emoticons charmap | ' +
                     'removeformat code fullscreen | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px; line-height: 1.6; }' +
                'table { border-collapse: collapse; width: 100%; margin: 20px 0; }' +
                'table td, table th { border: 1px solid #ddd; padding: 12px; }' +
                'table th { background-color: #f3f4f6; font-weight: 600; text-align: left; }' +
                'table tr:nth-child(even) { background-color: #f9fafb; }' +
                'img { max-width: 100%; height: auto; }' +
                'code { background: #f3f4f6; padding: 2px 6px; border-radius: 3px; font-family: monospace; }' +
                'pre { background: #1e293b; color: #e2e8f0; padding: 16px; border-radius: 8px; overflow-x: auto; }',
            paste_data_images: true,
            paste_as_text: false,
            paste_enable_default_filters: false,
            paste_word_valid_elements: "table,tr,td,th,tbody,thead,tfoot,p,b,strong,i,em,h1,h2,h3,h4,h5,h6,ul,ol,li,a,img,code,pre",
            table_default_attributes: { border: '1' },
            table_default_styles: { 'border-collapse': 'collapse', 'width': '100%' },
            image_advtab: true,
            image_caption: true,
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            promotion: false,
            branding: false,
            statusbar: true,
            resize: true
        };

        tinymce.init({
            ...fullEditorConfig,
            selector: '#editor-content',
            height: 500
        });
        
        tinymce.init({
            ...fullEditorConfig,
            selector: '#editor-tldr',
            height: 250
        });
        
        tinymce.init({
            ...fullEditorConfig,
            selector: '#editor-author-bio',
            height: 200
        });
        
        tinymce.init({
            ...fullEditorConfig,
            selector: '#editor-conclusion',
            height: 250
        });
        
        tinymce.init({
            ...fullEditorConfig,
            selector: '#editor-key-facts',
            height: 300
        });


        const titleInput = document.querySelector('input[name="title"]');
        const slugInput = document.querySelector('input[name="slug"]');
        let manuallyEdited = false;

        slugInput.addEventListener('input', function() {
            if (this.value !== '') {
                manuallyEdited = true;
            }
        });

        titleInput.addEventListener('input', function() {
            if (!manuallyEdited) {
                const slug = generateSlug(this.value);
                slugInput.value = slug;
            }
        });

        function generateSlug(text) {
            return text
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-+|-+$/g, '');
        }
    });




    function addTocItem() {
        const container = document.getElementById('toc-container');
        const div = document.createElement('div');
        div.className = 'toc-item mb-3 p-3 bg-gray-50 rounded-lg';
        div.innerHTML = `
            <div class="grid grid-cols-12 gap-2">
                <div class="col-span-3">
                    <input type="text" name="toc_id[]" placeholder="section-1"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div class="col-span-8">
                    <input type="text" name="toc_title[]" placeholder="Section Title"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div class="col-span-1">
                    <button type="button" onclick="removeTocItem(this)" class="w-full px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        container.appendChild(div);
    }
    
    function removeTocItem(btn) {
        btn.closest('.toc-item').remove();
    }

    let toolboxCounter = {{ $blog->tool_boxes ? count($blog->tool_boxes) : 0 }};
    function addToolBox() {
        const container = document.getElementById('toolbox-container');
        const div = document.createElement('div');
        div.className = 'toolbox-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200';
        div.innerHTML = `
            <div class="flex justify-between items-center mb-3">
                <h5 class="font-semibold text-gray-700">Tool Box #${++toolboxCounter}</h5>
                <button type="button" onclick="removeToolBox(this)" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm">
                    <i class="fas fa-times"></i> Remove
                </button>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <input type="text" name="toolbox_emoji[]" placeholder="🖼️"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div>
                    <input type="text" name="toolbox_title[]" placeholder="Tool Name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div class="col-span-2">
                    <textarea name="toolbox_description[]" rows="2" placeholder="Tool description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm"></textarea>
                </div>
                <div>
                    <input type="text" name="toolbox_button_text[]" placeholder="Try Free"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div>
                    <input type="text" name="toolbox_button_url[]" placeholder="https://example.com"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div>
                    <select name="toolbox_color[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                        <option value="g">Green</option>
                        <option value="c">Coral</option>
                        <option value="b">Blue</option>
                        <option value="a">Amber</option>
                    </select>
                </div>
            </div>
        `;
        container.appendChild(div);
    }
    
    function removeToolBox(btn) {
        btn.closest('.toolbox-item').remove();
    }

    let stepCounter = {{ $blog->steps ? count($blog->steps) : 0 }};
    function addStep() {
        const container = document.getElementById('steps-container');
        const div = document.createElement('div');
        div.className = 'step-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200';
        div.innerHTML = `
            <div class="flex justify-between items-center mb-3">
                <h5 class="font-semibold text-gray-700">Step #${++stepCounter}</h5>
                <button type="button" onclick="removeStep(this)" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm">
                    <i class="fas fa-times"></i> Remove
                </button>
            </div>
            <div class="space-y-3">
                <div>
                    <input type="number" name="step_number[]" value="${stepCounter}" placeholder="Step number"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div>
                    <input type="text" name="step_title[]" placeholder="Step Title"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div>
                    <textarea name="step_description[]" rows="3" placeholder="Step description"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm"></textarea>
                </div>
            </div>
        `;
        container.appendChild(div);
    }
    
    function removeStep(btn) {
        btn.closest('.step-item').remove();
    }

    let calloutCounter = {{ $blog->callouts ? count($blog->callouts) : 0 }};
    function addCallout() {
        const container = document.getElementById('callouts-container');
        const div = document.createElement('div');
        div.className = 'callout-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200';
        div.innerHTML = `
            <div class="flex justify-between items-center mb-3">
                <h5 class="font-semibold text-gray-700">Callout #${++calloutCounter}</h5>
                <button type="button" onclick="removeCallout(this)" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm">
                    <i class="fas fa-times"></i> Remove
                </button>
            </div>
            <div class="space-y-3">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <select name="callout_type[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                            <option value="tip">Tip</option>
                            <option value="warn">Warning</option>
                        </select>
                    </div>
                    <div>
                        <input type="text" name="callout_icon[]" placeholder="💡"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                    </div>
                </div>
                <div>
                    <textarea name="callout_content[]" rows="3" placeholder="Callout content"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm"></textarea>
                </div>
            </div>
        `;
        container.appendChild(div);
    }
    
    function removeCallout(btn) {
        btn.closest('.callout-item').remove();
    }

    let faqCounter = {{ $blog->faqs ? count($blog->faqs) : 0 }};
    function addFaq() {
        const container = document.getElementById('faqs-container');
        const div = document.createElement('div');
        div.className = 'faq-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200';
        div.innerHTML = `
            <div class="flex justify-between items-center mb-3">
                <h5 class="font-semibold text-gray-700">FAQ #${++faqCounter}</h5>
                <button type="button" onclick="removeFaq(this)" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-sm">
                    <i class="fas fa-times"></i> Remove
                </button>
            </div>
            <div class="space-y-3">
                <div>
                    <input type="text" name="faq_question[]" placeholder="Question here?"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div>
                    <textarea name="faq_answer[]" rows="3" placeholder="Answer here"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm"></textarea>
                </div>
            </div>
        `;
        container.appendChild(div);
    }
    
    function removeFaq(btn) {
        btn.closest('.faq-item').remove();
    }

    let conclusionBtnCounter = {{ isset($blog->conclusion_data['buttons']) ? count($blog->conclusion_data['buttons']) : 0 }};
    function addConclusionButton() {
        const container = document.getElementById('conclusion-buttons-container');
        const div = document.createElement('div');
        div.className = 'conclusion-btn-item mb-3 p-3 bg-gray-50 rounded-lg';
        div.innerHTML = `
            <div class="flex justify-between items-center mb-2">
                <h6 class="font-semibold text-gray-700 text-sm">Button #${++conclusionBtnCounter}</h6>
                <button type="button" onclick="removeConclusionButton(this)" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="grid grid-cols-3 gap-2">
                <div>
                    <input type="text" name="conclusion_btn_text[]" placeholder="Get Started"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div>
                    <input type="text" name="conclusion_btn_url[]" placeholder="https://example.com"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <div>
                    <select name="conclusion_btn_color[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                        <option value="g">Green</option>
                        <option value="c">Coral</option>
                        <option value="b">Blue</option>
                        <option value="a">Amber</option>
                    </select>
                </div>
            </div>
        `;
        container.appendChild(div);
    }
    
    function removeConclusionButton(btn) {
        btn.closest('.conclusion-btn-item').remove();
    }

    let promoCounter = {{ $blog->sidebar_promos ? count($blog->sidebar_promos) : 0 }};
    function addSidebarPromo() {
        const container = document.getElementById('sidebar-promos-container');
        const div = document.createElement('div');
        div.className = 'promo-item mb-4 p-4 bg-gray-50 rounded-lg border border-gray-200';
        div.innerHTML = `
            <div class="flex justify-between items-center mb-3">
                <h6 class="font-semibold text-gray-700 text-sm">Promo #${++promoCounter}</h6>
                <button type="button" onclick="removeSidebarPromo(this)" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                    <i class="fas fa-times"></i> Remove
                </button>
            </div>
            <div class="space-y-2">
                <div class="grid grid-cols-2 gap-2">
                    <input type="text" name="promo_emoji[]" placeholder="🖼️"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                    <input type="text" name="promo_name[]" placeholder="Product Name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                </div>
                <textarea name="promo_description[]" rows="2" placeholder="Description"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm"></textarea>
                <div class="grid grid-cols-3 gap-2">
                    <input type="text" name="promo_link_text[]" placeholder="Try Free"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                    <input type="text" name="promo_link_url[]" placeholder="https://example.com"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                    <select name="promo_color[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                        <option value="g">Green</option>
                        <option value="c">Coral</option>
                        <option value="b">Blue</option>
                        <option value="a">Amber</option>
                    </select>
                </div>
            </div>
        `;
        container.appendChild(div);
    }
    
    function removeSidebarPromo(btn) {
        btn.closest('.promo-item').remove();
    }

    let quickLinkCounter = {{ $blog->quick_links ? count($blog->quick_links) : 0 }};
    function addQuickLink() {
        const container = document.getElementById('quick-links-container');
        const div = document.createElement('div');
        div.className = 'quick-link-item mb-3 p-3 bg-gray-50 rounded-lg';
        div.innerHTML = `
            <div class="flex justify-between items-center mb-2">
                <h6 class="font-semibold text-gray-700 text-sm">Link #${++quickLinkCounter}</h6>
                <button type="button" onclick="removeQuickLink(this)" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="grid grid-cols-3 gap-2">
                <input type="text" name="quick_link_text[]" placeholder="Link Text"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                <input type="text" name="quick_link_url[]" placeholder="https://example.com"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                <select name="quick_link_color[]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 text-sm">
                    <option value="g">Green</option>
                    <option value="c">Coral</option>
                    <option value="b">Blue</option>
                    <option value="a">Amber</option>
                </select>
            </div>
        `;
        container.appendChild(div);
    }
    
    function removeQuickLink(btn) {
        btn.closest('.quick-link-item').remove();
    }
</script>

<script>
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeAjaxForm);
    } else {
        initializeAjaxForm();
    }
    
    function initializeAjaxForm() {
        const form = document.getElementById('blogEditForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        
        if (!form) return;
        
        function clearErrors() {
            document.querySelectorAll('[id^="error-"]').forEach(el => {
                el.textContent = '';
                el.classList.add('hidden');
            });
            document.querySelectorAll('input, textarea, select').forEach(el => {
                el.classList.remove('border-red-500');
            });
        }
        
        function showError(fieldName, message) {
            const errorEl = document.getElementById('error-' + fieldName);
            const inputEl = document.getElementById(fieldName) || document.querySelector(`[name="${fieldName}"]`);
            
            if (errorEl) {
                errorEl.textContent = message;
                errorEl.classList.remove('hidden');
            } else {
                if (inputEl && inputEl.parentElement) {
                    const newError = document.createElement('p');
                    newError.id = 'error-' + fieldName;
                    newError.className = 'text-red-500 text-sm mt-1';
                    newError.textContent = message;
                    inputEl.parentElement.appendChild(newError);
                }
            }
            
            if (inputEl) {
                inputEl.classList.add('border-red-500');
                if (document.querySelectorAll('.border-red-500').length === 1) {
                    inputEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        }
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            clearErrors();
            
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }
            
            const content = document.querySelector('textarea[name="content"]').value;
            if (!content || content.trim() === '') {
                showError('content', 'The content field is required.');
                if (typeof showToast === 'function') {
                    showToast('Please enter blog content', 'error');
                }
                return;
            }
            
            submitBtn.disabled = true;
            btnText.textContent = 'Updating...';
            
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw data;
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect || '{{ route("admin.blogs.index") }}';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                if (error.errors) {
                    Object.keys(error.errors).forEach(fieldName => {
                        const messages = error.errors[fieldName];
                        if (Array.isArray(messages) && messages.length > 0) {
                            showError(fieldName, messages[0]);
                        }
                    });
                    
                    if (typeof showToast === 'function') {
                        showToast('Please fix the errors below', 'error');
                    }
                } else if (error.message) {
                    if (typeof showToast === 'function') {
                        showToast(error.message, 'error');
                    }
                } else {
                    if (typeof showToast === 'function') {
                        showToast('An error occurred. Please try again.', 'error');
                    }
                }
                
                submitBtn.disabled = false;
                btnText.textContent = 'Update Blog';
            });
        });
    }
</script>
@endsection
