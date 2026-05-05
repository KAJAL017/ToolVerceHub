<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ToolCategory;
use App\Models\Tool;

class GameGenresSeeder extends Seeder
{
    public function run(): void
    {
        // Create or get Game Genres category
        $category = ToolCategory::firstOrCreate(
            ['slug' => 'game-genres'],
            [
                'name' => 'Game Genres',
                'icon' => '🎮',
                'color' => 'b',
                'description' => 'Play 500+ free HTML5 games',
                'display_order' => 3,
                'is_active' => true,
                'is_featured' => true,
                'show_in_header' => false,
                'show_in_home' => true,
            ]
        );

        // Add 4 tools to this category
        $tools = [
            [
                'name' => 'Action Games',
                'slug' => 'action-games',
                'icon' => '⚔️',
                'description' => 'Fighting, shooting, battle and warfare games',
                'url' => 'https://zapgames.fun/category/action-games',
                'tool_count' => '150+',
            ],
            [
                'name' => 'Puzzle Games',
                'slug' => 'puzzle-games',
                'icon' => '🧩',
                'description' => 'Match3, jigsaw, 2048 and logic puzzle games',
                'url' => 'https://zapgames.fun/category/puzzle-games',
                'tool_count' => '120+',
            ],
            [
                'name' => 'Racing Games',
                'slug' => 'racing-games',
                'icon' => '🏎️',
                'description' => 'Car, bike, stunt and drifting racing games',
                'url' => 'https://zapgames.fun/category/racing-games',
                'tool_count' => '80+',
            ],
            [
                'name' => 'Sports Games',
                'slug' => 'sports-games',
                'icon' => '⚽',
                'description' => 'Football, basketball, cricket and multiplayer sports',
                'url' => 'https://zapgames.fun/category/sports-games',
                'tool_count' => '100+',
            ],
        ];

        foreach ($tools as $index => $toolData) {
            Tool::firstOrCreate(
                ['slug' => $toolData['slug']],
                [
                    'name' => $toolData['name'],
                    'icon' => $toolData['icon'],
                    'color' => 'b',
                    'description' => $toolData['description'],
                    'url' => $toolData['url'],
                    'tool_count' => $toolData['tool_count'],
                    'category_id' => $category->id,
                    'display_order' => $index + 1,
                    'is_active' => true,
                    'is_featured' => false,
                    'is_free' => true,
                    'show_in_hero' => false,
                ]
            );
        }

        $this->command->info('✅ Game Genres category and 4 tools created successfully!');
    }
}
