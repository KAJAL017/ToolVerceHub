<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;
use App\Models\ToolCategory;

class HeroToolsSeeder extends Seeder
{
    public function run(): void
    {
        // Get or create categories
        $imageCategory = ToolCategory::where('slug', 'image-tools')->first();
        $pdfCategory = ToolCategory::where('slug', 'pdf-tools')->first();
        $gamingCategory = ToolCategory::where('slug', 'gaming-tools')->first();

        // Define the 3 hero tools
        $heroTools = [
            [
                'name' => 'IMGConvertPro',
                'slug' => 'imgconvertpro',
                'icon' => '🖼️',
                'url' => 'https://imgconvertpro.site/',
                'description' => '80+ Free Tools',
                'tool_count' => '80+ Free Tools',
                'color' => 'g',
                'category_id' => $imageCategory ? $imageCategory->id : null,
                'display_order' => 1,
                'is_active' => true,
                'is_featured' => true,
                'is_free' => true,
                'show_in_hero' => true,
            ],
            [
                'name' => 'SmartPDFs',
                'slug' => 'smartpdfs',
                'icon' => '📄',
                'url' => 'https://demo.smartpdfs.in/',
                'description' => '50+ PDF Tools',
                'tool_count' => '50+ PDF Tools',
                'color' => 'c',
                'category_id' => $pdfCategory ? $pdfCategory->id : null,
                'display_order' => 2,
                'is_active' => true,
                'is_featured' => true,
                'is_free' => true,
                'show_in_hero' => true,
            ],
            [
                'name' => 'ZapGames',
                'slug' => 'zapgames',
                'icon' => '🎮',
                'url' => 'https://zapgames.fun/',
                'description' => '500+ HTML5 Games',
                'tool_count' => '500+ HTML5 Games',
                'color' => 'b',
                'category_id' => $gamingCategory ? $gamingCategory->id : null,
                'display_order' => 3,
                'is_active' => true,
                'is_featured' => true,
                'is_free' => true,
                'show_in_hero' => true,
            ],
        ];

        foreach ($heroTools as $toolData) {
            // Check if tool already exists
            $existingTool = Tool::where('slug', $toolData['slug'])->first();
            
            if ($existingTool) {
                // Update existing tool
                $existingTool->update([
                    'show_in_hero' => true,
                    'is_featured' => true,
                    'is_free' => true,
                    'tool_count' => $toolData['tool_count'],
                    'description' => $toolData['description'],
                ]);
                $this->command->info("✅ Updated: {$toolData['name']} (show_in_hero = true)");
            } else {
                // Create new tool
                Tool::create($toolData);
                $this->command->info("✅ Created: {$toolData['name']} (show_in_hero = true)");
            }
        }

        // Disable show_in_hero for other tools to keep only these 3
        Tool::whereNotIn('slug', ['imgconvertpro', 'smartpdfs', 'zapgames'])
            ->update(['show_in_hero' => false]);
        
        $this->command->info('');
        $this->command->info('🎉 Hero Tools seeding completed!');
        $this->command->info('📊 3 tools set with show_in_hero = true');
    }
}
