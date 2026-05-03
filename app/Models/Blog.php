<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    protected $fillable = [
        // Basic Information
        'title',
        'slug',
        'status',
        'is_featured',
        'is_beginner_friendly',
        'category_id',
        'category_color',
        'views_count',
        
        // SEO & Meta
        'meta_title',
        'meta_description',
        'seo_keywords',
        'canonical_url',
        'featured_image',
        'featured_image_emoji',
        
        // Author Information
        'author_name',
        'author_emoji',
        'author_avatar',
        'author_bio',
        'author_social_links',
        
        // Publishing
        'published_date',
        'updated_date',
        'read_time',
        
        // Content
        'tldr_summary',
        'content',
        
        // Structured Content (JSON)
        'breadcrumb_data',
        'badges',
        'table_of_contents',
        'key_facts',
        'tool_boxes',
        'comparison_table',
        'steps',
        'callouts',
        'faqs',
        'conclusion_data',
        'tags',
        
        // Sidebar (JSON)
        'sidebar_promos',
        'quick_links',
        'related_posts_ids',
    ];

    protected $casts = [
        // Dates
        'published_date' => 'date',
        'updated_date' => 'date',
        
        // Booleans
        'is_beginner_friendly' => 'boolean',
        'is_featured' => 'boolean',
        
        // JSON Fields
        'author_social_links' => 'array',
        'breadcrumb_data' => 'array',
        'badges' => 'array',
        'table_of_contents' => 'array',
        'key_facts' => 'array',
        'tool_boxes' => 'array',
        'comparison_table' => 'array',
        'steps' => 'array',
        'callouts' => 'array',
        'faqs' => 'array',
        'conclusion_data' => 'array',
        'tags' => 'array',
        'sidebar_promos' => 'array',
        'quick_links' => 'array',
        'related_posts_ids' => 'array',
    ];

    // Relationship with BlogCategory
    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    // Scope for published blogs
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope for featured blogs
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for draft blogs
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    // Get excerpt from content
    public function getExcerptAttribute()
    {
        return substr(strip_tags($this->content), 0, 200) . '...';
    }

    // Get reading time in human format
    public function getReadTimeHumanAttribute()
    {
        return $this->read_time . ' min read';
    }
}
