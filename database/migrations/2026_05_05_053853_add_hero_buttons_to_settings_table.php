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
        // Insert hero button settings
        DB::table('settings')->insert([
            // Button 1 (Green - Image Tools)
            ['key' => 'hero_button1_icon', 'value' => '🖼️', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button1_text', 'value' => 'Image Tools', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button1_url', 'value' => 'https://imgconvertpro.site/', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button1_color', 'value' => 'green', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button1_enabled', 'value' => '1', 'created_at' => now(), 'updated_at' => now()],
            
            // Button 2 (Orange - PDF Tools)
            ['key' => 'hero_button2_icon', 'value' => '📄', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button2_text', 'value' => 'PDF Tools', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button2_url', 'value' => 'https://demo.smartpdfs.in/', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button2_color', 'value' => 'orange', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button2_enabled', 'value' => '1', 'created_at' => now(), 'updated_at' => now()],
            
            // Button 3 (Blue - Play Games)
            ['key' => 'hero_button3_icon', 'value' => '🎮', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button3_text', 'value' => 'Play Games', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button3_url', 'value' => 'https://zapgames.fun/', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button3_color', 'value' => 'blue', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'hero_button3_enabled', 'value' => '1', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('settings')->whereIn('key', [
            'hero_button1_icon', 'hero_button1_text', 'hero_button1_url', 'hero_button1_color', 'hero_button1_enabled',
            'hero_button2_icon', 'hero_button2_text', 'hero_button2_url', 'hero_button2_color', 'hero_button2_enabled',
            'hero_button3_icon', 'hero_button3_text', 'hero_button3_url', 'hero_button3_color', 'hero_button3_enabled',
        ])->delete();
    }
};
