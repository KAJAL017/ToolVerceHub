<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Blog;
use App\Models\Tool;
use App\Models\ToolCategory;
use App\Models\Page;
use App\Models\Setting;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml for SEO';

    public function handle()
    {
        $baseUrl = Setting::where('key', 'website_url')->value('value') ?? config('app.url');
        
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
        
        // Homepage
        $xml .= $this->addUrl($baseUrl, now(), '1.0', 'daily');
        
        // Static pages
        $xml .= $this->addUrl($baseUrl . '/tools', now(), '0.9', 'daily');
        $xml .= $this->addUrl($baseUrl . '/blog', now(), '0.9', 'daily');
        $xml .= $this->addUrl($baseUrl . '/faq', now(), '0.7', 'weekly');
        $xml .= $this->addUrl($baseUrl . '/contact', now(), '0.6', 'monthly');
        
        // Blog posts
        $blogs = Blog::where('status', 'published')->get();
        foreach ($blogs as $blog) {
            $url = $baseUrl . '/blog/' . $blog->slug;
            $lastmod = $blog->updated_date ?? $blog->published_date;
            $xml .= $this->addUrl($url, $lastmod, '0.8', 'weekly');
        }
        
        // Tool categories
        $categories = ToolCategory::where('is_active', true)->get();
        foreach ($categories as $category) {
            $url = $baseUrl . '/tools?category=' . $category->slug;
            $xml .= $this->addUrl($url, now(), '0.7', 'weekly');
        }
        
        // Pages
        $pages = Page::where('is_active', true)->get();
        foreach ($pages as $page) {
            $url = $baseUrl . '/page/' . $page->slug;
            $xml .= $this->addUrl($url, $page->updated_at, '0.6', 'monthly');
        }
        
        $xml .= '</urlset>';
        
        // Save sitemap
        file_put_contents(public_path('sitemap.xml'), $xml);
        
        $this->info('✅ Sitemap generated successfully!');
        $this->info('   Location: public/sitemap.xml');
        $this->info('   Total URLs: ' . (count($blogs) + count($categories) + count($pages) + 5));
        
        return 0;
    }
    
    private function addUrl($loc, $lastmod, $priority, $changefreq)
    {
        $xml = '  <url>' . PHP_EOL;
        $xml .= '    <loc>' . htmlspecialchars($loc) . '</loc>' . PHP_EOL;
        $xml .= '    <lastmod>' . $lastmod->format('Y-m-d') . '</lastmod>' . PHP_EOL;
        $xml .= '    <changefreq>' . $changefreq . '</changefreq>' . PHP_EOL;
        $xml .= '    <priority>' . $priority . '</priority>' . PHP_EOL;
        $xml .= '  </url>' . PHP_EOL;
        return $xml;
    }
}
