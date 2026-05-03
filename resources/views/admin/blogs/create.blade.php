@extends('admin.layouts.app')

@section('title', 'Create Blog')
@section('page-title', 'Create New Blog')
@section('page-subtitle', 'Add a new blog post')

@section('content')

<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <!-- Author Information (Full Width) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-user text-primary-600 mr-2"></i>
            Author Information
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Author Name <span class="text-red-500">*</span>
                </label>
                <input type="text" name="author_name" value="{{ old('author_name', session('admin_name', 'Admin')) }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Author Avatar</label>
                <input type="file" name="author_avatar" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Author Emoji</label>
                <input type="text" name="author_emoji" value="{{ old('author_emoji', '✍️') }}" maxlength="10"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="✍️">
                <p class="text-xs text-gray-500 mt-1">Emoji to show next to author name</p>
            </div>
        </div>
        
        <div class="mt-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Author Bio</label>
            <textarea id="editor-author-bio" name="author_bio" class="w-full">{{ old('author_bio') }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Short bio about the author (max 500 chars)</p>
        </div>
    </div>
    
    <!-- Content Section (Full Width) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-file-alt text-primary-600 mr-2"></i>
            Content
        </h3>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">TL;DR Summary</label>
            <textarea id="editor-tldr" name="tldr_summary" class="w-full">{{ old('tldr_summary') }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Short summary that appears at the top of the blog post</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Main Content <span class="text-red-500">*</span>
            </label>
            <textarea id="editor-content" name="content" required class="w-full">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-1">Use the rich text editor for formatting</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Key Facts</label>
            <textarea id="editor-key-facts" name="key_facts" class="w-full">{{ old('key_facts') }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Add key facts as bullet points or numbered list</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
            <input type="text" name="tags" value="{{ old('tags') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                placeholder="tag1, tag2, tag3">
            <p class="text-xs text-gray-500 mt-1">Comma separated</p>
        </div>
    </div>
    
    <!-- Additional SEO, Badges, TOC, Sidebar Elements (Full Width) -->
    <div class="space-y-6 mb-6">
        
        <!-- Additional SEO Fields -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-link text-primary-600 mr-2"></i>
                Additional SEO
            </h3>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Canonical URL</label>
                <input type="url" name="canonical_url" value="{{ old('canonical_url') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="https://example.com/blog/post-url">
                <p class="text-xs text-gray-500 mt-1">Leave empty to use default URL</p>
            </div>
        </div>
        
        <!-- Badges -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-tags text-primary-600 mr-2"></i>
                Badges
            </h3>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Primary Badge</label>
                    <input type="text" name="badge_primary" value="{{ old('badge_primary') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="📸 Image Tools Guide">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Secondary Badge</label>
                    <input type="text" name="badge_secondary" value="{{ old('badge_secondary') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Beginner Friendly">
                </div>
            </div>
        </div>
        
        <!-- Table of Contents -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-list text-primary-600 mr-2"></i>
                Table of Contents
            </h3>
            
            <div id="toc-container">
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
            </div>
            <button type="button" onclick="addTocItem()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add TOC Item
            </button>
        </div>
        
        <!-- Sidebar Elements -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-sidebar text-primary-600 mr-2"></i>
                Sidebar Elements
            </h3>
            
            <!-- Sidebar Promos -->
            <div class="mb-6">
                <h4 class="text-md font-semibold text-gray-700 mb-3">Sidebar Promos</h4>
                <div id="sidebar-promos-container"></div>
                <button type="button" onclick="addSidebarPromo()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 text-sm">
                    <i class="fas fa-plus mr-2"></i>Add Promo
                </button>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-md font-semibold text-gray-700 mb-3">Quick Links</h4>
                <div id="quick-links-container"></div>
                <button type="button" onclick="addQuickLink()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 text-sm">
                    <i class="fas fa-plus mr-2"></i>Add Link
                </button>
            </div>
        </div>
        
        <!-- Tool Boxes -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-toolbox text-primary-600 mr-2"></i>
                Tool Boxes
            </h3>
            
            <div id="toolbox-container"></div>
            <button type="button" onclick="addToolBox()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add Tool Box
            </button>
        </div>
        
        <!-- Steps -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-shoe-prints text-primary-600 mr-2"></i>
                Step-by-Step Guide
            </h3>
            
            <div id="steps-container"></div>
            <button type="button" onclick="addStep()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add Step
            </button>
        </div>
        
        <!-- Callouts -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-exclamation-circle text-primary-600 mr-2"></i>
                Callout Boxes
            </h3>
            
            <div id="callouts-container"></div>
            <button type="button" onclick="addCallout()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add Callout
            </button>
        </div>
        
        <!-- FAQs -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-question-circle text-primary-600 mr-2"></i>
                FAQs
            </h3>
            
            <div id="faqs-container"></div>
            <button type="button" onclick="addFaq()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add FAQ
            </button>
        </div>
        
        <!-- Conclusion -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-flag-checkered text-primary-600 mr-2"></i>
                Conclusion Section
            </h3>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Conclusion Title</label>
                <input type="text" name="conclusion_title" value="{{ old('conclusion_title') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="Ready to Start?">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Conclusion Content</label>
                <textarea id="editor-conclusion" name="conclusion_content" class="w-full">{{ old('conclusion_content') }}</textarea>
            </div>
            
            <div id="conclusion-buttons-container"></div>
            <button type="button" onclick="addConclusionButton()" class="mt-2 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                <i class="fas fa-plus mr-2"></i>Add Button
            </button>
        </div>
        
        <!-- Comparison Table -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-table text-primary-600 mr-2"></i>
                Comparison Table (Optional)
            </h3>
            
            <p class="text-sm text-gray-600 mb-4">Leave empty if not needed. Use TinyMCE editor tables for complex tables.</p>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Table Headers (comma-separated)</label>
                <input type="text" name="comparison_headers" value="{{ old('comparison_headers') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="Feature, PNG, JPG">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Table Rows (one row per line, cells separated by commas)</label>
                <textarea name="comparison_rows" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                    placeholder="Compression, Lossless, Lossy&#10;File Size, Large, Small&#10;Quality, Perfect, Good">{{ old('comparison_rows') }}</textarea>
            </div>
        </div>
        
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Content (Left Side) -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                    Basic Information
                </h3>
                
                <!-- Title -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 @error('title') border-red-500 @enderror"
                        placeholder="Enter blog title">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Slug -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Slug <span class="text-gray-500 text-xs">(Leave empty to auto-generate)</span>
                    </label>
                    <input type="text" name="slug" value="{{ old('slug') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 @error('slug') border-red-500 @enderror"
                        placeholder="blog-post-url">
                    @error('slug')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Category & Color -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                        <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Category Color <span class="text-red-500">*</span>
                        </label>
                        <div class="flex gap-3">
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="category_color" value="g" {{ old('category_color', 'g') == 'g' ? 'checked' : '' }} class="mr-2">
                                <span class="w-6 h-6 bg-green-500 rounded-full"></span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="category_color" value="c" {{ old('category_color') == 'c' ? 'checked' : '' }} class="mr-2">
                                <span class="w-6 h-6 bg-orange-500 rounded-full"></span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="category_color" value="b" {{ old('category_color') == 'b' ? 'checked' : '' }} class="mr-2">
                                <span class="w-6 h-6 bg-blue-500 rounded-full"></span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="category_color" value="a" {{ old('category_color') == 'a' ? 'checked' : '' }} class="mr-2">
                                <span class="w-6 h-6 bg-yellow-500 rounded-full"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- SEO & Meta -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-search text-primary-600 mr-2"></i>
                    SEO & Meta Information
                </h3>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" maxlength="60"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="SEO title (max 60 chars)">
                    <p class="text-xs text-gray-500 mt-1">Leave empty to use blog title</p>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Description</label>
                    <textarea name="meta_description" rows="3" maxlength="160"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="SEO description (max 160 chars)">{{ old('meta_description') }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">SEO Keywords</label>
                    <input type="text" name="seo_keywords" value="{{ old('seo_keywords') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="keyword1, keyword2, keyword3">
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Featured Image</label>
                        <input type="file" name="featured_image" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Featured Emoji</label>
                        <input type="text" name="featured_image_emoji" value="{{ old('featured_image_emoji') }}" maxlength="10"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="🖼️">
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Sidebar (Right Side) -->
        <div class="space-y-6">
            
            <!-- Publishing -->
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
                        <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Published Date <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="published_date" value="{{ old('published_date', date('Y-m-d')) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Read Time (minutes) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="read_time" value="{{ old('read_time', 5) }}" min="1" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
            </div>
            
            <!-- Features -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-star text-primary-600 mr-2"></i>
                    Features
                </h3>
                
                <div class="space-y-3">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                            class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <span class="ml-2 text-sm font-medium text-gray-700">Featured on Homepage</span>
                    </label>
                    
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="is_beginner_friendly" value="1" {{ old('is_beginner_friendly') ? 'checked' : '' }}
                            class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                        <span class="ml-2 text-sm font-medium text-gray-700">Beginner Friendly</span>
                    </label>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="space-y-3">
                    <button type="submit" class="w-full px-4 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-lg transition-colors">
                        <i class="fas fa-save mr-2"></i>
                        Create Blog
                    </button>
                    
                    <a href="{{ route('admin.blogs.index') }}" class="block w-full px-4 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg text-center transition-colors">
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                </div>
            </div>
            
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
<!-- TinyMCE Editor JS -->
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.2/tinymce.min.js"></script>
<script>
    console.log('TinyMCE script loaded');
    
    
    // Initialize TinyMCE editors
    tinymce.init({
        selector: '#editor-content',
        height: 500,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'preview', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter alignright alignjust | bullist numlist outdent indent | table | link image | removeformat | code | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }' +
            'table { border-collapse: collapse; width: 100%; margin: 20px 0; }' +
            'table td, table th { border: 1px solid #ddd; padding: 8px; }' +
            'table th { background-color: #f3f4f6; font-weight: 600; }',
        paste_data_images: true,
        paste_as_text: false,
        paste_enable_default_filters: false,
        paste_word_valid_elements: "table,tr,td,th,tbody,thead,tfoot,p,b,strong,i,em,h1,h2,h3,h4,h5,h6,ul,ol,li",
        table_default_attributes: { border: '1' },
        table_default_styles: { 'border-collapse': 'collapse', 'width': '100%' },
        promotion: false,
        branding: false
    });
    
    tinymce.init({
        selector: '#editor-tldr',
        height: 200,
        menubar: false,
        plugins: ['lists', 'link', 'table', 'wordcount'],
        toolbar: 'bold italic | bullist numlist | link | table',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }' +
            'table { border-collapse: collapse; width: 100%; }' +
            'table td, table th { border: 1px solid #ddd; padding: 8px; }',
        paste_data_images: false,
        promotion: false,
        branding: false
    });
    
    tinymce.init({
        selector: '#editor-author-bio',
        height: 150,
        menubar: false,
        plugins: ['link', 'table'],
        toolbar: 'bold italic underline | link | table',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }' +
            'table { border-collapse: collapse; width: 100%; }' +
            'table td, table th { border: 1px solid #ddd; padding: 8px; }',
        promotion: false,
        branding: false
    });
    
    tinymce.init({
        selector: '#editor-conclusion',
        height: 200,
        menubar: false,
        plugins: ['lists', 'link', 'table', 'wordcount'],
        toolbar: 'bold italic | bullist numlist | link | table',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }' +
            'table { border-collapse: collapse; width: 100%; }' +
            'table td, table th { border: 1px solid #ddd; padding: 8px; }',
        promotion: false,
        branding: false
    });
    
    tinymce.init({
        selector: '#editor-key-facts',
        height: 250,
        menubar: false,
        plugins: ['lists', 'link', 'table', 'wordcount'],
        toolbar: 'bold italic | bullist numlist | link | table',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }' +
            'table { border-collapse: collapse; width: 100%; }' +
            'table td, table th { border: 1px solid #ddd; padding: 8px; }',
        paste_data_images: false,
        promotion: false,
        branding: false
    });
    
    console.log('All TinyMCE editors initialized');
    
    // ============================================
    // Dynamic Form Functions
    // ============================================
    
    // TOC Functions
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
    
    // Tool Box Functions
    let toolboxCounter = 0;
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
                    <input type="url" name="toolbox_button_url[]" placeholder="https://example.com"
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
    
    // Steps Functions
    let stepCounter = 0;
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
    
    // Callout Functions
    let calloutCounter = 0;
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
    
    // FAQ Functions
    let faqCounter = 0;
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
    
    // Conclusion Button Functions
    let conclusionBtnCounter = 0;
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
                    <input type="url" name="conclusion_btn_url[]" placeholder="https://example.com"
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
    
    // Sidebar Promo Functions
    let promoCounter = 0;
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
                    <input type="url" name="promo_link_url[]" placeholder="https://example.com"
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
    
    // Quick Link Functions
    let quickLinkCounter = 0;
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
                <input type="url" name="quick_link_url[]" placeholder="https://example.com"
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
@endsection
