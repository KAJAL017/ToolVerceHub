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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            
            // Basic Information
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            
            // Images
            $table->string('featured_image')->nullable();
            $table->string('featured_image_emoji', 10)->nullable();
            
            // Category & Classification
            $table->foreignId('category_id')->nullable()->constrained('blog_categories')->onDelete('set null');
            $table->enum('category_color', ['g', 'c', 'b', 'a'])->default('g');
            
            // Author Information
            $table->string('author_name');
            $table->string('author_avatar')->nullable();
            $table->text('author_bio')->nullable();
            $table->json('author_social_links')->nullable();
            
            // Publishing
            $table->date('published_date');
            $table->date('updated_date')->nullable();
            $table->integer('read_time')->default(5);
            
            // Badges & Features
            $table->boolean('is_beginner_friendly')->default(false);
            $table->boolean('is_featured')->default(false);
            
            // Content
            $table->text('tldr_summary')->nullable();
            $table->longText('content');
            $table->json('key_facts')->nullable();
            $table->json('table_of_contents')->nullable();
            $table->json('tags')->nullable();
            
            // SEO
            $table->text('seo_keywords')->nullable();
            
            // Status & Analytics
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->integer('views_count')->default(0);
            
            $table->timestamps();
            
            // Indexes
            $table->index('slug');
            $table->index('status');
            $table->index('published_date');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
