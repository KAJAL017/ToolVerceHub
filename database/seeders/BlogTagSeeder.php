<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogTag;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            // Image Tools Tags (Featured)
            ['name' => 'PNG to JPG', 'slug' => 'png-to-jpg', 'description' => 'Convert PNG images to JPG format', 'is_featured' => true],
            ['name' => 'Image Converter', 'slug' => 'image-converter', 'description' => 'Image format conversion tools', 'is_featured' => true],
            ['name' => 'WEBP Convert', 'slug' => 'webp-convert', 'description' => 'Convert images to WEBP format', 'is_featured' => false],
            ['name' => 'CSS Generator', 'slug' => 'css-generator', 'description' => 'Generate CSS code online', 'is_featured' => true],
            ['name' => 'QR Code', 'slug' => 'qr-code', 'description' => 'QR code generator and tools', 'is_featured' => true],
            
            // PDF Tools Tags (Featured)
            ['name' => 'PDF Merger', 'slug' => 'pdf-merger', 'description' => 'Merge multiple PDF files', 'is_featured' => true],
            ['name' => 'OCR PDF', 'slug' => 'ocr-pdf', 'description' => 'Extract text from scanned PDFs', 'is_featured' => true],
            ['name' => 'PDF Security', 'slug' => 'pdf-security', 'description' => 'Password protect PDF files', 'is_featured' => false],
            
            // Gaming Tags
            ['name' => 'HTML5 Games', 'slug' => 'html5-games', 'description' => 'Browser-based HTML5 games', 'is_featured' => true],
            ['name' => 'Action Games', 'slug' => 'action-games', 'description' => 'Action and adventure games', 'is_featured' => false],
            
            // E-Commerce Tags
            ['name' => 'Amazon FBA', 'slug' => 'amazon-fba', 'description' => 'Amazon FBA seller tools', 'is_featured' => false],
            ['name' => 'Shipping Labels', 'slug' => 'shipping-labels', 'description' => 'Shipping label tools', 'is_featured' => false],
            
            // General Tags (Featured)
            ['name' => 'Free Tools', 'slug' => 'free-tools', 'description' => 'Free online tools', 'is_featured' => true],
            ['name' => 'Tutorial', 'slug' => 'tutorial', 'description' => 'Step-by-step tutorials', 'is_featured' => true],
            ['name' => 'Beginner Guide', 'slug' => 'beginner-guide', 'description' => 'Beginner-friendly guides', 'is_featured' => false],
        ];

        foreach ($tags as $tag) {
            BlogTag::create($tag);
        }

        $this->command->info('✅ Blog tags seeded successfully!');
        $this->command->info('   - ' . count($tags) . ' tags created');
    }
}
