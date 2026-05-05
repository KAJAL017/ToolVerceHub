<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ToolCategory;
use App\Models\Tool;

class BuiltInToolsSeeder extends Seeder
{
    public function run(): void
    {
        // Define 5 categories for Built-In Tools section
        $categories = [
            [
                'name' => 'Student Tools',
                'slug' => 'student-tools',
                'icon' => '👨‍🎓',
                'color' => 'g',
                'description' => 'Essential tools for students and learners',
                'tools' => [
                    [
                        'name' => 'PDF to Word Converter',
                        'slug' => 'student-pdf-to-word',
                        'icon' => '📄',
                        'url' => 'https://demo.smartpdfs.in/pdf-to-word-converter',
                        'description' => 'Convert PDF assignments to editable Word documents instantly',
                    ],
                    [
                        'name' => 'Image Compressor',
                        'slug' => 'student-image-compressor',
                        'icon' => '🖼️',
                        'url' => 'https://imgconvertpro.site/compress-image',
                        'description' => 'Reduce image sizes for project submissions and presentations',
                    ],
                    [
                        'name' => 'Citation Generator',
                        'slug' => 'student-citation-generator',
                        'icon' => '📚',
                        'url' => 'https://imgconvertpro.site/citation-generator',
                        'description' => 'Generate APA, MLA, Chicago style citations automatically',
                    ],
                    [
                        'name' => 'Word Counter',
                        'slug' => 'student-word-counter',
                        'icon' => '📝',
                        'url' => 'https://imgconvertpro.site/word-counter',
                        'description' => 'Count words, characters, and paragraphs in your essays',
                    ],
                ],
            ],
            [
                'name' => 'Professional Tools',
                'slug' => 'professional-tools',
                'icon' => '💼',
                'color' => 'b',
                'description' => 'Productivity tools for professionals',
                'tools' => [
                    [
                        'name' => 'PDF Merger',
                        'slug' => 'pro-pdf-merger',
                        'icon' => '📑',
                        'url' => 'https://demo.smartpdfs.in/merge-pdf',
                        'description' => 'Merge multiple PDF documents into one professional file',
                    ],
                    [
                        'name' => 'Password Protect PDF',
                        'slug' => 'pro-password-pdf',
                        'icon' => '🔒',
                        'url' => 'https://demo.smartpdfs.in/protect-pdf',
                        'description' => 'Secure sensitive business documents with password protection',
                    ],
                    [
                        'name' => 'Invoice Generator',
                        'slug' => 'pro-invoice-generator',
                        'icon' => '💰',
                        'url' => 'https://imgconvertpro.site/invoice-generator',
                        'description' => 'Create professional invoices and receipts instantly',
                    ],
                    [
                        'name' => 'Email Signature Generator',
                        'slug' => 'pro-email-signature',
                        'icon' => '✉️',
                        'url' => 'https://imgconvertpro.site/email-signature',
                        'description' => 'Design professional email signatures with HTML code',
                    ],
                ],
            ],
            [
                'name' => 'E-Commerce Tools',
                'slug' => 'ecommerce-tools',
                'icon' => '🛒',
                'color' => 'c',
                'description' => 'Tools for online sellers and merchants',
                'tools' => [
                    [
                        'name' => 'Shipping Label Printer',
                        'slug' => 'ecom-shipping-label',
                        'icon' => '📦',
                        'url' => 'https://imgconvertpro.site/shipping-label',
                        'description' => 'Format Amazon, Flipkart labels for thermal printers',
                    ],
                    [
                        'name' => 'Product Image Resizer',
                        'slug' => 'ecom-image-resizer',
                        'icon' => '📐',
                        'url' => 'https://imgconvertpro.site/resize-image',
                        'description' => 'Resize product images to marketplace requirements',
                    ],
                    [
                        'name' => 'Barcode Generator',
                        'slug' => 'ecom-barcode-generator',
                        'icon' => '📊',
                        'url' => 'https://imgconvertpro.site/barcode-generator',
                        'description' => 'Generate barcodes for inventory and product management',
                    ],
                    [
                        'name' => 'Profit Calculator',
                        'slug' => 'ecom-profit-calculator',
                        'icon' => '💵',
                        'url' => 'https://imgconvertpro.site/profit-calculator',
                        'description' => 'Calculate profit margins and pricing for your products',
                    ],
                ],
            ],
            [
                'name' => 'Designer Tools',
                'slug' => 'designer-tools',
                'icon' => '🎨',
                'color' => 'a',
                'description' => 'Creative tools for designers and artists',
                'tools' => [
                    [
                        'name' => 'CSS Gradient Generator',
                        'slug' => 'design-gradient-generator',
                        'icon' => '🌈',
                        'url' => 'https://imgconvertpro.site/gradient-generator',
                        'description' => 'Create beautiful CSS gradients with live preview',
                    ],
                    [
                        'name' => 'Color Palette Generator',
                        'slug' => 'design-color-palette',
                        'icon' => '🎨',
                        'url' => 'https://imgconvertpro.site/color-palette',
                        'description' => 'Generate harmonious color schemes for your designs',
                    ],
                    [
                        'name' => 'SVG to PNG Converter',
                        'slug' => 'design-svg-to-png',
                        'icon' => '🖼️',
                        'url' => 'https://imgconvertpro.site/svg-to-png',
                        'description' => 'Convert vector SVG files to high-quality PNG images',
                    ],
                    [
                        'name' => 'Box Shadow Generator',
                        'slug' => 'design-box-shadow',
                        'icon' => '📦',
                        'url' => 'https://imgconvertpro.site/box-shadow',
                        'description' => 'Create CSS box shadows with visual editor',
                    ],
                ],
            ],
            [
                'name' => 'Gaming Tools',
                'slug' => 'gaming-tools',
                'icon' => '🎮',
                'color' => 'b',
                'description' => 'Fun games and entertainment tools',
                'tools' => [
                    [
                        'name' => 'Action Games',
                        'slug' => 'game-action-games',
                        'icon' => '⚔️',
                        'url' => 'https://zapgames.fun/category/action-games',
                        'description' => 'Play exciting action-packed games in your browser',
                    ],
                    [
                        'name' => 'Puzzle Games',
                        'slug' => 'game-puzzle-games',
                        'icon' => '🧩',
                        'url' => 'https://zapgames.fun/category/puzzle-games',
                        'description' => 'Challenge your mind with brain-teasing puzzles',
                    ],
                    [
                        'name' => 'Racing Games',
                        'slug' => 'game-racing-games',
                        'icon' => '🏎️',
                        'url' => 'https://zapgames.fun/category/racing-games',
                        'description' => 'Experience high-speed racing action online',
                    ],
                    [
                        'name' => 'Sports Games',
                        'slug' => 'game-sports-games',
                        'icon' => '⚽',
                        'url' => 'https://zapgames.fun/category/sports-games',
                        'description' => 'Play your favorite sports games instantly',
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            // Check if category already exists
            $category = ToolCategory::where('slug', $categoryData['slug'])->first();
            
            if ($category) {
                // Update existing category to enable show_in_built
                $category->update([
                    'show_in_built' => true,
                    'is_featured' => true,
                    'icon' => $categoryData['icon'],
                    'description' => $categoryData['description'],
                ]);
                $this->command->info("✅ Updated: {$categoryData['name']} (show_in_built = true)");
            } else {
                // Create new category with show_in_built = true
                $category = ToolCategory::create([
                    'name' => $categoryData['name'],
                    'slug' => $categoryData['slug'],
                    'icon' => $categoryData['icon'],
                    'color' => $categoryData['color'],
                    'description' => $categoryData['description'],
                    'display_order' => 0,
                    'is_active' => true,
                    'is_featured' => true,
                    'show_in_header' => false,
                    'show_in_home' => false,
                    'show_in_built' => true,
                ]);
                $this->command->info("✅ Created: {$categoryData['name']} (show_in_built = true)");
            }

            // Create tools for this category
            foreach ($categoryData['tools'] as $index => $toolData) {
                $existingTool = Tool::where('slug', $toolData['slug'])->first();
                
                if (!$existingTool) {
                    Tool::create([
                        'category_id' => $category->id,
                        'name' => $toolData['name'],
                        'slug' => $toolData['slug'],
                        'icon' => $toolData['icon'],
                        'url' => $toolData['url'],
                        'description' => $toolData['description'],
                        'color' => $categoryData['color'],
                        'display_order' => $index,
                        'is_active' => true,
                        'is_featured' => false,
                        'is_free' => true,
                        'show_in_hero' => false,
                    ]);
                    $this->command->info("  ✓ Created: {$toolData['name']}");
                } else {
                    $this->command->info("  ⊙ Already exists: {$toolData['name']}");
                }
            }
        }

        $this->command->info('');
        $this->command->info('🎉 Built-In Tools seeding completed!');
        $this->command->info('📊 Total: 5 categories with 4 tools each = 20 tools');
    }
}
