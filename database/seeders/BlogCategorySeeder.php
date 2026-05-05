<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Image Tools',
                'slug' => 'image-tools',
                'description' => 'Guides and tutorials for image editing, conversion, and optimization tools',
                'icon_emoji' => '🖼️',
                'color' => 'g',
                'order' => 1,
                'is_featured' => true,
            ],
            [
                'name' => 'PDF Tools',
                'slug' => 'pdf-tools',
                'description' => 'Complete guides for PDF editing, merging, splitting, and conversion',
                'icon_emoji' => '📄',
                'color' => 'c',
                'order' => 2,
                'is_featured' => true,
            ],
            [
                'name' => 'Gaming',
                'slug' => 'gaming',
                'description' => 'Free HTML5 games, gaming guides, and walkthroughs',
                'icon_emoji' => '🎮',
                'color' => 'b',
                'order' => 3,
                'is_featured' => false,
            ],
            [
                'name' => 'E-Commerce',
                'slug' => 'ecommerce',
                'description' => 'Tools and tips for online sellers and e-commerce businesses',
                'icon_emoji' => '🛒',
                'color' => 'a',
                'order' => 4,
                'is_featured' => false,
            ],
            [
                'name' => 'Design Tools',
                'slug' => 'design-tools',
                'description' => 'CSS generators, color tools, and design utilities',
                'icon_emoji' => '🎨',
                'color' => 'g',
                'order' => 5,
                'is_featured' => true,
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }

        $this->command->info('✅ Blog categories seeded successfully!');
        $this->command->info('   - ' . count($categories) . ' categories created');
    }
}
