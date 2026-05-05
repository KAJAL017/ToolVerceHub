<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ToolCategory;

class ToolCategorySeeder extends Seeder
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
                'icon' => '🖼️',
                'color' => 'g',
                'description' => 'Convert, resize, compress, and edit images online',
                'display_order' => 1,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'PDF Tools',
                'slug' => 'pdf-tools',
                'icon' => '📄',
                'color' => 'c',
                'description' => 'Merge, split, compress, and convert PDF files',
                'display_order' => 2,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Text Tools',
                'slug' => 'text-tools',
                'icon' => '📝',
                'color' => 'b',
                'description' => 'Text formatting, case conversion, and word counter tools',
                'display_order' => 3,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Color Tools',
                'slug' => 'color-tools',
                'icon' => '🎨',
                'color' => 'a',
                'description' => 'Color picker, gradient generator, and palette tools',
                'display_order' => 4,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'CSS Tools',
                'slug' => 'css-tools',
                'icon' => '✨',
                'color' => 'g',
                'description' => 'CSS generators for shadows, gradients, and animations',
                'display_order' => 5,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Code Tools',
                'slug' => 'code-tools',
                'icon' => '💻',
                'color' => 'c',
                'description' => 'Code formatters, minifiers, and beautifiers',
                'display_order' => 6,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Converter Tools',
                'slug' => 'converter-tools',
                'icon' => '🔄',
                'color' => 'b',
                'description' => 'Unit converters, currency, and file format converters',
                'display_order' => 7,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Generator Tools',
                'slug' => 'generator-tools',
                'icon' => '⚡',
                'color' => 'a',
                'description' => 'QR code, password, and random data generators',
                'display_order' => 8,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'SEO Tools',
                'slug' => 'seo-tools',
                'icon' => '🔍',
                'color' => 'g',
                'description' => 'Meta tag generators, keyword tools, and SEO analyzers',
                'display_order' => 9,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Security Tools',
                'slug' => 'security-tools',
                'icon' => '🔒',
                'color' => 'c',
                'description' => 'Encryption, hashing, and password security tools',
                'display_order' => 10,
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($categories as $category) {
            ToolCategory::create($category);
        }

        $this->command->info('✅ Tool categories seeded successfully!');
        $this->command->info('   - ' . count($categories) . ' categories created');
        $this->command->info('   - 5 featured categories');
    }
}
