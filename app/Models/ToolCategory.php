<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ToolCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'color',
        'description',
        'display_order',
        'is_active',
        'is_featured',
        'show_in_header',
        'show_in_home',
        'show_in_built',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'show_in_header' => 'boolean',
        'show_in_home' => 'boolean',
        'show_in_built' => 'boolean',
        'display_order' => 'integer',
    ];

    public function tools(): HasMany
    {
        return $this->hasMany(Tool::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('name');
    }
}
