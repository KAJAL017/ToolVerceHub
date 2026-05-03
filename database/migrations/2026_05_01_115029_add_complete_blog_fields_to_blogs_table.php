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
        Schema::table('blogs', function (Blueprint $table) {
            // Author Fields
            $table->string('author_emoji', 10)->nullable()->after('author_name');
            
            // SEO & Meta
            $table->string('canonical_url')->nullable()->after('seo_keywords');
            
            // Breadcrumb Data
            $table->json('breadcrumb_data')->nullable()->after('canonical_url');
            // Structure: {"home": "Home", "category": "Image Tools", "title": "PNG to JPG Guide"}
            
            // Badges
            $table->json('badges')->nullable()->after('breadcrumb_data');
            // Structure: {"primary": "📸 Image Tools Guide", "secondary": "Beginner Friendly"}
            
            // Tool Boxes (Promotional Boxes)
            $table->json('tool_boxes')->nullable()->after('key_facts');
            // Structure: [{"emoji": "🖼️", "title": "...", "description": "...", "button_text": "...", "button_url": "...", "color": "g"}]
            
            // Comparison Table
            $table->json('comparison_table')->nullable()->after('tool_boxes');
            // Structure: {"headers": ["Feature", "PNG", "JPG"], "rows": [["Compression", "Lossless", "Lossy"]]}
            
            // Step-by-Step Guide
            $table->json('steps')->nullable()->after('comparison_table');
            // Structure: [{"number": 1, "title": "...", "description": "..."}]
            
            // Callout Boxes (Tips & Warnings)
            $table->json('callouts')->nullable()->after('steps');
            // Structure: [{"type": "tip", "icon": "💡", "content": "..."}]
            
            // FAQ Section
            $table->json('faqs')->nullable()->after('callouts');
            // Structure: [{"question": "...", "answer": "..."}]
            
            // Conclusion Section
            $table->json('conclusion_data')->nullable()->after('faqs');
            // Structure: {"title": "...", "content": "...", "buttons": [{"text": "...", "url": "...", "color": "g"}]}
            
            // Sidebar Elements
            $table->json('sidebar_promos')->nullable()->after('conclusion_data');
            // Structure: [{"emoji": "🖼️", "name": "...", "description": "...", "link_text": "...", "link_url": "...", "color": "g"}]
            
            $table->json('quick_links')->nullable()->after('sidebar_promos');
            // Structure: [{"text": "PNG to WEBP", "url": "#", "color": "g"}]
            
            $table->json('related_posts_ids')->nullable()->after('quick_links');
            // Structure: [1, 2, 3] - IDs of related blog posts
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'author_emoji',
                'canonical_url',
                'breadcrumb_data',
                'badges',
                'tool_boxes',
                'comparison_table',
                'steps',
                'callouts',
                'faqs',
                'conclusion_data',
                'sidebar_promos',
                'quick_links',
                'related_posts_ids',
            ]);
        });
    }
};
