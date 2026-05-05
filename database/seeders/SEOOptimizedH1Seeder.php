<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SEOOptimizedH1Seeder extends Seeder
{
    /**
     * TASK 3: Rewrite homepage H1 with target keywords
     * 
     * SEO-optimized H1 that includes:
     * - Primary keywords: "Free Image Converter"
     * - Secondary keywords: "PDF Tools"
     * - Tertiary keywords: "Games"
     * - Value props: "All Free, No Signup"
     */
    public function run(): void
    {
        // SEO-Optimized H1 Structure:
        // "Free Image Converter, PDF Tools & 500+ Games — All Free, No Signup"
        
        $settings = [
            // Hero Section - SEO Optimized
            'hero_badge_text' => 'Free Forever • No Signup Required',
            
            // H1 Line 1: "Free Image Converter, PDF Tools &"
            'hero_title_line1' => 'Free Image Converter, PDF Tools &',
            'hero_title_highlight1' => '500+ Games',
            
            // H1 Line 2: "All Free, No Signup"
            'hero_title_line2' => '— All Free,',
            'hero_title_highlight2' => 'No Signup',
            
            // Description with keywords
            'hero_description' => 'Convert images (PNG to JPG, resize, compress), edit PDFs (merge, split, compress), and play 500+ HTML5 games — all in your browser. No downloads, no registration, 100% free forever.',
            
            // Features with keywords
            'hero_feature1_text' => '130+ Free Tools',
            'hero_feature2_text' => '500+ HTML5 Games',
            'hero_feature3_text' => 'No Signup Required',
        ];
        
        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        
        $this->command->info('✅ SEO-Optimized H1 Applied:');
        $this->command->info('   H1: "Free Image Converter, PDF Tools & 500+ Games — All Free, No Signup"');
        $this->command->info('   ✓ Primary keyword: Free Image Converter');
        $this->command->info('   ✓ Secondary keyword: PDF Tools');
        $this->command->info('   ✓ Tertiary keyword: Games');
        $this->command->info('   ✓ Value props: All Free, No Signup');
        $this->command->info('   ✓ Description includes: PNG to JPG, resize, compress, merge, split');
    }
}
