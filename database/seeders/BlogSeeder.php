<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Create Categories
        $categories = [
            [
                'name' => 'Image Tools',
                'slug' => 'image-tools',
                'color' => 'g',
                'icon_emoji' => '🖼️',
                'description' => 'Guides and tutorials for image conversion and editing tools',
                'order' => 1,
            ],
            [
                'name' => 'PDF Tools',
                'slug' => 'pdf-tools',
                'color' => 'c',
                'icon_emoji' => '📄',
                'description' => 'Learn how to work with PDF files efficiently',
                'order' => 2,
            ],
            [
                'name' => 'Gaming',
                'slug' => 'gaming',
                'color' => 'b',
                'icon_emoji' => '🎮',
                'description' => 'HTML5 games reviews and recommendations',
                'order' => 3,
            ],
            [
                'name' => 'Productivity',
                'slug' => 'productivity',
                'color' => 'a',
                'icon_emoji' => '⚡',
                'description' => 'Tips and tricks to boost your productivity',
                'order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }

        // Create Sample Blogs
        $blogs = [
            [
                'title' => 'How to Convert PNG to WEBP: Complete Guide',
                'slug' => 'how-to-convert-png-to-webp-complete-guide',
                'meta_title' => 'PNG to WEBP Converter - Free Online Tool',
                'meta_description' => 'Learn how to convert PNG images to WEBP format for faster loading times and better web performance.',
                'featured_image_emoji' => '🖼️',
                'category_id' => 1,
                'category_color' => 'g',
                'author_name' => 'John Doe',
                'author_bio' => 'John is a content writer specializing in web development and digital tools.',
                'published_date' => now()->subDays(5),
                'read_time' => 5,
                'is_beginner_friendly' => true,
                'is_featured' => true,
                'tldr_summary' => 'Converting PNG to WEBP takes under 3 seconds on IMGConvertPro — free, no signup. WEBP files are up to 80% smaller than PNG.',
                'content' => '<h2>What is WEBP Format?</h2><p>WEBP is a modern image format developed by Google that provides superior compression for images on the web.</p><h2>Why Convert PNG to WEBP?</h2><p>Converting PNG images to WEBP offers several advantages including smaller file sizes, faster loading times, and better SEO.</p>',
                'key_facts' => ['PNG files are typically 3–5× larger than equivalent WEBP files', 'WEBP at 85% quality is visually identical to PNG', 'Transparency is lost when converting PNG to WEBP'],
                'tags' => ['PNG', 'WEBP', 'Image Conversion', 'Web Optimization'],
                'seo_keywords' => 'png to webp, image converter, webp format',
                'status' => 'published',
                'views_count' => 1250,
            ],
            [
                'title' => 'Merge Multiple PDFs in Seconds',
                'slug' => 'merge-multiple-pdfs-in-seconds',
                'meta_title' => 'How to Merge PDF Files Online Free',
                'meta_description' => 'Step-by-step guide to combining multiple PDF files into one document using SmartPDFs free online tool.',
                'featured_image_emoji' => '📄',
                'category_id' => 2,
                'category_color' => 'c',
                'author_name' => 'Sarah Miller',
                'author_bio' => 'Sarah specializes in document management and productivity tools.',
                'published_date' => now()->subDays(3),
                'read_time' => 7,
                'is_beginner_friendly' => true,
                'is_featured' => false,
                'tldr_summary' => 'Merge PDF files quickly and easily with SmartPDFs. No software installation required, works in your browser.',
                'content' => '<h2>Why Merge PDFs?</h2><p>Combining multiple PDF files into one makes it easier to share, organize, and manage your documents.</p><h2>Step-by-Step Guide</h2><p>Follow these simple steps to merge your PDF files online for free.</p>',
                'key_facts' => ['Merge unlimited PDF files', 'No file size restrictions', 'Completely free and secure'],
                'tags' => ['PDF', 'Merge PDF', 'Document Management'],
                'seo_keywords' => 'merge pdf, combine pdf, pdf merger',
                'status' => 'published',
                'views_count' => 890,
            ],
            [
                'title' => 'Top 10 HTML5 Games to Play Right Now',
                'slug' => 'top-10-html5-games-to-play-right-now',
                'meta_title' => 'Best Free HTML5 Games 2026',
                'meta_description' => 'Discover the best free HTML5 games you can play instantly in your browser without any downloads.',
                'featured_image_emoji' => '🎮',
                'category_id' => 3,
                'category_color' => 'b',
                'author_name' => 'Mike Johnson',
                'author_bio' => 'Mike is a gaming enthusiast and tech reviewer.',
                'published_date' => now()->subDays(1),
                'read_time' => 4,
                'is_beginner_friendly' => false,
                'is_featured' => true,
                'tldr_summary' => 'Check out our curated list of the best HTML5 games available on ZapGames. All free, no downloads required.',
                'content' => '<h2>What are HTML5 Games?</h2><p>HTML5 games are browser-based games that run without plugins or downloads.</p><h2>Our Top Picks</h2><p>Here are the best HTML5 games you should try today.</p>',
                'key_facts' => ['500+ games available', 'No downloads required', 'Works on all devices'],
                'tags' => ['HTML5 Games', 'Browser Games', 'Free Games'],
                'seo_keywords' => 'html5 games, browser games, free online games',
                'status' => 'published',
                'views_count' => 2100,
            ],
            [
                'title' => '10 Time-Saving Image Editing Tricks',
                'slug' => '10-time-saving-image-editing-tricks',
                'meta_title' => 'Image Editing Tips and Tricks',
                'meta_description' => 'Boost your productivity with these quick image editing tips and tricks using IMGConvertPro tools.',
                'featured_image_emoji' => '⚡',
                'category_id' => 4,
                'category_color' => 'a',
                'author_name' => 'Emily Brown',
                'author_bio' => 'Emily is a productivity expert and digital content creator.',
                'published_date' => now(),
                'read_time' => 6,
                'is_beginner_friendly' => true,
                'is_featured' => false,
                'tldr_summary' => 'Learn professional image editing shortcuts and techniques to save time and improve your workflow.',
                'content' => '<h2>Why Image Editing Matters</h2><p>Efficient image editing can save hours of work and improve your content quality.</p><h2>Top 10 Tricks</h2><p>Master these essential image editing techniques.</p>',
                'key_facts' => ['Save up to 50% time', 'Professional results', 'Easy to learn'],
                'tags' => ['Image Editing', 'Productivity', 'Tips & Tricks'],
                'seo_keywords' => 'image editing tips, productivity hacks, photo editing',
                'status' => 'published',
                'views_count' => 450,
            ],
            [
                'title' => 'Draft: Upcoming Features in 2026',
                'slug' => 'draft-upcoming-features-in-2026',
                'category_id' => 1,
                'category_color' => 'g',
                'author_name' => 'Admin',
                'published_date' => now(),
                'read_time' => 3,
                'content' => '<p>This is a draft post about upcoming features.</p>',
                'status' => 'draft',
                'views_count' => 0,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
