<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share website settings with all views
        View::composer('*', function ($view) {
            $websiteName = Setting::where('key', 'website_name')->value('value') ?? 'ToolVerse Hub';
            $websiteDescription = Setting::where('key', 'website_description')->value('value') ?? 'Your one-stop hub for 130+ free tools and 500+ games. Convert, edit, play — all in your browser.';
            $footerText = Setting::where('key', 'footer_text')->value('value') ?? '© ' . date('Y') . ' ToolVerse Hub. All rights reserved.';
            $logoUrl = Setting::where('key', 'logo_url')->value('value') ?? null;
            $faviconUrl = Setting::where('key', 'favicon_url')->value('value') ?? '/favicon.ico';
            
            // Get social media settings
            $settings = Setting::where('group', 'social_media')->get();
            $socialMedia = [];
            $platforms = ['facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pinterest', 'tiktok', 'github'];
            
            foreach ($platforms as $platform) {
                $active = $settings->where('key', $platform . '_active')->first();
                $url = $settings->where('key', $platform . '_url')->first();
                
                $socialMedia[$platform] = [
                    'active' => $active ? (bool)$active->value : false,
                    'url' => $url ? $url->value : ''
                ];
            }
            
            // Get categories with show_in_header = true for header dropdown
            $headerCategories = \App\Models\ToolCategory::where('is_active', true)
                ->where('show_in_header', true)
                ->orderBy('display_order')
                ->orderBy('name')
                ->get();
            
            // Get featured tools for footer (max 3)
            $footerTools = \App\Models\Tool::where('is_active', true)
                ->where('is_featured', true)
                ->orderBy('display_order')
                ->orderBy('name')
                ->limit(3)
                ->get();
            
            // Get homepage stats
            $homeStats = [
                [
                    'number' => Setting::where('key', 'stat1_number')->value('value') ?? '130+',
                    'label' => Setting::where('key', 'stat1_label')->value('value') ?? 'FREE TOOLS',
                    'color' => Setting::where('key', 'stat1_color')->value('value') ?? '#6ECB8F',
                ],
                [
                    'number' => Setting::where('key', 'stat2_number')->value('value') ?? '500+',
                    'label' => Setting::where('key', 'stat2_label')->value('value') ?? 'HTML5 GAMES',
                    'color' => Setting::where('key', 'stat2_color')->value('value') ?? '#F08A65',
                ],
                [
                    'number' => Setting::where('key', 'stat3_number')->value('value') ?? '100%',
                    'label' => Setting::where('key', 'stat3_label')->value('value') ?? 'FREE FOREVER',
                    'color' => Setting::where('key', 'stat3_color')->value('value') ?? '#8AABDE',
                ],
                [
                    'number' => Setting::where('key', 'stat4_number')->value('value') ?? '0',
                    'label' => Setting::where('key', 'stat4_label')->value('value') ?? 'SIGNUP NEEDED',
                    'color' => Setting::where('key', 'stat4_color')->value('value') ?? '#E8C06A',
                ],
            ];
            
            // Get hero section settings
            $heroSettings = [
                'badge_text' => Setting::where('key', 'hero_badge_text')->value('value') ?? 'The #1 Free Multi-Tool Platform',
                'title_line1' => Setting::where('key', 'hero_title_line1')->value('value') ?? 'All Your',
                'title_highlight1' => Setting::where('key', 'hero_title_highlight1')->value('value') ?? 'Free Digital',
                'title_line2' => Setting::where('key', 'hero_title_line2')->value('value') ?? 'Tools',
                'title_highlight2' => Setting::where('key', 'hero_title_highlight2')->value('value') ?? 'Under One Roof.',
                'description' => Setting::where('key', 'hero_description')->value('value') ?? 'Convert images, edit PDFs, and play 500+ browser games — 100% free, zero signup required. Works on any device, any browser, instantly.',
                'feature1_text' => Setting::where('key', 'hero_feature1_text')->value('value') ?? '130+ Free Tools',
                'feature2_text' => Setting::where('key', 'hero_feature2_text')->value('value') ?? '500+ HTML5 Games',
                'feature3_text' => Setting::where('key', 'hero_feature3_text')->value('value') ?? 'No Signup Required',
            ];
            
            // Get unread contacts count for admin sidebar (only for admin views)
            $unreadContactsCount = 0;
            if (request()->is('admin*') && session('admin_logged_in')) {
                $unreadContactsCount = \App\Models\ContactSubmission::where('is_read', false)->count();
            }
            
            $view->with([
                'websiteName' => $websiteName,
                'websiteDescription' => $websiteDescription,
                'footerText' => $footerText,
                'logoUrl' => $logoUrl,
                'faviconUrl' => $faviconUrl,
                'globalSocialMedia' => $socialMedia,
                'headerCategories' => $headerCategories,
                'footerTools' => $footerTools,
                'homeStats' => $homeStats,
                'heroSettings' => $heroSettings,
                'unreadContactsCount' => $unreadContactsCount
            ]);
        });
    }
}
