<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'color',
        'icon_emoji',
        'description',
        'order',
    ];

    // Relationship with Blog
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    // Get color class for frontend
    public function getColorClassAttribute()
    {
        $colors = [
            'g' => 'green',
            'c' => 'coral',
            'b' => 'blue',
            'a' => 'amber',
        ];
        
        return $colors[$this->color] ?? 'green';
    }
}
