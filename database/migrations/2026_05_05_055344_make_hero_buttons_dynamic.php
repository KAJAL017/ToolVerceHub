<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if table already exists
        if (!Schema::hasTable('hero_buttons')) {
            // Create hero_buttons table for dynamic buttons
            Schema::create('hero_buttons', function (Blueprint $table) {
                $table->id();
                $table->string('icon', 10);
                $table->string('text', 100);
                $table->string('url', 500);
                $table->string('color', 20)->default('green'); // green, orange, blue
                $table->integer('display_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
        
        // Check if data already migrated
        if (DB::table('hero_buttons')->count() == 0) {
            // Migrate existing 3 buttons to new table
            $existingButtons = [
                [
                    'icon' => DB::table('settings')->where('key', 'hero_button1_icon')->value('value') ?? '🖼️',
                    'text' => DB::table('settings')->where('key', 'hero_button1_text')->value('value') ?? 'Image Tools',
                    'url' => DB::table('settings')->where('key', 'hero_button1_url')->value('value') ?? 'https://imgconvertpro.site/',
                    'color' => 'green',
                    'display_order' => 1,
                    'is_active' => (DB::table('settings')->where('key', 'hero_button1_enabled')->value('value') ?? '1') == '1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'icon' => DB::table('settings')->where('key', 'hero_button2_icon')->value('value') ?? '📄',
                    'text' => DB::table('settings')->where('key', 'hero_button2_text')->value('value') ?? 'PDF Tools',
                    'url' => DB::table('settings')->where('key', 'hero_button2_url')->value('value') ?? 'https://demo.smartpdfs.in/',
                    'color' => 'orange',
                    'display_order' => 2,
                    'is_active' => (DB::table('settings')->where('key', 'hero_button2_enabled')->value('value') ?? '1') == '1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'icon' => DB::table('settings')->where('key', 'hero_button3_icon')->value('value') ?? '🎮',
                    'text' => DB::table('settings')->where('key', 'hero_button3_text')->value('value') ?? 'Play Games',
                    'url' => DB::table('settings')->where('key', 'hero_button3_url')->value('value') ?? 'https://zapgames.fun/',
                    'color' => 'blue',
                    'display_order' => 3,
                    'is_active' => (DB::table('settings')->where('key', 'hero_button3_enabled')->value('value') ?? '1') == '1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ];
            
            DB::table('hero_buttons')->insert($existingButtons);
        }
        
        // Delete old button settings from settings table (if they exist)
        DB::table('settings')->whereIn('key', [
            'hero_button1_icon', 'hero_button1_text', 'hero_button1_url', 'hero_button1_color', 'hero_button1_enabled',
            'hero_button2_icon', 'hero_button2_text', 'hero_button2_url', 'hero_button2_color', 'hero_button2_enabled',
            'hero_button3_icon', 'hero_button3_text', 'hero_button3_url', 'hero_button3_color', 'hero_button3_enabled',
        ])->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_buttons');
    }
};
