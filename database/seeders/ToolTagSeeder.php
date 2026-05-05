<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            // Featured tags
            ['name' => 'Free', 'slug' => 'free', 'is_featured' => true],
            ['name' => 'Premium', 'slug' => 'premium', 'is_featured' => true],
            ['name' => 'Open Source', 'slug' => 'open-source', 'is_featured' => true],
            ['name' => 'Web-based', 'slug' => 'web-based', 'is_featured' => true],
            ['name' => 'Mobile App', 'slug' => 'mobile-app', 'is_featured' => true],
            ['name' => 'Desktop', 'slug' => 'desktop', 'is_featured' => true],
            ['name' => 'API Available', 'slug' => 'api-available', 'is_featured' => true],
            ['name' => 'No Sign-up', 'slug' => 'no-signup', 'is_featured' => true],
            ['name' => 'Beginner Friendly', 'slug' => 'beginner-friendly', 'is_featured' => true],
            
            // Non-featured tags
            ['name' => 'Advanced', 'slug' => 'advanced', 'is_featured' => false],
            ['name' => 'Team Collaboration', 'slug' => 'team-collaboration', 'is_featured' => false],
            ['name' => 'Cloud-based', 'slug' => 'cloud-based', 'is_featured' => false],
            ['name' => 'Self-hosted', 'slug' => 'self-hosted', 'is_featured' => false],
            ['name' => 'Offline', 'slug' => 'offline', 'is_featured' => false],
            ['name' => 'Real-time', 'slug' => 'real-time', 'is_featured' => false],
        ];

        foreach ($tags as $tag) {
            \App\Models\ToolTag::create($tag);
        }
    }
}
