<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class BrandConsistencySeeder extends Seeder
{
    /**
     * TASK 1: Fix brand name — pick ONE, apply everywhere
     * 
     * This seeder ensures consistent branding across:
     * - Website name
     * - Meta title
     * - Footer text
     * - OG tags
     * - Schema.org
     */
    public function run(): void
    {
        $brandName = 'ToolVerse Hub';
        $tagline = 'Free Image Converter, PDF Tools & Online Games';
        $description = 'One free hub for 130+ tools: convert images, edit PDFs, and play 500+ HTML5 games. No signup required.';
        $currentYear = date('Y');
        
        $settings = [
            // General Settings
            'website_name' => $brandName,
            'website_description' => $description,
            'footer_text' => "© {$currentYear} {$brandName}. All rights reserved.",
            
            // SEO Meta Tags
            'meta_title' => "{$brandName} — {$tagline}",
            'meta_description' => $description,
            'meta_keywords' => 'free tools, image converter, PDF tools, online games, PNG to JPG, compress image, edit PDF, HTML5 games',
            
            // Open Graph (Facebook/WhatsApp)
            'og_title' => "{$brandName} — {$tagline}",
            'og_description' => $description,
            'og_site_name' => $brandName,
            
            // Twitter Card
            'twitter_title' => "{$brandName} — {$tagline}",
            'twitter_description' => $description,
            
            // Schema.org Organization
            'schema_org_name' => $brandName,
            'schema_org_description' => $description,
        ];
        
        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        
        $this->command->info('✅ Brand consistency applied: ' . $brandName);
        $this->command->info('   - Website name updated');
        $this->command->info('   - Meta tags updated');
        $this->command->info('   - Footer text updated');
        $this->command->info('   - OG tags updated');
        $this->command->info('   - Schema.org updated');
    }
}
