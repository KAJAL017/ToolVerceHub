<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ToolTag extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    // Relationship with Tool (many-to-many)
    public function tools(): BelongsToMany
    {
        return $this->belongsToMany(Tool::class, 'tool_tool_tag');
    }
}
