<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    public function up(): void
    {
        // Add page title settings
        $pageTitles = [
            [
                'key' => 'home_page_title',
                'value' => 'ToolVerse Hub — Free Image Converter, PDF Tools & Online Games',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Home Page Title',
                'description' => 'SEO title for home page'
            ],
            [
                'key' => 'about_page_title',
                'value' => 'About Us — ToolVerse Hub',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'About Page Title',
                'description' => 'SEO title for about page'
            ],
            [
                'key' => 'blog_page_title',
                'value' => 'Blog — Free Tool Guides, PDF Tips & Gaming News | ToolVerse Hub',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Blog Page Title',
                'description' => 'SEO title for blog page'
            ],
            [
                'key' => 'tools_page_title',
                'value' => 'Tools — Free Online Tools for Everyone | ToolVerse Hub',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Tools Page Title',
                'description' => 'SEO title for tools page'
            ],
            [
                'key' => 'contact_page_title',
                'value' => 'Contact Us — ToolVerse Hub',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Contact Page Title',
                'description' => 'SEO title for contact page'
            ],
            [
                'key' => 'faq_page_title',
                'value' => 'FAQ — Frequently Asked Questions | ToolVerse Hub',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'FAQ Page Title',
                'description' => 'SEO title for FAQ page'
            ],
            [
                'key' => 'guides_page_title',
                'value' => 'Guides & Tutorials — ToolVerse Hub',
                'group' => 'seo',
                'type' => 'text',
                'label' => 'Guides Page Title',
                'description' => 'SEO title for guides page'
            ],
        ];

        foreach ($pageTitles as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }

    public function down(): void
    {
        Setting::whereIn('key', [
            'home_page_title',
            'about_page_title',
            'blog_page_title',
            'tools_page_title',
            'contact_page_title',
            'faq_page_title',
            'guides_page_title',
        ])->delete();
    }
};
