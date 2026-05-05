<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tool extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'icon',
        'description',
        'url',
        'tags',
        'tool_count',
        'color',
        'display_order',
        'is_featured',
        'is_free',
        'show_in_hero',
        'is_active',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_free' => 'boolean',
        'show_in_hero' => 'boolean',
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ToolCategory::class, 'category_id');
    }

    // Relationship with ToolTag (many-to-many)
    public function toolTags(): BelongsToMany
    {
        return $this->belongsToMany(ToolTag::class, 'tool_tool_tag');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('name');
    }
}
